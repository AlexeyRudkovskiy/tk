@if(!empty(config('configs.director')))
    @php($director = \App\Worker::find(config('configs.director')))
@endif
<div class="footer-container">
    <div class="content-wrapper">
        <div class="footer-offset"></div>
        <div class="footer-content">
            <div class="contact-info-photo">
                @if(!empty(config('configs.director')))
                <img src="{{ $director->photo->getThumbnailPath('employer-photo-small') }}" />
                @endif
            </div>
            <div class="contact-info-content">
                @if(!empty(config('configs.director')))
                <p class="contact-info-full-name">{{ $director->full_name }}</p>
                @endif
                @if(!empty(config('configs.director_slogan')))
                <p class="contact-info-slogan">{{ config('configs.director_slogan') }}</p>
                @endif
                <p class="contact-info-description">Контакти</p>
                @if(!empty(config('configs.address')))
                    <p class="contact-info-item">{{ config('configs.address') }}</p>
                @endif
                @if(!empty(config('configs.phone_number')))
                    <p class="contact-info-item">Номер телефону: <a href="tel:{{ config('configs.phone_number') }}">{{ config('configs.phone_number') }}</a></p>
                @endif
                @if(!empty(config('configs.second_phone_number')))
                    <p class="contact-info-item">Номер телефону: <a href="tel:{{ config('configs.second_phone_number') }}">{{ config('configs.second_phone_number') }}</a></p>
                @endif
                @if(!empty(config('configs.email')))
                    <p class="contact-info-item">Електрона пошта:  <a href="mailto:{{ config('configs.email') }}">{{ config('configs.email') }}</a></p>
                @endif
                @if(!empty(config('configs.second_email')))
                    <p class="contact-info-item">Електрона пошта:  <a href="mailto:{{ config('configs.second_email') }}">{{ config('configs.second_email') }}</a></p>
                @endif
            </div>
            <div class="footer-navigation-links">
                <ul>
                    <li class="navigation-header"><b>Корисні посилання</b></li>
                    @if($header_menu->items !== null)
                        @foreach($header_menu->items as $item)
                        @php($item = $header_menu->getLinkInfo($item))
                        <li><a href="{{ $item['url'] }}">{{ $item['text'] }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer-single-line">
    УСІ ПРАВА ЗАХИЩЕНО © 2018. ALL RIGHTS RESERVED
</div>

@stack('footer')

@stack('scripts-before')
<script src="{{ asset('index.bundle.js') }}"></script>
@stack('scripts-after')

</body>
</html>