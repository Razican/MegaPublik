<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>

<!--
		@@@ Autor : Raca
		@@@ Fecha : 30-Dic-2010
		@@@ Version HTML: 0.10
		@@@ CSS : el diseño esta basado en las plantillas de racanofeller.com (los colores son
				 aleatorios) y queda pendiente adaptarlo a la interfaz grafica de megapublik
		@@@ Validacion: Probado solo en Firefox

		@@@ Informacion para programar los controladores:
			>>> MASA MONETARIA : Es la cantidad total de oro que hay en el juego, requiere
								un campo en la tabla correspondiente que se actualizara en
								todos los controladores que creen oro nuevo
			>>> ACTIVOS EN DIVISAS : La suma de todos los saldos de monedas ( en su conversion a oro)
								ha de ser igual a la masa monetaria...por lo tanto si se crea oro,
								hay que crear el equivalente en moneda.
			>>> PRESIDENTE DEL BANCO: poner el nombre y el link a la pantalla de control del banco,
			esta pantalla es accesible por todos los usuarios, pero solo el presidente podra enviar
			los datos ( se podria poner un input en el que introducir una contraseña...o por comprobacion
			del nif del presidente). La pantalla de control esta pendiente de diseño.
			>>> TIPO INTERES INTERBANCARIO: Lo fija el parlamento, se pone en la pantalla del presi del banco
			>>> BANCOS PRIVADOS: Se creean a partir de empresa de un ciudadano y de los usuarios que se le unan,
								estos bancos son limitados a 5-10 y son autorizados por el administrador del juego.
								Los privados NO DAN CAMBIO DE MONEDA, solo creditos y depositos de ahorro...y quizas
								acciones de bolsa en un futuro. Los bancos privados estan pendientes de dise�o y se
								accede a ellos mediante el link de la tabla.
			>>> COMPRA-VENTA DE MONEDA : Para que el banco central no sea solo una pantalla de muestra de datos
								ha de tener algo interactivo, o sea una entrada de datos , ademas tiene la
								ventaja de centralizar todos los movimientos de moneda y oro en el controlador
								del banco.


 -->

<title>Banco Central</title>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1"/>
<!-- info>>> hay que crear el archivo .css y borrarlo del html
<link href="<?=base_url()?>public/css/bolsa.css" rel="stylesheet" type="text/css" media="all" />
 -->
<style type="text/css">
*,html { margin: 0; padding: 0; }
body{
	background:#0A0A0A;
	font-family:Verdana, Arial, Helvetica;
	font-size:10px;
	}
#pantalla{ width:100%;}
#container{ height:100%; width:900px; margin:0px auto;}
#cabezera{ background:url(http://www.megapublik.com/system/application/public/images/foncab.gif); height:50px; width:900px;}
#sepuno{ height:5px; width:900px; float:left;}
#menu{ background:green; height:35px; width:900px;}
#titulouno{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:90px;
	width:900px;
	}
#ciudadtit{ float:left; height:90px; width:900px;}
#cuerpo{ height:670px; width:900px;}
#izquierda{
	background:#B0D0D0;
	float:left;
	height:570px;
	width:320px;
	}
#centro{
	background:#606060;
	float:left;
	height:570px;
	width:20px;
	}
#derecha{
	background:#B0D0D0;
	float:left;
	height:570px;
	width:560px;
	}
#titulo{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:23px;
	width:320px;
	}
#privados{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:23px;
	width:560px;
	margin:50px 0 0 0;
	}

#titdivisas{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:23px;
	width:320px;
	margin:50px 0 0 0;
	}
#inter{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:23px;
	width:560px;
	margin:10px 0 0 0;
	}
#camdivisas{
	background: url(http://www.megapublik.com/system/application/public/images/titcomp.gif) repeat-x;
	background-color:#061f4c;
	float:left;
	height:23px;
	width:560px;
	margin:140px 0 0 0;
	}



p.uno{
	color:#FFF;
	font-family:arial;
	font-size:15px;
	margin:12px 0 0 75px;
	}
