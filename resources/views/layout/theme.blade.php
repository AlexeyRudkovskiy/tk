@include('layout.header')
<body>
<div class="header-container">
    <div class="header-navigation content-wrapper">
        @include('layout.partials.menu', [ 'menu' => $header_menu ])
        <ul>
            {{--<li><a href="javascript:">Абітурієнту</a></li>--}}
            {{--<li><a href="javascript:">Навчання</a></li>--}}
            {{--<li><a href="javascript:">Наука</a></li>--}}
            {{--<li><a href="javascript:">Міжнародна діяльність</a></li>--}}
            <!--<li><a href="javascript:">Студентське самоврядування</a></li>-->
        </ul>
        <div class="search-form-container">
            <form action="javascript:">
                <div class="search-field-container">
                    <input type="text" name="request" id="request" class="search-field" placeholder="пошук" />
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@if($current_page === 'homepage')
@foreach($promoted_posts as $post)
<div class="header-slider content-wrapper" style="background-image: url('{{ $post->preview->getThumbnailPath('promo') }}');">
    <div class="slider-navigation-previous"><img src="/assets/slider-previous-icon.png" /></div>
    <div class="slider-navigation-forward"><img src="/assets/slider-forward-icon.png" /></div>
    <div class="header-slider-description">
        <div class="slider-description-title"><h2>{{ $post->title }}</h2></div>
        <div class="slider-description-content"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem fuga necessitatibus placeat reprehenderit similique totam!</span></div>
        <div class="slider-description-button"><a href="{{ $post->getUrl() }}">Перейти до запису</a></div>
    </div>
</div>
@endforeach
@endif
<div class="content-wrapper">
    <div class="app-container">
        <div class="app-sidebar">
            <div class="sidebar-block">
                <div class="sidebar-block-title">Меню</div>
                <div class="sidebar-block-content">
                    <ul class="menu-list">
                        <li><a href="javascript:">Новини</a></li>
                        <li><a href="javascript:">Про коледж</a></li>
                        <li><a href="javascript:">Спеціальності</a></li>
                        <li><a href="javascript:">Роботодавцям</a></li>
                        <li><a href="javascript:">Спортивні досягнення</a></li>
                        <li><a href="javascript:">Бібліотека</a></li>
                        <li><a href="javascript:">Фотогалерея</a></li>
                        <li><a href="javascript:">Публічна інформація</a></li>
                        <li><a href="javascript:">Контакти</a></li>
                    </ul>
                </div>
            </div>
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
                <div class="sidebar-block">
                    <div class="sidebar-block-title">Оголошення</div>
                    <div class="sidebar-block-content">
                        <img src="http://via.placeholder.com/224x224" />
                    </div>
                </div>
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