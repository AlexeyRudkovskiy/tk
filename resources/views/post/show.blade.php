@extends('layout.theme')
@section('title', $post->title . ' - ' . trans('frontend.website.name'))
@section('content')
    <div class="post-container post-full">
        <h2 class="post-title">{{ $post->title }}</h2>
        <div class="post-content">
            @if($post->meta('hide_preview_on_page') === null)
            @if($post->preview !== null)
            <img src="{{ $post->preview->getFullPathForThumbnail('default') }}" class="post-thumbnail zoomable-image" data-image="{{ $post->preview->full_path }}" />
            @endif
            @endif
            {!! $post->getFullText() !!}
        </div>
        <div class="clearfix"></div>
        <div class="post-footer-extended">
            <div class="post-description">
                <div class="post-general-info">
                    <span class="post-posted-at">{{ $post->getFormattedDate() }}</span><!--
                    --><span class="post-views">{{ $post->getUniqueViews() }} переглядів</span>
                </div>
                <div class="post-posted-info">
                    <span class="post-author">{{ $post->author->username }}</span><!--
                    -->@foreach($post->categories as $category)<a href="{{ route('category', $category) }}" class="post-category">{{ $category->name }}</a>@endforeach
                </div>
            </div>
            <div class="post-sharing">
                <a data-share href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank"><img src="/assets/share-twitter-icon.png" /></a><!--
                --><a data-share href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"><img src="/assets/share-facebook-icon.png" /></a>
            </div>
        </div>
    </div>
@endsection
@push('footer')
<div class="gallery-popup">
    <div class="gallery-popup-content"><img src="" /></div>
</div>
<script>
    const shares = document.querySelectorAll('[data-share]');
    const width = 500;
    const height = 450;

    const positionTop = window.innerWidth / 2 - width / 2;
    const positionLeft = window.innerHeight / 2 - height / 2;

    for (let i = 0; i < shares.length; i++) {
        shares[i].addEventListener('click', (e) => {
            e.preventDefault();
            const url = shares[i].href;
            window.open(url,"","width="+width+", height="+height);
        });
    }
</script>
@endpush
@push('header')
    @php($description = rtrim(trim(strip_tags($post->getShortText()))))
    @php($title = $post->title . ' - ' . trans('frontend.website.name'))
    <meta property="og:locale" content="uk_UA" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $post->title . ' - ' . trans('frontend.website.name') }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="@lang('frontend.website.name')" />
    <meta property="article:published_time" content="{{ $post->created_at->format('Y-m-d\TH:i:sP') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:title" content="{{ $title }}" />

    @if($post->preview !== null)
        @php($preview = $post->preview->getFullPathForThumbnail('default'))
    @else
        @php($preview = $post->meta('preview'))
        @if($preview != null)
            @php($preview = $preview->value)
        @endif
    @endif
    @if(strlen($preview) > 0)
        <meta property="og:image" content="{{ asset($preview) }}" />
        <meta name="twitter:image" content="{{ asset($preview) }}" />
    @endif
@endpush