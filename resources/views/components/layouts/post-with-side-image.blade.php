<x-layouts.app title="{{ $post->title }}" class="container-lg py-5-3-2-2">
    <h1>{{ $post->title }}</h1>
    <article class="flex-col gap lg:gap-5 lg:flex-row">
        <div class="fg1 order-1">
            <x-postit::intro :intro="$post->intro" />
            {!! $post->body !!}
        </div>
        <aside class="fs0 lg:w-20 lg:order-1">
            <img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title ?? null }}">
        </aside>
    </article>
</x-layouts.app>
