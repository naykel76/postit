<x-layouts.app title="{{ $post->title }}" class="container-md py-5-3-2-2">
    <article>
        <h1>{{ $post->title }}</h1>
        <x-postit::intro :intro="$post->intro" />
        @if ($post->image)
            <div class="my-2"><img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title ?? null }}" class="mx-auto rounded-05"></div>
        @endif
        {!! $post->body !!}
    </article>
</x-layouts.app>
