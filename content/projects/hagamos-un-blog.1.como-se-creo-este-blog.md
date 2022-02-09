---
title: Como se creo este Blog
series: Hagamos un Blog
summary: Resumen de todas las herramientas que se utilizaron para este blog.
hidden: false
---
# Como se creo este blog
## Idea / Diseño
Como hacer un blog con Laravel es un tema ya abarcado por la comunidad, de hecho muchos tutoriales comienzan haciendo un blog como primer proyecto. No obstante, las metas de este blog eran las siguientes:

- Minimalista (en el *frontend* y el *backend*)
- Sin base de datos (sin *MySQL*, ni *sqlite* o algo por el estilo)
- **TDD** por sus siglas en ingles (*Test-driven development*)

### Minimalista
Me gusta lo minimalista en cuestiones de diseno y desarrollo web. En mi mente cuando estaba con la idea del blog, yo ya tenia una idea de las herramientas que iba a ocupar; ni mas, ni menos. Hay muchos ejemplos que puedo mencionar en el tema, pero creo que se van a aclarar mas adelante.

### Sin bases de datos
Esto es algo que me puse como meta personal. Esto no tiene nada que ver con lo minimalista, esta decision fue un desafio que queria hacer para poder aprender algo nuevo. Estoy muy agradecio por que ya exisita un [package](https://github.com/spatie/sheets) que abarcaba todas mis necesidades para el blog y hasta mas!

### Test-driven development
Con mi poca experiencia y tiempo desarrollando de esta manera, he aprendido muchisimo como programar mejor. No solo tu aplicacion es mas accesible a futuros programadores, sino tambien te evita dejar huecos sin probar/testear. TDD es un tema muy interesante, mas informacion [aqui](https://www.ionos.es/digitalguide/paginas-web/desarrollo-web/que-es-el-test-driven-development/).

## Desarrollo
Ya teniendo mis metas y requerimientos, el siguiente paso era de investigar cuales eran los mejores packages/frameworks que eran convienientes para mi blog.

### Backend
#### Laravel
Primero que todo este framework es de preferencia personal; programar para la web con Laravel se vuelve facil por todas las herramientas que tiene disponibles. Lo mas importante es que, con Laravel se puede usar para una aplicacion grandisima o pequena como este blog y siempre vas a tener un buen rendimiento (dependiendo de que tan bien optimizes tu aplicacion). El limite no existe, yo pienso que este framework revitalizo al lenguaje PHP y ambos se han aprovechado de la comunidad que han creado.

#### PHPUnit o Pest
Elegi [Pest](https://pestphp.com/docs/plugins/laravel/) por que creo que era un exelente proyecto para aprender a usarlo. Practicamente hace que tu entorno TDD se haga un poco mas facil, mas leible y rapido.

### Frontend
#### Bulma, Foundation, Bootstrap o TailwindCSS
Para este proyecto se utilizo [TailwindCSS](https://tailwindcss.com) por las varias ventajas que ofrece. Primero, se enlaza excelentemente con Laravel Mix para poder purgar y compilar solo las clases y atributos utilizados en la aplicacion; haciendo el archivo CSS optimizado. Segundo, no depende de ninguna libreria de JavaScript (jquery, vue, react etc...). Y ultimo, es muy facil de mantener a largo plazo.
#### Vue, JQuery, React o alpineJS
Esta decision fue facil, [alpineJS](https://alpinejs.dev/); por su tamano y gran utilidad lo hace perfecto para un proyecto minimalista como este blog.
