![MegaPublik Logo](https://raw.github.com/Razican/MegaPublik/develop/images/logo.png "Guía de desarrollo de MegaPublik")

# Guía de Desarrollo de MegaPublik #

## Introducción: ##

MegaPublik es un juego online, basado en navegador web, multijugador y masivo.
Como tal, se deben disponer las herramientas necesarias para su funcionamiento.
Este juego se basa en la premisa de crear una realidad alternativa en la que el usuario
será capaz de vivir una vida con las opciones más parecidas posibles a las de la vida real,
pero siempre pudiendo cambiar su destino, lo cual lo distancia de la realidad.

Se pretende crear un sistema de vida parecido a la realidad, remarcando principalmente los
aspectos políticos, económicos, tecnológicos e incluso educativos. Para ello se empleará un
sistema complejo basado en el tiempo, que se calculará desde que se lance al público. Antes
de eso se usará la fecha del inicio del proyecto: 10/11/2009 00:00:00 UTC.

El programa estará escrito en PHP, usando el estilo de CodeIgniter, que podéis encontrar
[aquí](http://codeigniter.com/user_guide/general/styleguide.html "Guía de estilo de CodeIgniter").
Las páginas enviadas al navegador se mostrarán con HTML 5 y CSS 3, ambos validados por la W3C. Para
generar CSS 3 se usará LESS 3, ya que permite crear el CSS más fácilmente. Se usarán media queries para
adaptar el contenido a todas los tamaños de pantalla disponibles en el mercado. Además, para mostrar
dinamismo en las páginas, se usará Javascript, apoyado en el framework jQuery en su versión estable
más reciente, para así hacer uso de sus funciones AJAX. Para generar los scripts en Javascript se usará
Coffeescript. En cuanto al desarrollo en PHP, se usará el framework CodeIgniter 3 en su última versión
estable. No obstante, dado que a día de hoy todavía no existe una versión estable de CodeIgniter 3, se
intentará mantener la última versión disponible en el repositorio oficial.

MegaPublik usará como sistema de control de versiones (VCS) los repositorios Git de Github que podéis
encontrar [aquí](https://github.com/Razican/MegaPublik "Repositorio oficial de MegaPublik"). Para el
control de incidencias, usaremos el tracker incluído en GitHub. Como es lógico, todos los desarrolladores
y diseñadores de MegaPublik deberán estar registrados en GitHub, y deberán tener Git correctamente configurado
para poder ser considerados parte de MegaPublik Developers Team (MDT). Para información más detallada sobre este
tema, consultar las secciones correspondientes de la guía.

MegaPublik está bajo una licencia Creative Commons BY-SA:
[![Licencia](https://raw.github.com/Razican/MegaPublik/develop/images/license.png "CC-BY-SA")](http://creativecommons.org/licenses/by-sa/3.0/deed.es)
Esta licencia deberá incluirse en todas las páginas tanto internas como externas de MegaPublik.

## Principios básicos de codificación: ##

MegaPublik se basará en un modelo VC con librerías. Se ha decidido dejar de lado los modelos por una clara
falta de utilidad frente a las librerías de CodeIgniter. También se usarán entidades para representar
elementos del juego, como usuarios, países, etc. Además, se cumplirán las siguientes normas:

*	No se harán gestiones de la base de datos desde ningún controlador o vista.
*	Las funciones deberán ser agrupadas en librerías o entidades, excepto en casos en los que sea más
	conveniente usar un ayudante (helper), como en el caso del helper general.
*	Se intentará no usar hooks en la medida de lo posible.
*	No se podrá cambiar código de la carpeta *engine*, excepto a la hora de actualizar CodeIgniter.

MegaPublik pretende ser un poyecto internacional, por lo que se exige que todas las variables, clases,
entidades, funciones, métodos y documentación estén escritas en inglés. En el caso de la documentación,
se usará phpDoc para documentar el código internamente, en inglés, pero en el caso de la documentación
externa, como esta guía de desarrollo, se podrá usar, a parte del inglés el español o cualquier otro idioma
que ayude a los desarrolladores.

## Código ##

En MegaPublik, ya contamos con ciertos códigos propios, a parte de los que trae CodeIgniter. Los propios
de CodeIgniter se deberán consultar en su guía de usuario,
[aquí](https://github.com/EllisLab/CodeIgniter/tree/develop/user_guide_src/source "Guía de usuario de CodeIgniter"),
mientras no haya sido lanzada la versión estable de CodeIgniter 3. En cuanto a MegaPublik, esta guía contará
con todo lo necesario para poder programar como miembro de MDT.

### Librerías ###

En MegaPublik tenemos una serie de librerías que facilitan la vida del programador. En estos momentos
disponemos de tres, que podrán ser usadas como convenga.

#### Librería Geography ####

Esta librería trae consigo dos métodos, usados a día de hoy únicamente por el sistema de registro, pero
que en el futuro podrían ser útiles para cuestiones relacionadas con la geografía de MegaPublik. Esta
librería no se carga automáticamente, por lo que se deberá cargar con el siguiente código en el controlador
desde el cual se vaya a usar:

```php
$this->load->library('geography');
```

##### $this->geography->get_countries($columns = NULL) #####

Este método devolverá un array indexado por ID de todos los países de la base de datos. El parámetro
*$columns* nos permitirá indicar con un array las columnas que queremos seleccionar de cada país. Por
ejemplo:

```php
$countries = $this->geography->get_countries();

/*
 * Esto nos devolverá un array con la siguiente estructura:
 * array (
 * 		1 -> Objeto con la información del país con ID 1
 * 		2 -> Objeto con la información del país con ID 2
 * 		3 -> Objeto con la información del país con ID 3
 * 		* * *
 * )
 */

$countries2 = $this->geography->get_countries(array('id', 'name', 'currency'));

/*
 * Esto nos devolverá un array con la siguiente estructura:
 * array (
 * 		1 -> Objeto con la información del país con ID 1, solo con la ID, el nombre y su moneda
 * 		2 -> Objeto con la información del país con ID 2, solo con la ID, el nombre y su moneda
 * 		3 -> Objeto con la información del país con ID 3, solo con la ID, el nombre y su moneda
 * 		* * *
 * )
 */
```

##### $this->geography->get_states($country_id) #####

Este método devolverá un array indexado por ID de los estados pertenecientes al país con la ID enviada en el
parámetro. Se devolverá un array como el de *$config['states']* pero con solo los estados del país. Se
mantendrán las ID intactas.