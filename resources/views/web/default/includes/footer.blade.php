{{-- @php
    $socials = getSocials();
    if (!empty($socials) and count($socials)) {
        $socials = collect($socials)->sortBy('order')->toArray();
    }

    $footerColumns = getFooterColumns();
@endphp

<footer class="footer bg-secondary position-relative user-select-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" footer-subscribe d-block d-md-flex align-items-center justify-content-between">
                    <div class="flex-grow-1">
                        <strong>{{ trans('footer.join_us_today') }}</strong>
                        <span class="d-block mt-5 text-white">{{ trans('footer.subscribe_content') }}</span>
                    </div>
                    <div class="subscribe-input bg-white p-10 flex-grow-1 mt-30 mt-md-0">
                        <form action="/newsletters" method="post">
                            {{ csrf_field() }}

                            <div class="form-group d-flex align-items-center m-0">
                                <div class="w-100">
                                    <input type="text" name="newsletter_email" class="form-control border-0 @error('newsletter_email') is-invalid @enderror" placeholder="{{ trans('footer.enter_email_here') }}"/>
                                    @error('newsletter_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill">{{ trans('footer.join') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $columns = ['first_column','second_column','third_column','forth_column'];
    @endphp

    <div class="container">
        <div class="row">

            @foreach ($columns as $column)
                <div class="col-6 col-md-3">
                    @if (!empty($footerColumns[$column]))
                        @if (!empty($footerColumns[$column]['title']))
                            <span class="header d-block text-white font-weight-bold">{{ $footerColumns[$column]['title'] }}</span>
                        @endif

                        @if (!empty($footerColumns[$column]['value']))
                            <div class="mt-20">
                                {!! $footerColumns[$column]['value'] !!}
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach

        </div>

        <div class="mt-40 border-blue py-25 d-flex align-items-center justify-content-between">
            <div class="footer-logo">
                <a href="/">
                    @if (!empty($generalSettings['footer_logo']))
                        <img src="{{ $generalSettings['footer_logo'] }}" class="img-cover" alt="footer logo">
                    @endif
                </a>
            </div>
            <div class="footer-social">
                @foreach ($socials as $social)
                    <a href="{{ $social['link'] }}">
                        <img src="{{ $social['image'] }}" alt="{{ $social['title'] }}" class="mr-15">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer> --}}

<footer itemtype="https://schema.org/WPFooter" itemscope="itemscope" id="colophon" role="contentinfo">
    <div class='footer-width-fixer'>
        <div data-elementor-type="wp-post" data-elementor-id="700" class="elementor elementor-700">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                    <section
                        class="elementor-align-center elementor-section elementor-top-section elementor-element elementor-element-bdd7e15 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="1958e38c" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-4d17e612 elementor-invisible"
                                    data-id="4d17e612" data-element_type="column"
                                    data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-364cc0ff elementor-widget elementor-widget-image"
                                                data-id="364cc0ff" data-element_type="widget"
                                                data-widget_type="image.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-image">
                                                        <img src="assets\images\logorojo.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-5b48ae97 elementor-widget elementor-widget-text-editor"
                                                data-id="5b48ae97" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <p class="p1">Derechos Reservados 2023</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="width:60% !important;"
                                    class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-724e17e8 elementor-invisible"
                                    data-id="724e17e8" data-element_type="column"
                                    data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:600}">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-27b9d134 elementor-widget elementor-widget-heading"
                                                data-id="27b9d134" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h4
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">Mapa del
                                                            Sitio</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-33887db7 elementor-widget elementor-widget-wp-widget-recent-posts"
                                                data-id="33887db7" data-element_type="widget"
                                                data-widget_type="wp-widget-recent-posts.default">
                                                <div class="elementor-widget-container">
                                                    <h5>Sitio</h5>
                                                    <ul>
                                                        <li>
                                                            <a onclick="scrollToSection(event,'pensandoenti')">Lo
                                                                que puedes hacer con Kpacit</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                onclick="scrollToSection(event,'seccionvideos')">Videos</a>
                                                        </li>
                                                        <li>
                                                            <a onclick="scrollToSection(event,'queobtienes')">Descubre
                                                                que Obtienes con Kpacit</a>
                                                        </li>
                                                        <li>
                                                            <a onclick="scrollToSection(event,'secciontesti')">Nuestros
                                                                Clientes Hablan</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-3bb0da0c elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="3bb0da0c" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-93a1dfe"
                                    data-id="93a1dfe" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-6d2345a1 e-grid-align-left elementor-shape-circle e-grid-align-mobile-center elementor-widget__width-auto elementor-widget-mobile__width-inherit elementor-grid-0 elementor-widget elementor-widget-social-icons"
                                                data-id="6d2345a1" data-element_type="widget"
                                                data-widget_type="social-icons.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-social-icons-wrapper elementor-grid">
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3356d00"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Facebook</span>
                                                                <i class="fab fa-facebook"></i>
                                                            </a>
                                                        </span>
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-722fba1"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Instagram</span>
                                                                <i class="fab fa-instagram"></i>
                                                            </a>
                                                        </span>
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ada6752"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Twitter</span>
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </span>
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-c3f4979"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Youtube</span>
                                                                <i class="fab fa-youtube"></i>
                                                            </a>
                                                        </span>
                                                        <span class="elementor-grid-item">
                                                            <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in elementor-repeater-item-6a3037b"
                                                                target="_blank">
                                                                <span class="elementor-screen-only">Linkedin-in</span>
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</footer>
