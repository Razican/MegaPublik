![MegaPublik Logo](https://raw.github.com/Razican/MegaPublik/develop/images/logo.png "MegaPublik Developer's Guide")

Guía de Desarrollo de MegaPublik
================================

Introducción:
-------------

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