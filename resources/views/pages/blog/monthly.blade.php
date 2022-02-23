<x-guest-layout title="Entradas de blog del mes {{ $posts->first()->date->monthName }} {{ $posts->first()->year }}">
    <div class="max-w-screen-lg prose prose-h1:tracking-tighter mx-auto px-2 sm:px-6 lg:px-8 my-2 sm:my-6 lg:my-8">
        <h1>Entradas de {{ $posts->first()->date->monthName }} del {{ $posts->first()->year }}</h1>
    </div>
    <div class="bg-white shadow-lg py-4 my-2 sm:my-6 lg:my-8">
        <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8 space-y-12">
            @foreach ($posts as $post)
                <article class="relative flex flex-col max-w-3xl lg:ml-auto lg:max-w-none lg:w-[50rem]">
                    <h3 class="text-xl tracking-tight font-bold">
                        <a href="{{ $post->link() }}">{{ $post->title }}</a>
                    </h3>
                    <div class="mb-4 prose">
                        <p>{{ $post->summary }}</p>
                    </div>
                    <div class="text-gray-500 text-sm mt-auto flex flex-row-reverse items-center justify-end">
                        <dl>
                            <dt class="sr-only">Fecha</dt>
                            <dd class="text-sm leading-7 lg:absolute lg:top-0 lg:right-full sm:mr-8 lg:whitespace-nowrap">
                                {{ $post->date->day . ' ' . $post->date->monthName }}
                            </dd>
                        </dl>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-guest-layout>