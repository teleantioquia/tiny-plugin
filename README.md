# Tiny Plugin
Este es un plugin diseñado como prueba para la posicion de desarrollador Junior.

Este plugin se basa en el [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) a partir del cual se han creado varios plugins para el sitio principal de Teleantioquia.

> Note que esta es una prueba minimalista, cuyo objetivo principal es conocer las habilidades en PHP y WordPress del candidato, los plugins que usamos en producción agregan capas de complejidad que nos ayudan a desarrollar en WordPress de una forma moderna, ejemplo los paquetes son manejados con Composer y NPM, se usa Webpack para generar los scripts front-end, se hacen pruebas automatizadas, se hace CI/CD con Github Actions, entre otras. Sin embargo, no se espera que el candidato domine estas herramientas sino que con calma y con tiempo vaya aprendiendolas junto al acompañamiento del equipo de Teleantioquia Digital.

# Instalación y configuración
1. Instale WordPress localmente en su computador.
2. Clone este repositorio en la carpeta `wp-content/plugins/` para que WordPress lo reconozca como un plugin.
3. Active el plugin en el panel de administración.
4. Agregue el shortcode `[dummy-shortcode]` a alguna pagina o post para que pueda ir viendo los cambios que le realice.

Observe que cuando se activa el plugin aparece el menu **Tiny Plugin** en el panel de administración de WordPress.

# Sobre la estructura de carpetas
El punto de entrada del plugin es el archivo `tiny-plugin.php`, el archivo `uninstall.php` es llamado por WordPress automaticamente cuando el plugin se desinstala.

La clase principal del plugin se encuentra en `class-tiny-plugin.php`, este archivo contiene la clase `Tiny_Plugin` la cual se encarga de unir todas las demas clases y registrarse a la mayoria de hooks de WordPress. Observe como el `constructor` se encargan de inicializar todo.

En la carpeta `includes/` se recomienda guardar todas las clases de utilidad, o que esten relacionadas al front-end y panel de administracion del sitio, ejemplos: un shortcode, un widget, etc.

En la carpeta `admin/` se recomienda guardar todas la clases que solo hacen acciones en el panel de administracion, ejemplo una clase que se encarga de agregar un nuevo menu al panel de administracion.

En la carpeta `public/` se recomienda guardar todas las clases que solo hacen acciones en el front-end del sitio, ejemplo una clase para importar scripts y estilos en el front-end.

Se puede ignorar la carpeta `languages/` ya que no se necesitara para ningun ejercicio.

# Ejercicios

Los ejercicios se dividen en 4 categorias, se permite al candidato investigar en cualquier foro de internet, mirar la documentacion o buscar en Google como solucionar los problemas especificos.

Note, si el codigo sigue los [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/) se dara puntos adicionales. (Sin embargo esto no baja la calificacion).

Para ir rapidamente a las partes del codigo que debe modificar para resolver cada ejercicio busque en su editor de codigo las partes donde salga el nombre del ejercicio, ejemplo para el primer ejercicio de buenas practicas, busque todos los archivos que tengan el comentario `Excercise 1.1`.

## Buenas Practicas
1. `Excercise 1.1`: Import styles and scripts correctly.
2. `Excercise 1.2`: Why do we use the `ob_start()`/`ob_get_clean()` pair of functions in the shortcode callback?. (Let the answer as a comment)

## Caracteristicas Nuevas (Shortcode)
1. `Excercise 2.1`: Add a new attribute to the shortcode named **subtitle** and let it have the 'Subtitulo por defecto' default value.
2. `Excercise 2.2`: Show the **subtitle** attribute below the title wrapped in an h3.
3. `Excercise 2.3`: Show the **age** and **city** related to each **name**.
4. `Excercise 2.4`: Add styles to the shortcode outputed HTML to change a bit the appeareance.
5. `Excercise 2.5`: Add a button to the shortcode output HTML.
6. `Excercise 2.6`: Show a window alert when the previously added button gets clicked.

## Solucionar Issues
1. `Excercise 3.1`: Import **tiny-extra-script.js** in the footer (not the head).

## Caracteristicas Nuevas (Panel de administracion)
1. `Excercise 4.1`: Add a new attribute to the shortcode named **subtitle** and let it have the 'Subtitulo por defecto' default value.
2. `Excercise 4.2`: Add [submenu page](https://developer.wordpress.org/reference/functions/add_submenu_page/) to the menu **Tiny Plugin**.
2. `Excercise 4.3`: Show a hello world in the previously added submenu when its page get opened.


# Ayudas adicionales
## Shortcodes
Parte principal de los ejercicios esta relacionado a un shortcode, un shortcode en WordPress es una forma modular de definir un componente de UI, aunque existen otros mecanismos, el shortcode es simple y practico.

Para ver lo que un shortcode genera entre a un post o pagina de su sitio y agregue el codigo del shortcode, en nuestro caso:

```
[dummy-shortcode]
```

Tambien puedes agregarle attributos al shortcode.
```
[dummy-shortcode title="Soy un shortcode" subtitle="Soy un shortcode feliz con descripcion"]
```

Los atributos los recibes en el callback del shortcode como primer argumento de la función:

```php
function shortcode_callback( $atts, $content, $shortcode_tag )
{

}
```

La función `shortcode_atts()` se usa para definir valores por defectos a los atributos que recibe el shortcode, asi, sin un usuario no especifica un atributo le asignamos un valor por defecto.

```php
function shortcode_callback( $atts, $content, $shortcode_tag )
{
  // Get the shortcode attributes.
  $shortcode_args = shortcode_atts(
    // Default arguments.
    array(
      // Default values for the atts
      'title' => 'Dummy Shortcode Title',
    ),
    $atts
  );

  // Despues accedemos a los valores asi:
  $title = $shortcode_args['title'];
}
```