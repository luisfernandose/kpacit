{{-- <!DOCTYPE html>

    
<html lang="{{ app()->getLocale() }}">



<head>
    @include(getTemplate() . '.includes.metas')
    <title>
        {{ $pageTitle ?? '' }}{{ !empty($generalSettings['site_name']) ? ' | ' . $generalSettings['site_name'] : '' }}
    </title>

    <!-- General CSS File -->
    <link href="/assets/default/css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/simplebar/simplebar.css">
    <link rel="stylesheet" href="/assets/default/css/app.css">

    @if ($isRtl)
        <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
    @endif

    @stack('styles_top')
    @stack('scripts_top')

    <style>
        {!! !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : '' !!}
    </style>


    @if (!empty($generalSettings['preloading']) and $generalSettings['preloading'] == '1')
        @include('admin.includes.preloading')
    @endif
</head>

<body class="@if ($isRtl) rtl @endif" oncontextmenu="return false;">

    <div id="app">

        @include(getTemplate() . '.includes.top_nav')
        @include(getTemplate() . '.includes.navbar')

        @yield('content')

        @include(getTemplate() . '.includes.footer')
    </div>
    <!-- Template JS File -->
    <script src="/assets/default/js/app.js"></script>
    <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>
    <script type="text/javascript" src="/assets/default/vendors/simplebar/simplebar.min.js"></script>

    <script type="text/javascript">
        var currentHtmlContent;

        var element = new Image();

        var elementWithHiddenContent = document.querySelector("#element-to-hide");

        var innerHtml = elementWithHiddenContent.innerHTML;



        element.__defineGetter__("id", function() {

            currentHtmlContent = "";

        });



        setInterval(function() {

            currentHtmlContent = innerHtml;



            console.clear();

            elementWithHiddenContent.innerHTML = currentHtmlContent;

        }, 1000);
    </script>

    <script>
        var deleteAlertTitle = '{{ trans('public.are_you_sure') }}';
        var deleteAlertHint = '{{ trans('public.deleteAlertHint') }}';
        var deleteAlertConfirm = '{{ trans('public.deleteAlertConfirm') }}';
        var deleteAlertCancel = '{{ trans('public.cancel') }}';
        var deleteAlertSuccess = '{{ trans('public.success') }}';
        var deleteAlertFail = '{{ trans('public.fail') }}';
        var deleteAlertFailHint = '{{ trans('public.deleteAlertFailHint') }}';
        var deleteReason = '{{ trans('public.deleteReason') }}';
        var deleteAlertSuccessHint = '{{ trans('public.deleteAlertSuccessHint') }}';
    </script>

    @if (session()->has('toast'))
        <script>
            (function() {
                "use strict";

                $.toast({
                    heading: '{{ session()->get('toast')['title'] ?? '' }}',
                    text: '{{ session()->get('toast')['msg'] ?? '' }}',
                    bgColor: '@if (session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                    textColor: 'white',
                    hideAfter: 10000,
                    position: 'bottom-right',
                    icon: '{{ session()->get('toast')['status'] }}'
                });
            })(jQuery)
        </script>
    @endif

    @stack('styles_bottom')
    @stack('scripts_bottom')

    <script src="/assets/default/js/parts/main.min.js"></script>

    <script>
        {!! !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : '' !!}
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en-US">
@php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];
    
    $isRtl = (in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages) or !empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1);
@endphp

