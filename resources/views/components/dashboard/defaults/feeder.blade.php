<ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
@foreach ($posts as $post)
    <li class="py-3 sm:py-4">
        <div class="flex items-center space-x-4 h-14">
            <div class="flex-shrink-0">
                <a title="{{ $post->get_title() }}" href="{{ $post->get_link() }}">
                    <svg class="w-6 h-6 text-gray-300 dark:text-slate-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="flex-1 min-w-0 text-xs font-medium">
                <a class="dark:text-white" title="{{ $post->get_title() }}" href="{{ $post->get_link() }}">
                {{ Str::of($post->get_title())->title() }}
                </a>
            </div>
            <div class="inline-flex items-center text-base text-gray-300 dark:text-slate-700">
                <a href="{{ $post->get_link() }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </li>
@endforeach
</ul>