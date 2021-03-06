@extends('layout.theme')

@section('content')
    @if($posts->count() > 0)
        <h1 class="search-results-title">@lang('app.search.results.title')</h1>
        <h2>{{ $query }}</h2>
        @foreach($posts as $post)
            <div class="post-container post-small">
                <h2 class="post-title"><a href="{{ route('post.show', [ 'post' => $post ]) }}">{{ $post->title }}</a></h2>
                <div class="post-content">
                    @if(!$post->is_old_post)
                        @if($post->preview !== null)
                            <img src="{{ $post->preview->getFullPathForThumbnail('150x150') }}" class="post-thumbnail" />
                        @endif
                    @else
                        @php($preview = $post->meta('preview'))
                        @if($preview != null)
                            <img src="{{ $preview->value }}" class="post-thumbnail" />
                        @endif
                    @endif
                    {!! $post->getShortText() !!}
                </div>
                <div class="clearfix"></div>
                <div class="post-footer">
                    <span class="published-at">{{ $post->getFormattedDate() }}</span>
                    <div class="post-small-read-more-link"><a href="/post/{{ $post->slug }}">Подробнее</a></div>
                </div>
            </div>
        @endforeach
        <div class="offset-top">
            {{ $posts->links() }}
        </div>
    @else
        <h1 class="search-results-title">@lang('app.search.results.not_found')</h1>
    @endif
@endsection