<head>
    <meta charset="UTF-8">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <!-- This site is optimized with the Yoast SEO plugin v19.6 - https://yoast.com/wordpress/plugins/seo/ -->
    <title>
        {{ $pageTitle ?? '' }}{{ !empty($generalSettings['site_name']) ? ' | ' . $generalSettings['site_name'] : '' }}
    </title>

    @if (!request()->is('/'))
        @include(getTemplate() . '.includes.metas')

        <!-- General CSS File -->
        <link href="/assets/default/css/font.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="/assets/default/vendors/toast/jquery.toast.min.css">
        <link rel="stylesheet" href="/assets/default/vendors/simplebar/simplebar.css">
        <link rel="stylesheet" href="/assets/default/css/app.css">

        @if ($isRtl)
            <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
        @endif

        @stack('styles_top')
        @stack('scripts_top')

        <style>
            {!! !empty(getCustomCssAndJs('css')) ? getCustomCssAndJs('css') : '' !!}
        </style>


        @if (!empty($generalSettings['preloading']) and $generalSettings['preloading'] == '1')
            @include('admin.includes.preloading')
        @endif
    @endif

    <link rel="canonical" href="" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kpacit" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="https://kpacit.com/" />
    <meta property="og:site_name" content="capacitacion, cursos, empresas" />
    <meta property="article:modified_time" content="2022-08-15T05:48:01+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="6 minutes" />
    <script type="application/ld+json" class="yoast-schema-graph">
      {
        "@context": "https://schema.org",
        "@graph": [{
          "@type": "WebPage",
          "@id": "https://www.kpacit.com/",
          "url": "https://www.kpacit.com/",
          "name": "Sequoia - Entrepreneur, Business and Corporate WordPress Theme",
          "isPartOf": {
            "@id": "https://www.kpacit.com/"
          },
          "primaryImageOfPage": {
            "@id": "https://www.kpacit.com/"
          },
          "image": {
            "@id": "https://www.kpacit.com/"
          },
          "thumbnailUrl": "2019/03/photo-1521119989659-a83eee488004-1.jpeg",
          "datePublished": "2019-03-19T08:04:12+00:00",
          "dateModified": "2022-08-15T05:48:01+00:00",
          "breadcrumb": {
            "@id": "https://sequoia.stylemixthemes.com/12_corporate/#breadcrumb"
          },
          "inLanguage": "en-US",
          "potentialAction": [{
            "@type": "ReadAction",
            "target": ["https://sequoia.stylemixthemes.com/12_corporate/"]
          }]
        }, {
          "@type": "ImageObject",
          "inLanguage": "en-US",
          "@id": "https://sequoia.stylemixthemes.com/12_corporate/#primaryimage",
          "url": "2019/03/photo-1521119989659-a83eee488004-1.jpeg",
          "contentUrl": "2019/03/photo-1521119989659-a83eee488004-1.jpeg",
          "caption": ""
        }, {
          "@type": "BreadcrumbList",
          "@id": "https://sequoia.stylemixthemes.com/12_corporate/#breadcrumb",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Home"
          }]
        }, {
          "@type": "WebSite",
          "@id": "https://sequoia.stylemixthemes.com/12_corporate/#website",
          "url": "https://sequoia.stylemixthemes.com/12_corporate/",
          "name": "Entrepreneur, Business and Corporate WordPress Theme",
          "description": "",
          "potentialAction": [{
            "@type": "SearchAction",
            "target": {
              "@type": "EntryPoint",
              "urlTemplate": "https://sequoia.stylemixthemes.com/12_corporate/?s={search_term_string}"
            },
            "query-input": "required name=search_term_string"
          }],
          "inLanguage": "en-US"
        }]
      }
    </script>
    <!-- / Yoast SEO plugin. -->
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="alternate" type="application/rss+xml"
        title="Entrepreneur, Business and Corporate WordPress Theme &raquo; Feed"
        href="https://sequoia.stylemixthemes.com/12_corporate/feed/" />
    <link rel="alternate" type="application/rss+xml"
        title="Entrepreneur, Business and Corporate WordPress Theme &raquo; Comments Feed"
        href="https://sequoia.stylemixthemes.com/12_corporate/comments/feed/" />
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/sequoia.stylemixthemes.com\/12_corporate\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.0.1"
            }
        };
        /*! This file is auto-generated */
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode,
                    e = (p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0), i.toDataURL());
                return p.clearRect(0, 0, i.width, i.height),
                    p.fillText(a.apply(this, t), 0, 0),
                    e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e,
                    t.defer = t.type = "text/javascript",
                    a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                    if (!p || !p.fillText) return !1;
                    switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                        case "flag":
                            return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([
                                55356, 56826, 55356, 56819
                            ], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418,
                                56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447
                            ], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203,
                                56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447
                            ]);
                        case "emoji":
                            return !s([129777, 127995, 8205, 129778, 127999], [129777, 127995, 8203, 129778, 127999])
                    }
                    return !1
                }(o[r]),
                t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports
                    .everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag,
                t.DOMReady = !1,
                t.readyCallback = function() {
                    t.DOMReady = !0
                },
                t.supports.everything || (n = function() {
                        t.readyCallback()
                    }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !
                        1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                        "complete" === a.readyState && t.readyCallback()
                    })),
                    (e = t.source || {}).concatemoji ? c(e.concatemoji) : e.wpemoji && e.twemoji && (c(e.twemoji), c(e
                        .wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='theme-icons-css' href='assets/fonts/icons.css' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-widgets-style-css' href='assets/css/widgets_style.css?ver=1686074353'
        type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css' href='assets/css/owl.carousel.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='wp-block-library-css' href='dist/block-library/style.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='videos-library-css' href='css/Video.css' type='text/css' media='all' />
    <style id='wp-block-library-theme-inline-css' type='text/css'>
        .wp-block-audio figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-audio figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-code {
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: Menlo, Consolas, monaco, monospace;
            padding: .8em 1em
        }

        .wp-block-embed figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-embed figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .blocks-gallery-caption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .blocks-gallery-caption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-image figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-image figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-pullquote {
            border-top: 4px solid;
            border-bottom: 4px solid;
            margin-bottom: 1.75em;
            color: currentColor
        }

        .wp-block-pullquote__citation,
        .wp-block-pullquote cite,
        .wp-block-pullquote footer {
            color: currentColor;
            text-transform: uppercase;
            font-size: .8125em;
            font-style: normal
        }

        .wp-block-quote {
            border-left: .25em solid;
            margin: 0 0 1.75em;
            padding-left: 1em
        }

        .wp-block-quote cite,
        .wp-block-quote footer {
            color: currentColor;
            font-size: .8125em;
            position: relative;
            font-style: normal
        }

        .wp-block-quote.has-text-align-right {
            border-left: none;
            border-right: .25em solid;
            padding-left: 0;
            padding-right: 1em
        }

        .wp-block-quote.has-text-align-center {
            border: none;
            padding-left: 0
        }

        .wp-block-quote.is-large,
        .wp-block-quote.is-style-large,
        .wp-block-quote.is-style-plain {
            border: none
        }

        .wp-block-search .wp-block-search__label {
            font-weight: 700
        }

        :where(.wp-block-group.has-background) {
            padding: 1.25em 2.375em
        }

        .wp-block-separator.has-css-opacity {
            opacity: .4
        }

        .wp-block-separator {
            border: none;
            border-bottom: 2px solid;
            margin-left: auto;
            margin-right: auto
        }

        .wp-block-separator.has-alpha-channel-opacity {
            opacity: 1
        }

        .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
            width: 100px
        }

        .wp-block-separator.has-background:not(.is-style-dots) {
            border-bottom: none;
            height: 1px
        }

        .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
            height: 2px
        }

        .wp-block-table thead {
            border-bottom: 3px solid
        }

        .wp-block-table tfoot {
            border-top: 3px solid
        }

        .wp-block-table td,
        .wp-block-table th {
            padding: .5em;
            border: 1px solid;
            word-break: normal
        }

        .wp-block-table figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-table figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-video figcaption {
            color: #555;
            font-size: 13px;
            text-align: center
        }

        .is-dark-theme .wp-block-video figcaption {
            color: hsla(0, 0%, 100%, .65)
        }

        .wp-block-template-part.has-background {
            padding: 1.25em 2.375em;
            margin-top: 0;
            margin-bottom: 0
        }
    </style>
    <link rel='stylesheet' id='wc-blocks-vendors-style-css' href='woocommerce-blocks/build/wc-blocks-vendors-style.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-css' href='woocommerce-blocks/build/wc-blocks-style.css' type='text/css'
        media='all' />
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css' href='includes/css/styles.css' type='text/css' media='all' />
    <link rel='stylesheet' id='stm_zoom_main-css' href='css/frontend/main.css' type='text/css' media='all' />
    <link rel='stylesheet' id='stm_demos-css' href='assets/css/demo.css' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css' href='assets/css/woocommerce-layout.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css' href='assets/css/woocommerce-smallscreen.css'
        type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css' href='assets/css/woocommerce.css' type='text/css'
        media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='font-awesome-min-css' href='assets/vendors/font-awesome.min.css?ver=1686074353'
        type='text/css' media='all' />
    <link rel='stylesheet' id='hfe-style-css' href='assets/css/header-footer-elementor.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-css' href='eicons/css/elementor-icons.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-frontend-legacy-css' href='assets/css/frontend-legacy.min.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='assets/css/frontend.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-5741-css' href='elementor/css/post-5741.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='font-awesome-5-all-css' href='font-awesome/css/all.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='font-awesome-4-shim-css' href='font-awesome/css/v4-shims.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-46-css' href='elementor/css/post-46.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='hfe-widgets-style-css' href='inc/widgets-css/frontend.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-692-css' href='elementor/css/post-692.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-post-700-css' href='elementor/css/post-700.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='sequoia-studio-fonts-css'
        href='//fonts.googleapis.com/css?family=Nunito+Sans%3A400%2C500%2C600%2C700%2C800%2C900%7CManrope%3A400%2C500%2C600%2C700&#038;ver=1.0.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='sequoia-main-styles-css' href='assets/css/sequoia_style.css?ver=1686074353'
        type='text/css' media='all' />
    <link rel='stylesheet' id='sequoia-spacings-css' href='assets/css/theme-globals.css?ver=1686074353'
        type='text/css' media='all' />
    <link rel='stylesheet' id='select2-css' href='assets/css/select2.css' type='text/css' media='all' />
    <link rel='stylesheet' id='sequoia-responsive-styles-css' href='assets/css/responsive.css?ver=1686074353'
        type='text/css' media='all' />
    <link rel='stylesheet' id='themify-icons-css' href='assets/fonts/themify-icons.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='dashicons-css' href='wp-includes/css/dashicons.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='sequoia-style-css' href='themes/sequoia/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='stm_megamenu-css' href='assets/css/megamenu.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'
        href='https://fonts.googleapis.com/css?family=Manrope%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CNunito+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.0.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css' href='font-awesome/css/fontawesome.min.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-regular-css' href='font-awesome/css/regular.min.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='font-awesome/css/solid.min.css' type='text/css'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-brands-css' href='font-awesome/css/brands.min.css' type='text/css'
        media='all' />
    <script type='text/javascript' src='js/jquery/jquery.min.js' id='jquery-core-js'></script>
    <script type='text/javascript' src='js/jquery/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script type='text/javascript' src='assets/js/skroll-r.js' id='skroll-r-js'></script>
    <script type='text/javascript' src='assets/js/jquery.event.move.js' id='eventmove-js'></script>
    <script type='text/javascript' src='assets/js/jquery.twentytwenty.js' id='twentytwenty-js'></script>
    <script type='text/javascript' src='assets/js/countdown.js' id='countdown-js'></script>
    <script type='text/javascript' src='assets/js/typed.min.js' id='typed-js'></script>
    <script type='text/javascript' src='assets/js/owl.carousel.min.js' id='owl-carousel-js'></script>
    <script type='text/javascript' src='shortcode-for-current-date/dist/script.js'
        id='shortcode-for-current-date-script-js'></script>
    <script type='text/javascript' src='font-awesome/js/v4-shims.min.js' id='font-awesome-4-shim-js'></script>
    <script type='text/javascript' src='wp-includes/js/imagesloaded.min.js' id='imagesloaded-js'></script>
    <script type='text/javascript' src='wp-includes/js/masonry.min.js' id='masonry-js'></script>
    <script type='text/javascript' src='assets/js/isotope.pkgd.min.js' id='isotope-js'></script>
    <script type='text/javascript' src='assets/js/megamenu.js' id='stm_megamenu-js'></script>
    <link rel="https://api.w.org/" href="https://sequoia.stylemixthemes.com/12_corporate/wp-json/" />
    <link rel="alternate" type="application/json" href="v2/pages/46" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD"
        href="https://sequoia.stylemixthemes.com/12_corporate/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml"
        href="https://sequoia.stylemixthemes.com/12_corporate/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 6.0.1" />
    <meta name="generator" content="WooCommerce 6.8.2" />
    <link rel='shortlink' href='https://www.kpacit.com/' />
    <link rel="alternate" type="application/json+oembed" href="oembed/1.0/embed" />
    <link rel="alternate" type="text/xml+oembed" href="oembed/1.0/embed'&#038;format=xml" />
    <script type="text/javascript">
        window.ccb_nonces = {
            "ccb_paypal": "0b6f0aeaf0",
            "ccb_stripe": "f5cc3bf5d2",
            "ccb_contact_form": "29ea7be005",
            "ccb_woo_checkout": "1930567e26",
            "ccb_add_order": "582ffdc618",
            "ccb_orders": "7702bcb022",
            "ccb_update_order": "4493bf37be",
            "ccb_send_invoice": "5061d37ef3",
            "ccb_get_invoice": "df11534554"
        };
    </script>
    <script>
        var daysStr = "Days";
        var hoursStr = "Hours";
        var minutesStr = "Minutes";
        var secondsStr = "Seconds";
    </script>
    <script type="text/javascript">
        var stm_wpcfto_ajaxurl = 'https://sequoia.stylemixthemes.com/12_corporate/wp-admin/admin-ajax.php';
    </script>
    <style>
        .vue_is_disabled {
            display: none;
        }
    </style>
    <script>
        var stm_wpcfto_nonces = {
            "wpcfto_save_settings": "b03ed67861",
            "get_image_url": "c638bd07ec",
            "wpcfto_upload_file": "81471e17c7",
            "wpcfto_search_posts": "1238dc9122"
        };
    </script>
    <script type="text/javascript">
        window.wp_data = {
            "stm_ajax_add_review": "afd0ae4825",
            "sequoia_install_plugin": "b1d8fb9134"
        };
    </script>
    <script>
        let stm_ajax_add_review = 'afd0ae4825';
    </script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>

    <link rel="icon" href="2022/06/favicon.svg" sizes="32x32" />
    <link rel="icon" href="2022/06/favicon.svg" sizes="192x192" />
    <link rel="apple-touch-icon" href="2022/06/favicon.svg" />
    <meta name="msapplication-TileImage" content="2022/06/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
