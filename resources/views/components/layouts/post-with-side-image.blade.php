<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="{{ $post->title }}" class="py-5-3-2-2">
    <div class="container-lg">
        <h1 class="title">{{ $post->title }}</h1>
        <article class="flex-col gap lg:gap-5 lg:flex-row">
            <div class="fg1 order-1">
                <x-postit::intro :intro="$post->intro" />
                {!! $post->body !!}
            </div>
            <aside class="fs0 lg:w-20 lg:order-1">
                <img src="{{ $post->mainImageUrl() }}" alt="{{ $post->title ?? null }}">
            </aside>
        </article>
    </div>
</x-gt-app-layout>