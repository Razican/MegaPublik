<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Bank Class
 *
 * @subpackage	Controllers
 * @author		Raca
 * @category	Controllers
 * @link		http://www.racanofeller.com/
 * @version		0.0.1
 */

class Bank extends CI_Controller {

	public function index($page = NULL)
	{
		$this->output->enable_profiler($this->config->item('debug'));

		if($this->user->logged_in)
		{
			define ('INGAME', TRUE);
			$this->lang->load('ingame');

			$panel['avatar']		= avatar($this->user->avatar, $this->user->username);
			$panel['user']			=& $this->user;
			$panel['exp_prcnt']		= exp_percent($this->user);
			$panel['l18n']			=& l18n($this->lang->lang());
			$panel['currency']		= 'CURRENCY';

			$head['panel']			= $this->load->view('panel', $panel, TRUE);
			$head['menu']			= $this->load->view('menu_ingame', '', TRUE);
			$head['help']			= lang('ingame.help');
		}

		if($this->uri->segment(3))
		{
			redirect('bank');
		}

		$this->load->library('pagination');
		$this->load->library('bank_lib');

		$this->bank_lib->load_banks();

		$config['base_url']		= site_url("bank/");
		$config['total_rows']	= $this->bank_lib->bank_amount;
		$config['per_page']		= 20;
		$config['uri_segment']	= 5;
		$config['first_link']	= lang('overal.first');
		$config['last_link']	= lang('overal.last');

		$this->pagination->initialize($config);

		$head['menu']			= isset($head['menu']) ? $head['menu'] : $this->load->view('menu_outgame', '', TRUE);

		$data['user']			=& $this->user;
		$data['head']			= $this->load->view('head', $head, TRUE);
		$data['footer']			= $this->load->view('footer', '', TRUE);
		$data['l18n']			=& l18n($this->lang->lang());
		$data['bank_list']		= $this->bank_lib->bank_list;
		$data['pagination']		= $this->pagination->create_links();

		$this->load->view('bank/list', $data);

/*
		// leo tabla cuenta del banco
		$this->db->where('id',$usu);
		$this->db->select('ciudadano,caja,banco,fechaing');
		$consu=$this->db->getwhere('saldos'); //cojo datos cta banco del usuario
		$tupla=$consu->row();
		$datab['cc']=$tupla->ciudadano/100; // el dinero se guarda en formato centimos
		$datab['caj']=$tupla->caja/100; // para evitar redondeos de float en los calculos
		$banco=$tupla->banco; // en la vista se /100 ( se pasa de cts a € )
		$fechaing=$tupla->fechaing;
		$interes=0;
		if($banco>0)
		{
			$ahora=strtotime("now");	// coge la hora actual
			$fechaing=$ahora-$fechaing; // tiempo desde el ingreso
			$fechaing=$fechaing/86400; // 86400 = 1 dia
			$fechaing=floor($fechaing);
			if($fechaing>0)				// si hace menos de 1 dia no calcula interes
			{
				$intbanco=5; // tipo de interes
				$diario=(($banco*$intbanco)/100)/7; // interes semanal
				$interes=$diario*$fechaing;
			}
		}
		$interes=round($interes,2); // el interes se calcula para la vista
		$datab['banc']=$banco/100;	// no se pasa al saldo de la cta hasta que que meta o quite dinero
		$datab['inte']=$interes/100;

	/* ZONA PARA VENTA Y PUESTA EN CIRCULACION DE ACCIONES DE BOLSA
		 PENDIENTE DE ADAPTAR

		$this->db->where('idnif',$usu);
		$this->db->select('cartera1,cartera2,cartera3,cartera4,cartera5,cartera6');
		$consu=$this->db->getwhere('acciones');
		$tupla=$consu->row();
		$datab['car1']=$tupla->cartera1;
		$datab['car2']=$tupla->cartera2;
		$datab['car3']=$tupla->cartera3;
		$datab['car4']=$tupla->cartera4;
		$datab['car5']=$tupla->cartera5;
		$datab['car6']=$tupla->cartera6;
		$this->db->where('indice','tiempo');
		$this->db->select('c,d,e,f,g,h');
		$consu=$this->db->getwhere('mp');
		$tupla=$consu->row();
		$datab['v1']=$tupla->c;
		$datab['v2']=$tupla->d;
		$datab['v3']=$tupla->e;
		$datab['v4']=$tupla->f;
		$datab['v5']=$tupla->g;
		$datab['v6']=$tupla->h;
	*/
	//	$this->load->view('bancovista',$datab);
	}