</head>

<body
    class="home page-template page-template-elementor_canvas page page-id-46 wp-embed-responsive theme-sequoia woocommerce-no-js ehf-header ehf-footer ehf-template-sequoia ehf-stylesheet-sequoia no-sidebar elementor-default elementor-template-canvas elementor-kit-5741 elementor-page elementor-page-46">
    <div class="seq_page">
        @include(getTemplate() . '.includes.top_nav')
        @yield('content')
        @include(getTemplate() . '.includes.footer')
    </div>

    @if (!request()->is('/'))
        <!-- Template JS File -->
        <script src="/assets/default/js/app.js"></script>
        <script src="/assets/default/vendors/feather-icons/dist/feather.min.js"></script>
        <script src="/assets/default/vendors/moment.min.js"></script>
        <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="/assets/default/vendors/toast/jquery.toast.min.js"></script>
        <script type="text/javascript" src="/assets/default/vendors/simplebar/simplebar.min.js"></script>

        <script type="text/javascript">
            var currentHtmlContent;

            var element = new Image();

            var elementWithHiddenContent = document.querySelector("#element-to-hide");

            var innerHtml = elementWithHiddenContent.innerHTML;



            element.__defineGetter__("id", function() {

                currentHtmlContent = "";

            });



            setInterval(function() {

                currentHtmlContent = innerHtml;



                console.clear();

                elementWithHiddenContent.innerHTML = currentHtmlContent;

            }, 1000);
        </script>

        <script>
            var deleteAlertTitle = '{{ trans('public.are_you_sure') }}';
            var deleteAlertHint = '{{ trans('public.deleteAlertHint') }}';
            var deleteAlertConfirm = '{{ trans('public.deleteAlertConfirm') }}';
            var deleteAlertCancel = '{{ trans('public.cancel') }}';
            var deleteAlertSuccess = '{{ trans('public.success') }}';
            var deleteAlertFail = '{{ trans('public.fail') }}';
            var deleteAlertFailHint = '{{ trans('public.deleteAlertFailHint') }}';
            var deleteReason = '{{ trans('public.deleteReason') }}';
            var deleteAlertSuccessHint = '{{ trans('public.deleteAlertSuccessHint') }}';
        </script>

        @if (session()->has('toast'))
            <script>
                (function() {
                    "use strict";

                    $.toast({
                        heading: '{{ session()->get('toast')['title'] ?? '' }}',
                        text: '{{ session()->get('toast')['msg'] ?? '' }}',
                        bgColor: '@if (session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                        textColor: 'white',
                        hideAfter: 10000,
                        position: 'bottom-right',
                        icon: '{{ session()->get('toast')['status'] }}'
                    });
                })(jQuery)
            </script>
        @endif

        @stack('styles_bottom')
        @stack('scripts_bottom')

        <script src="/assets/default/js/parts/main.min.js"></script>

        <script>
            {!! !empty(getCustomCssAndJs('js')) ? getCustomCssAndJs('js') : '' !!}
        </script>
    @endif

    <script type="text/javascript">
        jQuery('document').ready(function() {
            var $ = jQuery;
            var api_url = 'https://stylemixthemes.com/api/prices.json';
            $.ajax({
                url: api_url,
                dataType: 'json',
                context: this,
                complete: function(data) {
                    var r = data.responseJSON;
                    var price = (typeof r.themes.elab === 'undefined') ? '$19' : r.themes.debutant
                        .price;
                    $('.stm_price_api').text(price);
                }
            });
            $('#sequoia-demos').on('click', function() {
                $('.stm_theme_demos__popup').addClass('opened');
                $('body').addClass('fancy-lock');
                $('.demo img').each(function() {
                    $(this).attr('src', $(this).data('src'));
                });
            });
            $('.stm_theme_demos__close').on('click', function() {
                $('.stm_theme_demos__popup').removeClass('opened');
                $('body').removeClass('fancy-lock');
            })
        });
    </script>
    <script>
        (function() {
            function maybePrefixUrlField() {
                if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                    this.value = "http://" + this.value;
                }
            }
            var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
            if (urlFields) {
                for (var j = 0; j < urlFields.length; j++) {
                    urlFields[j].addEventListener('blur', maybePrefixUrlField);
                }
            }
        })();
    </script>
    <script type="text/javascript">
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>
    <link rel='stylesheet' id='e-animations-css' href='lib/animations/animations.min.css' type='text/css'
        media='all' />
    <script type='text/javascript' src='assets/js/scripts.js?ver=1686074353' id='theme-js-js'></script>
    <script type='text/javascript' src='swv/js/index.js' id='swv-js'></script>
    <script type='text/javascript' id='contact-form-7-js-extra'>
        /* 
                                                                                    <![CDATA[ */
        var wpcf7 = {
            "api": {
                "root": "https:\/\/sequoia.stylemixthemes.com\/12_corporate\/wp-json\/",
                "namespace": "contact-form-7\/v1"
            }
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='includes/js/index.js' id='contact-form-7-js'></script>
    <script type='text/javascript' src='js/frontend/main.js' id='stm_zoom_main-js'></script>
    <script type='text/javascript' src='js/jquery-blockui/jquery.blockUI.min.js' id='jquery-blockui-js'></script>
    <script type='text/javascript' id='wc-add-to-cart-js-extra'>
        /* 
                                                                                    <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/12_corporate\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/12_corporate\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "View cart",
            "cart_url": "https:\/\/sequoia.stylemixthemes.com\/12_corporate\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='js/frontend/add-to-cart.min.js' id='wc-add-to-cart-js'></script>
    <script type='text/javascript' src='js/js-cookie/js.cookie.min.js' id='js-cookie-js'></script>
    <script type='text/javascript' id='woocommerce-js-extra'>
        /* 
                                                                                    <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/12_corporate\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/12_corporate\/?wc-ajax=%%endpoint%%"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='js/frontend/woocommerce.min.js' id='woocommerce-js'></script>
    <script type='text/javascript' id='wc-cart-fragments-js-extra'>
        /* 
                                                                                    <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/12_corporate\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "\/12_corporate\/?wc-ajax=%%endpoint%%",
            "cart_hash_key": "wc_cart_hash_45ec90eb6faadb806463aefcde027096",
            "fragment_name": "wc_fragments_45ec90eb6faadb806463aefcde027096",
            "request_timeout": "5000"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='js/frontend/cart-fragments.min.js' id='wc-cart-fragments-js'></script>
    <script type='text/javascript' src='assets/js/navigation.js' id='sequoia-navigation-js'></script>
    <script type='text/javascript' src='assets/js/sequoia_script.js?ver=1686074353' id='sequoia-main-scripts-js'></script>
    <script type='text/javascript' src='js/select2/select2.full.min.js' id='select2-js'></script>
    <script type='text/javascript' src='assets/js/skip-link-focus-fix.js' id='sequoia-skip-link-focus-fix-js'></script>
    <script type='text/javascript' src='assets/js/webpack.runtime.min.js' id='elementor-webpack-runtime-js'></script>
    <script type='text/javascript' src='assets/js/frontend-modules.min.js' id='elementor-frontend-modules-js'></script>
    <script type='text/javascript' src='lib/waypoints/waypoints.min.js' id='elementor-waypoints-js'></script>
    <script type='text/javascript' src='jquery/ui/core.min.js' id='jquery-ui-core-js'></script>
    <script type='text/javascript' src='lib/swiper/swiper.min.js' id='swiper-js'></script>
    <script type='text/javascript' src='lib/share-link/share-link.min.js' id='share-link-js'></script>
    <script type='text/javascript' src='lib/dialog/dialog.min.js' id='elementor-dialog-js'></script>
    <script type='text/javascript' id='elementor-frontend-js-before'>
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile",
                        "value": 767,
                        "default_value": 767,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "mobile_extra": {
                        "label": "Mobile Extra",
                        "value": 880,
                        "default_value": 880,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "tablet": {
                        "label": "Tablet",
                        "value": 1024,
                        "default_value": 1024,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "tablet_extra": {
                        "label": "Tablet Extra",
                        "value": 1200,
                        "default_value": 1200,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "laptop": {
                        "label": "Laptop",
                        "value": 1366,
                        "default_value": 1366,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "widescreen": {
                        "label": "Widescreen",
                        "value": 2400,
                        "default_value": 2400,
                        "direction": "min",
                        "is_enabled": false
                    }
                }
            },
            "version": "3.7.2",
            "is_static": false,
            "experimentalFeatures": {
                "e_import_export": true,
                "e_hidden_wordpress_widgets": true,
                "landing-pages": true,
                "elements-color-picker": true,
                "favorite-widgets": true,
                "admin-top-bar": true
            },
            "urls": {
                "assets": "https:\/\/sequoia.stylemixthemes.com\/12_corporate\/wp-content\/plugins\/elementor\/assets\/"
            },
            "settings": {
                "page": [],
                "editorPreferences": []
            },
            "kit": {
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                "global_image_lightbox": "yes",
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description"
            },
            "post": {
                "id": 46,
                "title": "Sequoia%20-%20Entrepreneur%2C%20Business%20and%20Corporate%20WordPress%20Theme",
                "excerpt": "",
                "featuredImage": false
            }
        };
    </script>
    <script type='text/javascript' src='assets/js/frontend.min.js' id='elementor-frontend-js'></script>
    <script type='text/javascript' src='assets/js/absolute-image.js?ver=1686074353' id='sm-absolute-image-js'></script>
    <script type='text/javascript' src='assets/js/news.js?ver=1686074353' id='sm-news-js'></script>
    <script type='text/javascript' src='assets/js/seq-slider.js?ver=1686074353' id='sm-slider-js'></script>
    <script type='text/javascript' src='assets/js/testimonials.js?ver=1686074353' id='sm-testimonials-js'></script>
    <script type='text/javascript' defer src='assets/js/forms.js' id='mc4wp-forms-api-js'></script>
    <script type='text/javascript' src='assets/js/preloaded-modules.min.js' id='preloaded-modules-js'></script>
    <script>
        (function() {
            var js =
                "window['__CF$cv$params']={r:'7d328c40d91ddaf9',m:'QEFD5vytugLTpoNQG3Kf9048W0ArDV9kfkgbV_Oj.8Q-1686074354-0-AQW2u7LIre2CdYqelGc10Dm4BgaFekwiLdkyRvaWZP/c',u:'/cdn-cgi/challenge-platform/h/g'};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/../js/scripts/invisible.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.nonce = '';
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    <script>
        function scrollToSection(event, section) {
            event.preventDefault();
            const seccion = document.getElementById(section);
            // Realizar el desplazamiento suave utilizando scrollIntoView y el objeto de opciones
            seccion.scrollIntoView({
                behavior: "smooth" // Añade la transición suave
            });
        }
    </script>
</body>

</html>
