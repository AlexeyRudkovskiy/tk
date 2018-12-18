@extends('layout.theme')
@section('title', $page->title . ' - ' . trans('frontend.website.name'))
@section('content')
    <div class="post-container post-full">
        @if(!empty($page->title))
        <h2 class="post-title">{{ $page->title }}</h2>
        @endif
        <div class="post-content">
            {!! $page->content !!}
        </div>
        <div class="clearfix"></div>
        @if($is_admin)
        <div class="post-footer">
            <a href="{{ route('admin.crud.edit', [ 'entity' => 'page', 'id' => $page->id ]) }}">Редагувати</a>
        </div>
        @endif
        <div class="clearfix"></div>
    </div>
@endsection
@push('footer')
    <div class="gallery-popup">
        <div class="gallery-popup-content"><img src="" /></div>
    </div>
@endpush