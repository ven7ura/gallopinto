<x-guest-layout title="Lista de proyectos">
    <h1>Lista de proyectos</h1>
    <ul>
        @foreach ($projects as $series)
            <li>
                <a href="{{ route('page.project.detail', ['codename' => $series->codename]) }}">{{ $series->project }}</a>
            </li>
        @endforeach
    </ul>
</x-guest-layout>