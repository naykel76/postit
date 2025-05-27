<x-gt-app-layout layout="{{ config('naykel.template') }}" pageTitle="{{ $post->title }}">
    <div class="banner flex va-c blue" style="background-image: url({{ $post->mainImageUrl() }});">
        <div class="container maxw-md space-y-1.5">
            @if(empty($post->config['hide_title']))
                <div class="flex">
                    <h1 class="banner-title bg-blue-09">{{ $post->title }}</h1>
                </div>
            @endif
            @isset($post->lead_text)
                <p class="lead">{{ $post->lead_text }}</p>
            @endisset
            @isset($post->headline)
                <div class="banner-text inline-flex">
                    <div class="icon-list tick-svg maxw-md">
                        {!! $post->headline !!}
                    </div>
                </div>
            @endisset
        </div>
    </div>
    @if($post->body)
        <div class="container maxw-md my-3">
            <article>
                {!! $post->body !!}
            </article>
        </div>
    @endif
</x-gt-app-layout>
