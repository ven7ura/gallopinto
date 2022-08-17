<div class="flow-root">
  <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
    @foreach ($posts as $post)
        <li class="py-3 sm:py-4">
          <div class="flex items-center space-x-4">
            <div class="flex-shrink-0">
              @if ($post['data']['thumbnail'] === 'default')
                no image
              @elseif ($post['data']['thumbnail'] === 'nsfw')
                nsfw
              @else
                <img class="rounded-md" width="{{ $post['data']['thumbnail_width'] / 2 }}" src="{{ $post['data']['thumbnail'] }}" alt="{{ $post['data']['title']}}">
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
</div>