	public function show($id = NULL)
	{

	}

function ingreso() // ingresos de dinero en la cuenta
{
	$usu=$this->session->userdata('username');
	$rules['ingr']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run()) // no se permiten ingresos con decimales
	{
		redirect('http://www. /index.php/banco');
	}
	$ingreso=$this->input->post('ingr');
	if($ingreso<='0' or $ingreso=='') // devuelve a vista si 0 o vacio
	{
		redirect('http://www. /index.php/banco');
	}
	$this->db->where('id',$usu);
	$this->db->select('caja,banco,fechaing,intcuenta');
	$consu=$this->db->getwhere('saldos');
	$tupla=$consu->row();
	$caja=$tupla->caja;
	$banco=$tupla->banco;
	$fechaing=$tupla->fechaing;
	$intcuenta=$tupla->intcuenta;
	$ingreso=$ingreso*100; // convierto a centimos
	if($caja<$ingreso)
	{
		echo "No hay dinero suficiente en Caja!!";die();
	}
	if($banco==0)
	{
		$fechaing=strtotime("now"); // hora actual del ingreso
	}
	else
	{	// si hay dinero en cta calcula el interes acumulado y lo suma en cta
		$ahora=strtotime("now");	// esto es lo mismo que en el index
		$fechaing=$ahora-$fechaing; // es para el calculo del interes
		$fechaing=$fechaing/86400;
		$fechaing=floor($fechaing);
		if($fechaing>0)
		{
			$intbanco=5;
			$diario=(($banco*$intbanco)/100)/7;
			$interes=$diario*$fechaing;
			$intcuenta=$intcuenta+$interes;
		}
		$fechaing=strtotime("now");
	}
	$caja=$caja-$ingreso; // resto importe del ingreso
	$banco=$banco+$ingreso; // sumo ingreso a la cta del banco
	$dadab=array(
		'caja'=>$caja,
		'banco'=>$banco,
		'fechaing'=>$fechaing,
		'intcuenta'=>$intcuenta);
	$this->db->where('id',$usu);
	$this->db->set($dadab);
	if(!$this->db->update('saldos'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www. /index.php/banco	');
}
function reintegro() // Sacar dinero del la cta del banco
{
	$usu=$this->session->userdata('username');
	$rules['rein']="trim|max_length[10]";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www. /index.php/banco');
	}
	$reintegro=$this->input->post('rein');
	$ctr=0;					 // los reintegros pueden ser con decimales
	$len=strlen($reintegro); // el calculo del interes puede dar decimales
  for($a=0; $a<$len; $a++)
  	{
		$p=ord($reintegro[$a]);
		if($p<48 or $p>57)
		{
			if ($p<>46) // solo permite numeros y . (punto) en vez de ,
			{
				$ctr=1;
			}
		}
	}
	if ( $ctr==1)
	{
		redirect('http://www. /index.php/banco');
	}

	// pendiente ADAPTAR
	$this->db->where('id',$usu);
	$this->db->select('intereses,caja,ganancias,banco,fechaing,intcuenta');
	$consu=$this->db->getwhere('saldos');
	$tupla=$consu->row();
	$intereses=$tupla->intereses;
	$caja=$tupla->caja;
	$ganancias=$tupla->ganancias;
	$banco=$tupla->banco;
	$fechaing=$tupla->fechaing;
	$intcuenta=$tupla->intcuenta;
	$interes=0;
	$ahora=strtotime("now");
	$fechaing=$ahora-$fechaing;
	$fechaing=$fechaing/86400;
	$fechaing=floor($fechaing);
	if($fechaing>0)
	{
		$intbanco=5;
		$diario=(($banco*$intbanco)/100)/7;
		$interes=$diario*$fechaing;
	}
	$reintegro=$reintegro*100;
	if($reintegro>$banco)
	{
		echo "No hay dinero suficiente en el Banco!!";die();
	}
	$intereses=$intereses+$intcuenta+$interes;
	$caja=$caja+$reintegro+$intcuenta+$interes;
	$ganancias=$ganancias+$intcuenta+$interes;
	$banco=$banco-$reintegro;
	$dadab=array(
		'intereses'=>$intereses,
		'caja'=>$caja,
		'ganancias'=>$ganancias,
		'banco'=>$banco,
		'fechaing'=>$ahora,
		'intcuenta'=>'0');
	$this->db->where('idnif',$usu);
	$this->db->set($dadab);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www. /index.php/banco');
}

/* ------------------FUNCIONES DE CUENTA CORRIENTE Y BOLSA---------------------
-------------------- QUEDA EN ESPERA DE UN POSIBLE USO-------------------------


function cajacta()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ingreso=$this->input->post('cu');
	if($ingreso<='0' or $ingreso=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano,caja,capital');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciudadano=$tupla->ciudadano;
	$caja=$tupla->caja;
	$capital=$tupla->capital;
	$ingreso=$ingreso*100;
	if($caja<$ingreso)
	{
		echo "No hay dinero suficiente en Caja!!";die();
	}
	$caja=$caja-$ingreso;
	$capital=$capital-$ingreso;
	$ciudadano=$ciudadano+$ingreso;
	$dadab=array(
		'ciudadano'=>$ciudadano,
		'caja'=>$caja,
		'capital'=>$capital);
	$this->db->where('idnif',$usu);
	$this->db->set($dadab);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function ctaco()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ingreso=$this->input->post('cu');
	if($ingreso<='0' or $ingreso=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano,caja,capital');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciudadano=$tupla->ciudadano;
	$caja=$tupla->caja;
	$capital=$tupla->capital;
	$ingreso=$ingreso*100;
	if($ciudadano<$ingreso)
	{
		echo "No hay dinero suficiente en la Cuenta Corriente!!";die();
	}
	$caja=$caja+$ingreso;
	$capital=$capital+$ingreso;
	$ciudadano=$ciudadano-$ingreso;
	$dadab=array(
		'ciudadano'=>$ciudadano,
		'caja'=>$caja,
		'capital'=>$capital);
	$this->db->where('idnif',$usu);
	$this->db->set($dadab);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function racafonica()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('c');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->c;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'c'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera1,adqui1');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera1;
	$adq=$tupla->adqui1;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera1'=>$cart,
		'adqui1'=>$prmedio);
	$this->db->where('valor','racafonica');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','racafonica');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function air()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('d');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->d;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'd'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera2,adqui2');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera2;
	$adq=$tupla->adqui2;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera2'=>$cart,
		'adqui2'=>$prmedio);
	$this->db->where('valor','air');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','air');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function corte()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('e');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->e;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'e'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera3,adqui3');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera3;
	$adq=$tupla->adqui3;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera3'=>$cart,
		'adqui3'=>$prmedio);
	$this->db->where('valor','elcorte');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','elcorte');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function racafour()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('f');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->f;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'f'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera4,adqui4');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera4;
	$adq=$tupla->adqui4;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera4'=>$cart,
		'adqui4'=>$prmedio);
	$this->db->where('valor','racafour');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','racafour');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function secret()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('g');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->g;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'g'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera5,adqui5');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera5;
	$adq=$tupla->adqui5;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera5'=>$cart,
		'adqui5'=>$prmedio);
	$this->db->where('valor','secrets');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','secrets');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
function burguer()
{
	$usu=$this->session->userdata('username');
	$rules['cu']="trim|numeric|max_length[10]|xss_clean";
	$this->validation->set_rules($rules);
	if(!$this->validation->run())
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$nacc=$this->input->post('cu');
	if($nacc<='0' or $nacc=='')
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$this->db->where('idnif',$usu);
	$this->db->select('ciudadano');
	$consu=$this->db->getwhere('saldosga');
	$tupla=$consu->row();
	$ciu=$tupla->ciudadano;
	$coste=$nacc*1000;
	if($coste>$ciu)
	{
		echo "Alerta >>> No hay suficiente dinero en Cta.Corriente para el pago de las acciones.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->select('h');
	$consu=$this->db->getwhere('mp');
	$tupla=$consu->row();
	$opv=$tupla->h;
	$opv=$opv+$nacc;
	if($opv>1000)
	{
		redirect('http://www.racanofeller.com/index.php/bancoga');
	}
	$ciu=$ciu-$coste;
	$dadban=array(
		'ciudadano'=>$ciu);
	$dadab=array(
		'h'=>$opv);
	$this->db->where('idnif',$usu);
	$this->db->select('cartera6,adqui6');
	$consu=$this->db->getwhere('acciones');
	$tupla=$consu->row();
	$cart=$tupla->cartera6;
	$adq=$tupla->adqui6;
	$a=$cart+$nacc;
	$prmedio=(($cart*$adq)+($nacc*1000))/$a;
	$cart=$cart+$nacc;
	$dadacc=array(
		'cartera6'=>$cart,
		'adqui6'=>$prmedio);
	$this->db->where('valor','macraca');
	$this->db->select('admitidas');
	$consu=$this->db->getwhere('bolsa');
	$tupla=$consu->row();
	$ad=$tupla->admitidas;
	$ad=$ad+$nacc;
	$dadadm=array(
		'admitidas'=>$ad);
	$this->db->where('idnif',$usu);
	$this->db->set($dadban);
	if(!$this->db->update('saldosga'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('indice','tiempo');
	$this->db->set($dadab);
	if(!$this->db->update('mp'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('idnif',$usu);
	$this->db->set($dadacc);
	if(!$this->db->update('acciones'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	$this->db->where('valor','macraca');
	$this->db->set($dadadm);
	if(!$this->db->update('bolsa'))
	{
		echo "ERROR:>>> Fallo en la conexion.";die();
	}
	redirect('http://www.racanofeller.com/index.php/bancoga');
}
*/

}
