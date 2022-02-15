<x-guest-layout title="Inicio">
    <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 h-96 flex flex-col md:flex-row justify-center items-center mb-8">
        <div>
            <img class="hidden sm:block h-64 w-auto mx-auto p-2" src="{{ asset('img/gp.svg') }}" alt="GalloPinto">
        </div>
        <div class="mx-auto max-w-2xl p-2 tracking-tighter">
            <h1 class="prose md:text-xl">Hola! <b>somosGalloPinto</b> y nos encanta el <b>desarrollo web</b>.</h1>
            <h2 class="prose text-sm"><a href="#blog-section">Compartir conociemientos</a>, <a href="{{ route('page.project.list') }}">encontrar y resolver problemas</a> son nuestra mision.</h2>
        </div>
    </div>
    <div class="bg-white shadow-sm">
        <livewire:post-list />
    </div>
</x-guest-layout>