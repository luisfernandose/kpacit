{{-- @php
    $userLanguages = !empty($generalSettings['site_language']) ? [$generalSettings['site_language'] => getLanguages($generalSettings['site_language'])] : [];

    if (!empty($generalSettings['user_languages']) and is_array($generalSettings['user_languages'])) {
        $userLanguages = getLanguages($generalSettings['user_languages']);
    }

    $localLanguage = [];

    foreach($userLanguages as $key => $userLanguage) {
        $localLanguage[localeToCountryCode($key)] = $userLanguage;
    }

@endphp

<div class="top-navbar d-flex border-bottom">
    <div class="container d-flex justify-content-between flex-column flex-lg-row">
        <div class="top-contact-box border-bottom d-flex flex-column flex-md-row align-items-center justify-content-center">

            <div class="d-flex align-items-center justify-content-center">
                @if (!empty($generalSettings['site_phone']))
                    <span class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14">
                        <i data-feather="phone" width="20" height="20" class="mr-10"></i>
                        {{ $generalSettings['site_phone'] }}
                    </span>
                @endif

                @if (!empty($generalSettings['site_email']))
                    <div class="border-left mx-5 mx-lg-15 h-100"></div>

                    <span class="d-flex align-items-center py-10 py-lg-0 text-dark-blue font-14">
                        <i data-feather="mail" width="20" height="20" class="mr-10"></i>
                        {{ $generalSettings['site_email'] }}
                    </span>
                @endif
            </div>

            <div class="d-flex align-items-center justify-content-between justify-content-md-center">
                <form action="/locale" method="post" class="mr-15 mx-md-20">
                    {{ csrf_field() }}

                    <input type="hidden" name="locale">

                    <div class="language-select">
                        <div id="localItems"
                             data-selected-country="{{ localeToCountryCode(mb_strtoupper(app()->getLocale())) }}"
                             data-countries='{{ json_encode($localLanguage) }}'
                        ></div>
                    </div>
                </form>


                <form action="/search" method="get" class="form-inline my-2 my-lg-0 navbar-search position-relative">
                    <input class="form-control mr-5 rounded" type="text" name="search" placeholder="{{ trans('navbar.search_anything') }}" aria-label="Search">

                    <button type="submit" class="btn-transparent d-flex align-items-center justify-content-center search-icon">
                        <i data-feather="search" width="20" height="20" class="mr-10"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="xs-w-100 d-flex align-items-center justify-content-between ">
            <div class="d-flex">

                @include(getTemplate().'.includes.shopping-cart-dropdwon')

                <div class="border-left mx-5 mx-lg-15"></div>

                @include(getTemplate().'.includes.notification-dropdown')
            </div>

            @if (!empty($authUser))


                <div class="dropdown">
                    <a href="#!" class="navbar-user d-flex align-items-center ml-50 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ $authUser->getAvatar() }}" class="rounded-circle" alt="{{ $authUser->full_name }}">
                        <span class="font-16 user-name ml-10 text-dark-blue font-14">{{ $authUser->full_name }}</span>
                    </a>

                    <div class="dropdown-menu user-profile-dropdown" aria-labelledby="dropdownMenuButton">
                        <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                            <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
                        </div>

                        <a class="dropdown-item" href="{{ $authUser->isAdmin() ? '/admin' : '/panel' }}">
                            <img src="/assets/default/img/icons/sidebar/dashboard.svg" width="25" alt="nav-icon">
                            <span class="font-14 text-dark-blue">{{ trans('public.my_panel') }}</span>
                        </a>
                        @if ($authUser->isTeacher() or $authUser->isOrganization())
                            <a class="dropdown-item" href="{{ $authUser->getProfileUrl() }}">
                                <img src="/assets/default/img/icons/profile.svg" width="25" alt="nav-icon">
                                <span class="font-14 text-dark-blue">{{ trans('public.my_profile') }}</span>
                            </a>
                        @endif
                        <a class="dropdown-item" href="/logout">
                            <img src="/assets/default/img/icons/sidebar/logout.svg" width="25" alt="nav-icon">
                            <span class="font-14 text-dark-blue">{{ trans('panel.log_out') }}</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="d-flex align-items-center ml-md-50">
                    <a href="/login" class="py-5 px-10 mr-10 text-dark-blue font-14">{{ trans('auth.login') }}</a>
                    <a href="/register" class="py-5 px-10 text-dark-blue font-14">{{ trans('auth.register') }}</a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts_bottom')
    <link href="/assets/default/vendors/flagstrap/css/flags.css" rel="stylesheet">
    <script src="/assets/default/vendors/flagstrap/js/jquery.flagstrap.min.js"></script>
    <script src="/assets/default/js/parts/top_nav_flags.min.js"></script>
@endpush --}}
        
<header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
    <p class="main-title bhf-hidden" itemprop="headline">
        <a href="" title="Entrepreneur, Business and Corporate WordPress Theme" rel="home"></a>
    </p>
    <div data-elementor-type="wp-post" data-elementor-id="692" class="elementor elementor-692">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-7afead5e elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="7afead5e" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-5dae9012"
                                data-id="5dae9012" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-509e3e3e elementor-widget elementor-widget-sm-logo"
                                            data-id="509e3e3e" data-element_type="widget"
                                            data-widget_type="sm-logo.default">
                                            <div class="elementor-widget-container">
                                                <a class="seq_logo">
                                                    <div class="seq_logo_img">
                                                        <img src="@if (request()->is('login')) assets\images\logorojo.png @else assets\images\logo.png @endif"
                                                            alt="">

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-426efc65"
                                data-id="426efc65" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="sm_display_inline elementor-element elementor-element-76c6a9d8 elementor-widget__width-auto elementor-widget elementor-widget-sm-menu"
                                            data-id="76c6a9d8" data-element_type="widget"
                                            data-widget_type="sm-menu.default">
                                            <div class="elementor-widget-container">
                                                <div id="elementor-header-primary" class="elementor-header">
                                                    <button class="sm_menu_toggle">
                                                        <i class="ti ti-menu"></i>
                                                    </button>
                                                    <div id="sm_menu" class="sm_menu">
                                                        <nav itemtype="http://schema.org/SiteNavigationElement"
                                                            itemscope="itemscope" id="elementor-navigation"
                                                            class="elementor-navigation" role="navigation"
                                                            aria-label="Elementor Menu">
                                                            <ul id="sm_nav_menu" class="sm_nav_menu">
                                                                <li id="menu-item-3022"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-46 current_page_item menu-item-3022">
                                                                    <a href=""
                                                                        style="color: @if (request()->is('login')) #171347 @else #FFFFFF @endif;"
                                                                        aria-current="page">Home</a>
                                                                </li>
                                                                <li id="menu-item-3022"
                                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-46 current_page_item menu-item-3022">

                                                                    @if (!empty($authUser))
                                                                        <a style="color: @if (request()->is('login')) #171347 @else #FFFFFF @endif;"
                                                                            href="{{ $authUser->isAdmin() ? '/admin' : '/panel' }}">{{ trans('public.my_panel') }}
                                                                        </a>
                                                                    @else
                                                                        <a style="color: @if (request()->is('login')) #171347 @else #FFFFFF @endif;"
                                                                            href="/login">{{ trans('auth.login') }}</a>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
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
</header>