p.dep{
	color:#fff;
	font-size:20px;
	font-weight:bold;
	margin:29px 0 0 60px;
	}
p.depcom{
	color:yellow;
	font-size:13px;
	font-weight:bold;
	margin:2px 0 0 20px;
	}

table.masa{
	background-color:#383838;
	margin:35px 0 0 10px;
	width:300px;
	position:absolute;
	}
table.divisas{
	background-color:#ff3836;
	margin:110px 0 0 10px;
	position:absolute;
	width:310px;
	}
table.presi{
	background-color:#383838;
	margin:450px 0 0 10px;
	width:310px;
	position:absolute;
	}
table.ciudadano{
	background-color:#ff3836;
	margin:5px 0 0 10px;
	width:540px;
	}
table.interes{
	background-color:#383838;
	margin:45px 0 0 10px;
	width:300px;
	position:absolute;
	}
table.listbancos{
	background-color:#ff3836;
	margin:120px 0 0 0;
	position:absolute;
	width:560px;
	}
table.cambios{
	background-color:#ff3836;
	margin:280px 0 0 0;
	position:absolute;
	width:560px;
	}


td.masa{
	background-color:#0f0f0f;
	background:url(http://www.megapublik.com/system/application/public/images/niffond.gif) repeat-x;
	color:#77d98c;
	text-align:center;
	font-weight:bold;
	font-size:12px;
	}
td.valmasa{
	background-color:#0f0f0f;
	background:url(http://www.megapublik.com/system/application/public/images/niffond.gif) repeat-x;
	color:#FFCC00;
	text-align:center;
	font-weight:bold;
	font-size:12px;
	height:20px;
	}
td.cabacc{
	background-color:#0f0f0f;
	background:url(http://www.megapublik.com/system/application/public/images/niffond.gif) repeat-x;
	color:#77d98c;
	text-align:center;
	font-weight:bold;
	font-size:12px;
	}


#pie{
	float:left;
	font-size:11px;
	color:#77d98c;
	margin:15px 0 0 0;
	height:20px;
	width:900px;
	text-align:center;
	}

.chart_divider{
	background-color:#63567A;
	font-size:2px;
	height:3px;
	padding:0;
	margin:0;
	}


</style>
</head>
<body>
<div id=pantalla>
<div id=container>
<div id=cabezera>

<p class=uno>Zona de cabezera de pagina ..para el logo , y titulo </p>
</div>
<div id="sepuno"></div>

<div id=menu>
<p class=uno>Zona de menus</p>
</div><!-- menu -->

<div id="sepuno"></div>
<div id="titulouno">
<div id="ciudadtit">
<p class=dep>Banco Central de Megapublik</p>
</div>
</div><!-- titulouno -->

<div id="sepuno"></div>
<div id="cuerpo">
<div id="izquierda">
<div id="titulo">
<p class=depcom>Activos monetarios del Banco Central</p>
</div>
<table class="masa" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="160">MASA MONETARIA ORO</td>
	<td class="valmasa">0000000 Oro</td>
</tr>
</table>

<div id="titdivisas">
<p class=depcom>Activos en Divisas</p>
</div>
<table class="divisas" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="160">TIPO MONEDA</td>
	<td class="masa">ACTIVOS</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 1</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 2</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 3</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 4</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 5</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 6</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 7</td>
	<td class="valmasa">0000000</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="valmasa">Moneda 8</td>
	<td class="valmasa">0000000</td>
</tr>
</table>

<table class="presi" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="180">Presidente del banco</td>
	<td class="valmasa">Nombre presi</td>
	<td class="valmasa">Link ctr banco</td>
</tr>
</table>
<!-- Aqui se puede poner una zona para comunicados del banco, tablos de noticias ,etc -->

</div><!-- izquierda -->

<div id="centro">
</div><!-- centro -->

<div id="derecha">
<table class="ciudadano" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="90">Ciudadano: </td>
	<td class="valmasa"width="190">Nombre del usuario</td>
	<td class="masa" width="80">Saldo Oro:</td>
	<td class="valmasa">0000000 Oro</td>
</tr>
</table>

<div id="inter">
<p class=depcom>Mercado Interbancario</p>
</div>
<table class="interes" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="180">Tipo Interes Interbancario:</td>
	<td class="valmasa">00.00 %</td>
</tr>
</table>

<div id="privados">
<p class=depcom>Bancos Privados Autorizados</p>
</div>
<table class="listbancos" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="cabacc" width="170">Entidad</td>
	<td class="cabacc">Credito Estatal</td>
	<td class="cabacc" width="40">Int.Creditos</td>
	<td class="cabacc" width="40">Int.Depositos</td>
	<td colspan="2"></td>
	</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="cabacc">Nombre Banco 1</td>
	<td class="cabacc">00000000 Oro</td>
	<td class="cabacc">00.00 %</td>
	<td class="cabacc">00.00 %</td>
	<td></td>
	<td class="cabacc">Link al banco</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="cabacc">Nombre Banco 2</td>
	<td class="cabacc">00000000 Oro</td>
	<td class="cabacc">00.00 %</td>
	<td class="cabacc">00.00 %</td>
	<td></td>
	<td class="cabacc">Link al banco</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="cabacc">Nombre Banco 3</td>
	<td class="cabacc">00000000 Oro</td>
	<td class="cabacc">00.00 %</td>
	<td class="cabacc">00.00 %</td>
	<td></td>
	<td class="cabacc">Link al banco</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="cabacc">Nombre Banco 4</td>
	<td class="cabacc">00000000 Oro</td>
	<td class="cabacc">00.00 %</td>
	<td class="cabacc">00.00 %</td>
	<td></td>
	<td class="cabacc">Link al banco</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<td class="cabacc">Nombre Banco 5</td>
	<td class="cabacc">00000000 Oro</td>
	<td class="cabacc">00.00 %</td>
	<td class="cabacc">00.00 %</td>
	<td></td>
	<td class="cabacc">Link al banco</td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>

<div id="camdivisas">
<p class=depcom>Compra - Venta de Moneda</p>
</div>
<table class="cambios" cellpadding="1" cellspacing="1" border="0">
<tr>
	<td class="masa" width="150">MONEDA</td>
	<td class="masa" width="95">CAMBIO ORO</td>
	<td class="masa" width="120">Saldo Ciudadano</td>
	<td class="masa" width="30">C</td>
	<td class="masa" width="30">V</td>
	<td colspan="3"></td>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda1'); ?>
	<td class="valmasa">Moneda 1</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda2'); ?>
	<td class="valmasa">Moneda 2</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda3'); ?>
	<td class="valmasa">Moneda 3</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda4'); ?>
	<td class="valmasa">Moneda 4</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda5'); ?>
	<td class="valmasa">Moneda 5</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda6'); ?>
	<td class="valmasa">Moneda 6</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda7'); ?>
	<td class="valmasa">Moneda 7</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
<tr>
	<td class="chart_divider">&nbsp;</td>
</tr>
<tr>
	<?php echo form_open('http://www.megapublik.com/index.php/bancocentral/moneda8'); ?>
	<td class="valmasa">Moneda 8</td>
	<td class="valmasa">0000.00 Oro</td>
	<td class="valmasa">0000000 </td>
	<td class="valmasa"><input name="tipo" type="radio" value="1" /></td>
	<td class="valmasa"><input name="tipo" type="radio" value="2" /></td>
	<td>&nbsp;</td>
	<td><INPUT TYPE="text" NAME="moneda" SIZE="7" MAXLENGTH="10"></td>
	<td class="cabacc"><INPUT TYPE="submit" NAME="accion" VALUE="compra-venta"></td>
	<?php echo form_close(); ?>
</tr>
</table>




</div><!-- derecha -->


</div><!-- cuerpo -->
<div id="pie">
<p>&copy; 2011 Megapublik</p>
</div>
</div><!-- cuerpo -->
</div>
</div>
</body>
</html>