---
title: Antes de comenzar
project: Hagamos un Blog
summary: Estableceremos expectativas para poder saber si este proyecto es para ti o tu equipo.
hidden: false
---
# Antes de comenzar
## Creditos
Como hacer un blog con Laravel es un tema ya abarcado por la comunidad, de hecho muchos tutoriales comienzan haciendo un blog como primer proyecto. No obstante, las metas de este blog eran las siguientes:

- Minimalista (en el *frontend* y el *backend*)
- Sin base de datos (sin *MySQL*, ni *sqlite* o algo por el estilo)
- **TDD** por sus siglas en ingles (*Test-driven development*)

## Dificultad
Ya teniendo mis metas y requerimientos, el siguiente paso era de investigar cuales eran los mejores packages/frameworks que eran convienientes para mi blog.

### Herramientas utlizadas
#### Laravel
Primero que todo este framework es de preferencia personal; programar para la web con Laravel se vuelve facil por todas las herramientas que tiene disponibles. Lo mas importante es que, con Laravel se puede usar para una aplicacion grandisima o pequena como este blog y siempre vas a tener un buen rendimiento (dependiendo de que tan bien optimizes tu aplicacion). El limite no existe, yo pienso que este framework revitalizo al lenguaje PHP y ambos se han aprovechado de la comunidad que han creado.

#### PHPUnit o Pest
Elegi [Pest](https://pestphp.com/docs/plugins/laravel/) por que creo que era un exelente proyecto para aprender a usarlo. Practicamente hace que tu entorno TDD se haga un poco mas facil, mas leible y rapido.

### Frontend
#### Bulma, Foundation, Bootstrap o TailwindCSS
Para este proyecto se utilizo [TailwindCSS](https://tailwindcss.com) por las varias ventajas que ofrece. Primero, se enlaza excelentemente con Laravel Mix para poder purgar y compilar solo las clases y atributos utilizados en la aplicacion; haciendo el archivo CSS optimizado. Segundo, no depende de ninguna libreria de JavaScript (jquery, vue, react etc...). Y ultimo, es muy facil de mantener a largo plazo.
#### Vue, JQuery, React o alpineJS
Esta decision fue facil, [alpineJS](https://alpinejs.dev/); por su tamano y gran utilidad lo hace perfecto para un proyecto minimalista como este blog.
