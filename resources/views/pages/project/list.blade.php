<x-guest-layout title="Lista de proyectos">
    <nav class="rounded-md mx-auto max-w-screen-lg px-2 sm:px-6 lg:px-8 my-2 sm:my-8 lg:my-12 text-xs md:text-base">
        <ol class="list-reset flex space-x-1 md:space-x-3 items-center">
            <li>
                <a href="{{ route('page.home') }}" class="text-gray-700 hover:text-gray-900 inline-flex items-center my-2 sm:my-0">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Inicio
                </a>
            </li>
            <li>
                <span class="text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </span>
            </li>
            <li class="text-gray-500">Proyectos</li>
        </ol>
    </nav>
    <div class="prose prose-h1:tracking-tighter max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 my-4 sm:my-12 lg:my-16">
        <h1>Lista de proyectos</h1>
    </div>
    <div class="bg-white shadow-lg py-4 my-4 sm:my-6 lg:my-8">
        <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 py-16 space-y-12">
            @if ($projects->count() > 0)
                @foreach ($projects as $series)
                    <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                        <h3 class="text-xl tracking-tight font-bold">
                            <a href="{{ route('page.project.detail', ['codename' => $series->codename]) }}">{{ $series->project }}</a>
                        </h3>
                        <div class="text-gray-500 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                            <dl>
                                <dt class="sr-only">Capitulos</dt>
                                <dd class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                                    {{ $series->chapterCount() }} Capitulos
                                </dd>
                            </dl>
                        </div>
                    </article>
                @endforeach
            @else
                Todavia no hay projectos...
            @endif
        </div>
    </div>
</x-guest-layout>