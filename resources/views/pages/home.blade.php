<x-guest-layout title="">
    @seo(['description' => 'Hola soy ven7ura y me encanta el desarrollo web con Laravel, Livewire y VueJS. Compartir
    conocimientos, encontrar y
    resolver problemas son la mision del blog.'])
    @seo(['image' => asset('img/gp.svg')])
    @seo(['twitter.creator' => 'nicaCloud'])
    <div
        class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 h-96 flex flex-col md:flex-row justify-center items-center mb-8">
        <div>
            <img class="hidden sm:block h-64 w-auto mx-auto" src="{{ asset('img/gp.svg') }}" alt="GalloPinto">
        </div>
        <div class="mx-auto max-w-2xl tracking-tighter">
            <h1 class="prose dark:prose-invert prose-a:text-red-500 md:text-xl">Hola! soy <a class="font-bold"
                    href="https://github.com/ven7ura">ven7ura</a> y me encanta el <b>desarrollo web</b>.</h1>
            <h2 class="prose dark:prose-invert dark:prose-a:text-orange-300 text-sm md:text-lg"><a
                    href="#blog-section">Compartir conociemientos</a>, <a
                    href="{{ route('page.project.list') }}">encontrar y resolver problemas</a> son mi misi&oacute;n.
            </h2>
        </div>
    </div>
    <div class="bg-white dark:bg-slate-800">
        <livewire:post-list />
    </div>
</x-guest-layout>
