<ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
@foreach ($posts as $post)
    <li class="py-3 sm:py-4">
        <div class="flex items-center space-x-4 h-14">
            <div class="flex-shrink-0">
                @if ($post['data']['thumbnail'] === 'default' || $post['data']['thumbnail'] == '' || $post['data']['thumbnail'] == 'self')
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                @elseif ($post['data']['thumbnail'] === 'nsfw')
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                @else
                    <img class="w-16 rounded" src="{{ $post['data']['thumbnail'] }}" alt="{{ $post['data']['title']}}">
                @endif
            </div>
            <div class="flex-1 min-w-0 text-xs font-medium">
                <a title="{{ $post['data']['title'] }}" href="{{ $post['data']['url'] }}">
                {{ Str::of($post['data']['title'])->title() }}
                </a>
            </div>
            <div class="inline-flex items-center text-base text-gray-300">
                <a href="https://old.reddit.com{{ $post['data']['permalink'] }}">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </li>
@endforeach
</ul>