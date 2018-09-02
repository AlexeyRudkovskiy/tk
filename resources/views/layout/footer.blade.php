<div class="footer-container">
    <div class="content-wrapper">
        <div class="footer-offset"></div>
        <div class="footer-content">
            <div class="contact-info-photo">
                <img src="http://advaion.com/wp-content/uploads/2017/11/placeholder.png" />
            </div>
            <div class="contact-info-content">
                <p class="contact-info-full-name">Илон Маск</p>
                <p class="contact-info-slogan">eating glass and staring into the abyss</p>
                <p class="contact-info-description">Контакти</p>
                <p class="contact-info-item">69095, м. Запоріжжя, вул. Шкільна, 1.</p>
                <p class="contact-info-item">Номер телефону: <a href="tel:0612633779">(0612) 63-37-79</a></p>
                <p class="contact-info-item">Електрона пошта:  <a href="mailto:tcznu@zp.ukrtel.net">tcznu@zp.ukrtel.net</a></p>
                <p class="contact-info-item">Електрона пошта:  <a href="mailto:tk@znu.edu.ua">tk@znu.edu.ua</a></p>
            </div>
            <div class="footer-navigation-links">
                <ul>
                    <li class="navigation-header"><b>Корисні посилання</b></li>
                    @foreach($header_menu->items as $item)
                    @php($item = $menu->getLinkInfo($item))
                    <li><a href="{{ $item['url'] }}">{{ $item['text'] }}</a></li>
                    @endforeach
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
<script src="/index.bundle.js"></script>
@stack('scripts-after')

</body>
</html>