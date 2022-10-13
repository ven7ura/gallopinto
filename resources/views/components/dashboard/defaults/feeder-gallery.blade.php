<div class="overflow-hidden text-gray-700">
    <div class="px-4 py-1 mx-auto">
        <div class="flex flex-wrap -m-1 md:-m-2">
            @foreach ($posts as $post)
                <div class="flex flex-wrap w-1/3 items-center">
                    <div class="w-full p-1 md:p-2">
                        <a href="{{ $post->get_link() }}">
                            <img class="block object-contain object-center w-3/4 h-3/4 rounded-md mx-auto" src="{{ $post->get_thumbnail()['url'] }}" alt="{{ $post->get_title() }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>