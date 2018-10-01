@extends('layout.theme')
@section('title', $post->title . ' - ' . trans('frontend.website.name'))
@section('content')
    <div class="post-container post-full">
        <h2 class="post-title">{{ $post->title }}</h2>
        <div class="post-content">
            @if($post->preview !== null)
            <img src="{{ $post->preview->getFullPathForThumbnail('default') }}" class="post-thumbnail zoomable-image" data-image="{{ $post->preview->full_path }}" />
            @endif
            {!! $post->getFullText() !!}
        </div>
        <div class="clearfix"></div>
        <div class="post-footer-extended">
            <div class="post-description">
                <div class="post-general-info">
                    <span class="post-posted-at">{{ $post->created_at->format('d/m/Y') }}</span><!--
                    --><span class="post-views">{{ $post->getUniqueViews() }} переглядів</span>
                </div>
                <div class="post-posted-info">
                    <span class="post-author">{{ $post->author->username }}</span><!--
                    --><a href="javascript:" class="post-category">Категорія новин</a>
                </div>
            </div>
            <div class="post-sharing">
                <a href="javascript:"><img src="/assets/share-twitter-icon.png" /></a><!--
                --><a href="javascript:"><img src="/assets/share-facebook-icon.png" /></a>
            </div>
        </div>
    </div>
@endsection
@push('footer')
<div class="gallery-popup">
    <div class="gallery-popup-content"><img src="" /></div>
</div>
@endpush