<x-guest-layout title="Lista de proyectos">
    <x-common.breadcrumb>
        <li class="text-gray-500">Proyectos</li>
    </x-common.breadcrumb>
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