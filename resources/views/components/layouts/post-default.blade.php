<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="{{ $post->title }}" class="py-5-3-2-2">
    <div class="container maxw-md">
        <article>
            <h1 class="title">{{ $post->title }}</h1>
            <x-postit::intro :intro="$post->intro" />
            @if ($post->image)
                <div class="my-2"><img src="{{ $post->mainImageUrl() }}" alt="{{ $post->title ?? null }}" class="mx-auto rounded-05"></div>
            @endif
            {!! $post->body !!}
        </article>
    </div>
</x-gt-app-layout>
