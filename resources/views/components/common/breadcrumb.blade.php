<nav class="breadcrumb flex rounded-md mx-auto max-w-screen-lg px-2 sm:px-6 lg:px-8 my-2 sm:my-8 lg:my-12 text-xs md:text-base">
    <ol class="list-reset flex space-x-1 md:space-x-3 items-center">
        <li>
            <a href="{{ route('page.home') }}" class="my-2 sm:my-0">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                Inicio
            </a>
        </li>
        <li>
            <span class="text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        </li>
        {{ $slot }}
    </ol>
</nav>