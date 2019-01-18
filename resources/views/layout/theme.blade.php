@include('layout.header')
<body>
<div class="header-container">
    <div class="header-navigation content-wrapper">
        <div class="mobile-navigation-header">
            <div class="website-title">@lang('frontend.website.name')</div>
            <div class="hamburger-menu">
                <a href="javascript:"><img src="{{ asset('assets/menu-icon.png') }}" /></a>
            </div>
        </div>
        @include('layout.partials.menu', [ 'menu' => $header_menu ])
        {{--<ul>--}}
            {{--<li><a href="javascript:">Абітурієнту</a></li>--}}
            {{--<li><a href="javascript:">Навчання</a></li>--}}
            {{--<li><a href="javascript:">Наука</a></li>--}}
            {{--<li><a href="javascript:">Міжнародна діяльність</a></li>--}}
            <!--<li><a href="javascript:">Студентське самоврядування</a></li>-->
        {{--</ul>--}}
        <div class="search-form-container">
            <form action="{{ route('search.index') }}">
                <div class="search-field-container">
                    <input type="text" name="query" id="request" class="search-field" placeholder="пошук" @if(isset($query) && !empty($query)) value="{{ $query }}" @endif />
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="header-hero content-wrapper @if($current_page !== 'homepage') header-small @endif" style="background-image: url({{ asset('header-photo.jpg') }})">
    <div class="header-hero-description">
        <div class="hero-description-title"><h2>Торговий коледж</h2></div>
        <div class="hero-description-content"><span>Запорізького національного університету</span></div>
    </div>
</div>
<div class="content-wrapper">
    <div class="app-container">
        <div class="app-sidebar">
            {{--<div class="sidebar-block">--}}
                {{--<div class="sidebar-block-title">Меню</div>--}}
                {{--<div class="sidebar-block-content">--}}
                    {{--<ul class="menu-list">--}}
                        {{--<li><a href="javascript:">Новини</a></li>--}}
                        {{--<li><a href="javascript:">Про коледж</a></li>--}}
                        {{--<li><a href="javascript:">Спеціальності</a></li>--}}
                        {{--<li><a href="javascript:">Роботодавцям</a></li>--}}
                        {{--<li><a href="javascript:">Спортивні досягнення</a></li>--}}
                        {{--<li><a href="javascript:">Бібліотека</a></li>--}}
                        {{--<li><a href="javascript:">Фотогалерея</a></li>--}}
                        {{--<li><a href="javascript:">Публічна інформація</a></li>--}}
                        {{--<li><a href="javascript:">Контакти</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            @foreach($menus['left-sidebar'] as $menu)
                <div class="sidebar-block">
                    <div class="sidebar-block-title">{{ $menu->name }}</div>
                    <div class="sidebar-block-content">
                        @include('layout.partials.menu', [ 'menu' => $menu, 'classes' => [ 'menu-list' ] ])
                    </div>
                </div>
            @endforeach
        </div>
        <div class="app-content-container">
            <div class="app-content">
                @yield('content')
            </div>
            <div class="app-content-sidebar">
                {{--<div class="sidebar-block">--}}
                    {{--<div class="sidebar-block-title">Оголошення</div>--}}
                    {{--<div class="sidebar-block-content">--}}
                        {{--<img src="http://via.placeholder.com/224x224" />--}}
                    {{--</div>--}}
                {{--</div>--}}
                @php($events = \App\Event::orderBy('event_at', 'desc')->where('event_at', '>', \Illuminate\Support\Carbon::now())->get())
                @if($events->count() > 0)
                    <div class="events-list">
                        <div class="events-list-title">@lang('app.events.title')</div>
                        @foreach($events as $event)
                            <a class="events-list-item" href="@if($event->post !== null){{ $event->post->getUrl() }}@endif">
                                <div class="event-title">{{ $event->title }}</div>
                                <span class="event-date">{{ $event->event_at }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif
                @foreach($menus['right-sidebar'] as $menu)
                    <div class="sidebar-block">
                        <div class="sidebar-block-title">{{ $menu->name }}</div>
                        <div class="sidebar-block-content">
                            @include('layout.partials.menu', [ 'menu' => $menu, 'classes' => [ 'menu-list' ] ])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@include('layout.footer')