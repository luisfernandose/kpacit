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

        <div data-elementor-type="wp-post" data-elementor-id="46" class="elementor elementor-46">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-3aa8981a elementor-section-height-full elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                        data-id="3aa8981a" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;video&quot;,&quot;background_video_link&quot;:&quot;https:\/\/www.youtube.com\/watch?v=zwUsFN__jtE&quot;,&quot;background_video_start&quot;:5,&quot;background_play_on_mobile&quot;:&quot;yes&quot;}">
                        <div class="elementor-background-video-container">
                            <div class="elementor-background-video-embed"></div>
                        </div>
                        <div class="elementor-background-overlay"></div>
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1997e883"
                                    data-id="1997e883" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-1532a98c elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="1532a98c" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                data-widget_type="heading.default">
                                                <div style="margin-top: 10%;" class="elementor-widget-container">
                                                    <h4 style="font-size:70px;"
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">COMIENZA A
                                                            GESTIONAR EL CONOCIMIENTO DE TU EMPRESA</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-26773def elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="26773def" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <div
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">Conoce KPACIT y
                                                            descubre las herramientas que llevarán a tu empresa al
                                                            siguiente nivel</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <section
                                                class="elementor-section elementor-inner-section elementor-element elementor-element-fc2325d elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                data-id="fc2325d" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-22cf73f"
                                                            data-id="22cf73f" data-element_type="column">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-7093fd6a elementor-invisible elementor-widget elementor-widget-sm-default-button"
                                                                        data-id="7093fd6a" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}"
                                                                        data-widget_type="sm-default-button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <a onclick="scrollToSection(event,'seccionemail')"
                                                                                class="elementor-button elementor-repeater-item-2f5c14d btn">
                                                                                <span>Solicita Cotización</span>
                                                                                <i class="ti ti-arrow-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-ad1f8ae"
                                                            data-id="ad1f8ae" data-element_type="column">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-b6d75a0 elementor-invisible elementor-widget elementor-widget-sm-video-link"
                                                                        data-id="b6d75a0" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}"
                                                                        data-widget_type="sm-video-link.default">
                                                                        <div class="elementor-widget-container">
                                                                            <a onclick="scrollToSection(event,'seccionvideos')"
                                                                                class="sm_video_link sm_video_link_text">
                                                                                <span>
                                                                                    <b></b>
                                                                                    <i class="fa fa-play"></i>
                                                                                </span>
                                                                                <b>Mirar Videos</b>
                                                                            </a>
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
                        </div>
                    </section>
                    <section id="pensandoenti"
                        class="elementor-section elementor-top-section elementor-element elementor-element-70494582 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="70494582" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-15b8854a"
                                    data-id="15b8854a" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-293b6bfb elementor-widget elementor-widget-heading"
                                                data-id="293b6bfb" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <p
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">DISEÑADO PENSANDO
                                                            EN TI</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-6ed365af elementor-widget elementor-widget-heading"
                                                data-id="6ed365af" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h3
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> CONOCE TODO LO QUE
                                                            PUEDES HACER CON <b>Kpacit</b>
                                                        </span>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-5e865f83 elementor-widget elementor-widget-text-editor"
                                                data-id="5e865f83" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <p>Hemos desarrollado un conjunto de herramientas que te
                                                            permitirá organizar y distribuir el
                                                            conocimiento de tu empresa, al tiempo que puedes obtener
                                                            métricas en tiempo real de cómo
                                                            se ha capacitado tu personal y qué necesidades de
                                                            capacitación hay en la empresa</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-7319d3ff elementor-widget elementor-widget-sm-default-button"
                                                data-id="7319d3ff" data-element_type="widget"
                                                data-widget_type="sm-default-button.default">
                                                <div class="elementor-widget-container">
                                                    <a onclick="scrollToSection(event,'seccionemail')"
                                                        class="elementor-button elementor-repeater-item-32a7416 btn  ">
                                                        <span>Solicita Asesoria</span>
                                                        <i class="ti ti-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7f80c07f"
                                    data-id="7f80c07f" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-2c63620b elementor-widget__width-initial elementor-invisible elementor-widget elementor-widget-sm-absolute-image"
                                                data-id="2c63620b" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;,&quot;_animation_delay&quot;:200}"
                                                data-widget_type="sm-absolute-image.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_absolute_image seq_absolute_image_bdrs ">
                                                        <div class="seq_default_shadow">
                                                            <div class="seq_image_bck"
                                                                data-image="2022/06/Photo-1.jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-105cbced elementor-invisible elementor-widget elementor-widget-sm-absolute-image"
                                                data-id="105cbced" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}"
                                                data-widget_type="sm-absolute-image.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_absolute_image seq_absolute_image_bdrs ">
                                                        <div class="seq_default_shadow">
                                                            <div class="seq_image_bck"
                                                                data-image="2022/06/Photo-3.jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-5b212abb elementor-invisible elementor-widget elementor-widget-sm-absolute-image"
                                                data-id="5b212abb" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;_animation_delay&quot;:400}"
                                                data-widget_type="sm-absolute-image.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_absolute_image seq_absolute_image_bdrs ">
                                                        <div class="seq_default_shadow">
                                                            <div class="seq_image_bck"
                                                                data-image="2022/06/Photo-2.jpg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-26f404c9 elementor-widget elementor-widget-spacer"
                                                data-id="26f404c9" data-element_type="widget"
                                                data-widget_type="spacer.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-spacer">
                                                        <div class="elementor-spacer-inner"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="seccionvideos"
                        class="elementor-section elementor-top-section elementor-element elementor-element-35b7b6c5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="35b7b6c5" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-18c838c8"
                                    data-id="18c838c8" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-85df994 elementor-widget elementor-widget-heading"
                                                data-id="85df994" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <p
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">VIDEOS</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="sm_animated elementor-element elementor-element-9c1ee8c elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="9c1ee8c" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> Algunos de
                                                            nuestros <b>Videos</b>
                                                        </span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-c352ec6 elementor-widget elementor-widget-text-editor"
                                                data-id="c352ec6" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <p> Encuentra en nuestros videos algunas de las razones por las
                                                            cuáles debes comenzar a
                                                            utilizar kpacit <br />así como demostraciones de como
                                                            funciona la herramienta y lo que
                                                            puedes hacer con ella. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-616a05a3 elementor-widget elementor-widget-sm-news"
                                                data-id="616a05a3" data-element_type="widget"
                                                data-widget_type="sm-news.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_news_grid_wrap">
                                                        <div class="seq_news_default seq_news_grid ">
                                                            <div class="seq_default_shadow">
                                                                <iframe width="500" height="300"
                                                                    src="https://www.youtube.com/embed/vtwtT2Hv_Qw"
                                                                    frameborder="0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="seq_news_default seq_news_grid ">
                                                            <div class="seq_default_shadow">
                                                                <iframe width="500" height="300"
                                                                    src="https://www.youtube.com/embed/c7JKZjVX1So"
                                                                    frameborder="0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="seq_news_default seq_news_grid ">
                                                            <div class="seq_default_shadow">
                                                                <iframe width="500" height="300"
                                                                    src="https://www.youtube.com/embed/6INqgDPYRng"
                                                                    frameborder="0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                        <div class="seq_news_default seq_news_grid ">
                                                            <div class="seq_default_shadow">
                                                                <iframe width="500" height="300"
                                                                    src="https://www.youtube.com/embed/XKYHF9EQy20"
                                                                    frameborder="0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Carousel End -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="queobtienes"
                        class="elementor-section elementor-top-section elementor-element elementor-element-5b749f02 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="5b749f02" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5c64801e"
                                    data-id="5c64801e" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-f7035ea elementor-widget elementor-widget-heading"
                                                data-id="f7035ea" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <p
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">DESCUBRE</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="sm_animated elementor-element elementor-element-2db96e52 elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="2db96e52" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> Descubre que
                                                            obtienes con <b>KPACIT</b>
                                                        </span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <section
                                                class="elementor-section elementor-inner-section elementor-element elementor-element-15e7d8e9 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                data-id="15e7d8e9" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-38623d98"
                                                            data-id="38623d98" data-element_type="column">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-3a26b568 elementor-widget elementor-widget-sm-service-block"
                                                                        data-id="3a26b568" data-element_type="widget"
                                                                        data-widget_type="sm-service-block.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="seq_service_block seq_icon_bg">
                                                                                <i class="ti-briefcase sm_icon">
                                                                                    <span class="icon_background">
                                                                                        <svg width="88px"
                                                                                            height="82px"
                                                                                            viewBox="0 0 88 82"
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                            <g stroke="none"
                                                                                                stroke-width="1"
                                                                                                fill="none"
                                                                                                fill-rule="evenodd">
                                                                                                <g transform="translate(-515.000000, -137.000000)"
                                                                                                    fill="#D8D8D8"
                                                                                                    fill-rule="nonzero">
                                                                                                    <path
                                                                                                        d="M554.664986,137 C580.208769,137 602.316651,146 602.316651,167 C602.316651,188 589.293812,219 561.010365,219 C532.726919,219 518.464439,193.704307 515.366279,179.160795 C512.268119,164.617284 529.121204,137 554.664986,137 Z"
                                                                                                        id="Path-4">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                </i>
                                                                                <h4>Grupos</h4>
                                                                                <p>Creación de grupos para facilitar la
                                                                                    asignación de conocimiento.</p>
                                                                                <p></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-55a202f elementor-widget elementor-widget-sm-default-button"
                                                                        data-id="55a202f" data-element_type="widget"
                                                                        data-widget_type="sm-default-button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <a onclick="scrollToSection(event,'seccionemail')"
                                                                                class="elementor-button elementor-repeater-item-8b9c14f   btn_inline_style">
                                                                                <span>Solicita Asesoria</span>
                                                                                <i class="ti ti-arrow-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5a4a89e5"
                                                            data-id="5a4a89e5" data-element_type="column"
                                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-432e58ee elementor-widget elementor-widget-sm-service-block"
                                                                        data-id="432e58ee" data-element_type="widget"
                                                                        data-widget_type="sm-service-block.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="seq_service_block seq_icon_bg">
                                                                                <i class="ti-bolt sm_icon">
                                                                                    <span class="icon_background">
                                                                                        <svg width="88px"
                                                                                            height="84px"
                                                                                            viewBox="0 0 88 84"
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                            <g stroke="none"
                                                                                                stroke-width="1"
                                                                                                fill="none"
                                                                                                fill-rule="evenodd">
                                                                                                <g transform="translate(-142.000000, -223.000000)"
                                                                                                    fill="#D8D8D8"
                                                                                                    fill-rule="nonzero">
                                                                                                    <path
                                                                                                        d="M182.539737,223.075329 C204.566897,221.929744 229.311641,233.810986 229.311641,261.42827 C229.311641,289.045554 216.183327,310.42827 185.905837,305.42827 C155.628347,300.42827 142,289.510051 142,265.96916 C142,242.42827 160.512577,224.220914 182.539737,223.075329 Z"
                                                                                                        id="Path-3">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                </i>
                                                                                <h4>Asesoría</h4>
                                                                                <p>Acompañamiento permanente para crear
                                                                                    el contenido de tu empresa de forma
                                                                                    profesional .</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-11a2166 elementor-widget elementor-widget-sm-default-button"
                                                                        data-id="11a2166" data-element_type="widget"
                                                                        data-widget_type="sm-default-button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <a onclick="scrollToSection(event,'seccionemail')"
                                                                                class="elementor-button elementor-repeater-item-8b9c14f   btn_inline_style">
                                                                                <span>Solicita Asesoria</span>
                                                                                <i class="ti ti-arrow-right"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-e2f07ec"
                                                            data-id="e2f07ec" data-element_type="column">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-2c472568 elementor-widget elementor-widget-sm-service-block"
                                                                        data-id="2c472568" data-element_type="widget"
                                                                        data-widget_type="sm-service-block.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="seq_service_block seq_icon_bg">
                                                                                <i class="ti-bookmark-alt sm_icon">
                                                                                    <span class="icon_background">
                                                                                        <svg width="86px"
                                                                                            height="86px"
                                                                                            viewBox="0 0 86 86"
                                                                                            version="1.1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                            <g stroke="none"
                                                                                                stroke-width="1"
                                                                                                fill="none"
                                                                                                fill-rule="evenodd">
                                                                                                <g transform="translate(-972.000000, -227.000000)"
                                                                                                    fill="#D8D8D8"
                                                                                                    fill-rule="nonzero">
                                                                                                    <path
                                                                                                        d="M1001.47431,230.061611 C1024.46523,222.652065 1051.91002,228.859752 1056.43175,246.859752 C1060.95347,264.859752 1055.59596,306.859752 1028.27472,311.859752 C1000.95347,316.859752 981.827473,296.565634 974.95347,284.212693 C968.079467,271.859752 971.770089,245.669395 1001.47431,230.061611 Z"
                                                                                                        id="Path-5">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                    </span>
                                                                                </i>
                                                                                <h4>Indicadores</h4>
                                                                                <p>Métricas en tiempo real de cómo van
                                                                                    tus equipos.</p>
                                                                                <p></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-92696f8 elementor-widget elementor-widget-sm-default-button"
                                                                        data-id="92696f8" data-element_type="widget"
                                                                        data-widget_type="sm-default-button.default">
                                                                        <div class="elementor-widget-container">
                                                                            <a onclick="scrollToSection(event,'seccionemail')"
                                                                                class="elementor-button elementor-repeater-item-8b9c14f   btn_inline_style">
                                                                                <span>Solicita Asesoria</span>
                                                                                <i class="ti ti-arrow-right"></i>
                                                                            </a>
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
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-388ae88e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="388ae88e" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-32f80a30"
                                    data-id="32f80a30" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-75396205 elementor-widget elementor-widget-heading"
                                                data-id="75396205" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h3
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> QUIENES NECESITAN
                                                            <b>KPACIT</b>
                                                        </span>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-5b31a148 elementor-widget elementor-widget-accordion"
                                                data-id="5b31a148" data-element_type="widget"
                                                data-widget_type="accordion.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-accordion" role="tablist">
                                                        <div class="elementor-accordion-item">
                                                            <h5 id="elementor-tab-title-1521"
                                                                class="elementor-tab-title" data-tab="1"
                                                                role="tab"
                                                                aria-controls="elementor-tab-content-1521"
                                                                aria-expanded="false">
                                                                <span
                                                                    class="elementor-accordion-icon elementor-accordion-icon-left"
                                                                    aria-hidden="true">
                                                                    <span class="elementor-accordion-icon-closed">
                                                                        <i class="far fa-plus-square"></i>
                                                                    </span>
                                                                    <span class="elementor-accordion-icon-opened">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="30" height="30"
                                                                            viewBox="0 0 30 30" fill="none">
                                                                            <rect width="30" height="30"
                                                                                fill="white"></rect>
                                                                            <g clip-path="url(#clip0_157_310)">
                                                                                <path
                                                                                    d="M19.0069 10.993L10.9931 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M10.9931 10.993L19.0069 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_157_310">
                                                                                    <rect width="16"
                                                                                        height="16" fill="white"
                                                                                        transform="translate(15 3.68628) rotate(45)">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <a class="elementor-accordion-title"
                                                                    href="">Lideres de
                                                                    Proceso</a>
                                                            </h5>
                                                            <div id="elementor-tab-content-1521"
                                                                class="elementor-tab-content elementor-clearfix"
                                                                data-tab="1" role="tabpanel"
                                                                aria-labelledby="elementor-tab-title-1521">
                                                                <p> Necesitan que su personal comience a ser efectivo lo
                                                                    más pronto posible y al mismo
                                                                    tiempo disminuir el tiempo que les toma entrenar a
                                                                    los nuevos colaboradores. </p>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <h5 id="elementor-tab-title-1522"
                                                                class="elementor-tab-title" data-tab="2"
                                                                role="tab"
                                                                aria-controls="elementor-tab-content-1522"
                                                                aria-expanded="false">
                                                                <span
                                                                    class="elementor-accordion-icon elementor-accordion-icon-left"
                                                                    aria-hidden="true">
                                                                    <span class="elementor-accordion-icon-closed">
                                                                        <i class="far fa-plus-square"></i>
                                                                    </span>
                                                                    <span class="elementor-accordion-icon-opened">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="30" height="30"
                                                                            viewBox="0 0 30 30" fill="none">
                                                                            <rect width="30" height="30"
                                                                                fill="white"></rect>
                                                                            <g clip-path="url(#clip0_157_310)">
                                                                                <path
                                                                                    d="M19.0069 10.993L10.9931 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M10.9931 10.993L19.0069 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_157_310">
                                                                                    <rect width="16"
                                                                                        height="16" fill="white"
                                                                                        transform="translate(15 3.68628) rotate(45)">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <a class="elementor-accordion-title"
                                                                    href="">Gerentes
                                                                    de talento humano</a>
                                                            </h5>
                                                            <div id="elementor-tab-content-1522"
                                                                class="elementor-tab-content elementor-clearfix"
                                                                data-tab="2" role="tabpanel"
                                                                aria-labelledby="elementor-tab-title-1522">
                                                                <p> Necesitan disminuir los tiempos de selección y
                                                                    entrenamiento del nuevo personal en
                                                                    ambientes con alta rotación. </p>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-accordion-item">
                                                            <h5 id="elementor-tab-title-1523"
                                                                class="elementor-tab-title" data-tab="3"
                                                                role="tab"
                                                                aria-controls="elementor-tab-content-1523"
                                                                aria-expanded="false">
                                                                <span
                                                                    class="elementor-accordion-icon elementor-accordion-icon-left"
                                                                    aria-hidden="true">
                                                                    <span class="elementor-accordion-icon-closed">
                                                                        <i class="far fa-plus-square"></i>
                                                                    </span>
                                                                    <span class="elementor-accordion-icon-opened">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="30" height="30"
                                                                            viewBox="0 0 30 30" fill="none">
                                                                            <rect width="30" height="30"
                                                                                fill="white"></rect>
                                                                            <g clip-path="url(#clip0_157_310)">
                                                                                <path
                                                                                    d="M19.0069 10.993L10.9931 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M10.9931 10.993L19.0069 19.0069"
                                                                                    stroke="#292929" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0_157_310">
                                                                                    <rect width="16"
                                                                                        height="16" fill="white"
                                                                                        transform="translate(15 3.68628) rotate(45)">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <a class="elementor-accordion-title"
                                                                    href="">Dueños
                                                                    de empresa</a>
                                                            </h5>
                                                            <div id="elementor-tab-content-1523"
                                                                class="elementor-tab-content elementor-clearfix"
                                                                data-tab="3" role="tabpanel"
                                                                aria-labelledby="elementor-tab-title-1523">
                                                                <p> Que necesitan que el conocimiento permanezca al
                                                                    interior de su empresa. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-4e09b98 elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                data-id="4e09b98" data-element_type="widget"
                                                data-widget_type="button.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-button-wrapper">
                                                        <a onclick="scrollToSection(event,'seccionemail')"
                                                            class="elementor-button-link elementor-button elementor-size-sm"
                                                            role="button">
                                                            <span class="elementor-button-content-wrapper">
                                                                <span
                                                                    class="elementor-button-icon elementor-align-icon-right">
                                                                    <i aria-hidden="true"
                                                                        class="fas fa-arrow-right"></i>
                                                                </span>
                                                                <span class="elementor-button-text">Solicita
                                                                    Asesoría</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-598dfa3"
                                    data-id="598dfa3" data-element_type="column"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-11ae08d elementor-widget elementor-widget-sm-slider"
                                                data-id="11ae08d" data-element_type="widget"
                                                data-widget_type="sm-slider.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_slider owl-carousel">
                                                        <div class="seq_slider_item elementor-repeater-item-efe7def">
                                                            <div class="seq_slider_item_over"></div>
                                                            <div class="seq_slider_over_text parallax_title"></div>
                                                            <div class="container">
                                                                <div class="seq_slider_item_title_cont">
                                                                    <div class="seq_slider_item_title"></div>
                                                                    <div class="seq_slider_item_text "></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_slider_item elementor-repeater-item-c9aeffe">
                                                            <div class="seq_slider_item_over"></div>
                                                            <div class="seq_slider_over_text parallax_title"></div>
                                                            <div class="container">
                                                                <div class="seq_slider_item_title_cont">
                                                                    <div class="seq_slider_item_title"></div>
                                                                    <div class="seq_slider_item_text "></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_slider_item elementor-repeater-item-eef2a4b">
                                                            <div class="seq_slider_item_over"></div>
                                                            <div class="seq_slider_over_text parallax_title"></div>
                                                            <div class="container">
                                                                <div class="seq_slider_item_title_cont">
                                                                    <div class="seq_slider_item_title"></div>
                                                                    <div class="seq_slider_item_text "></div>
                                                                </div>
                                                            </div>
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
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-5b749f02 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="888ae79" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-690b2717"
                                    data-id="690b2717" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-138372c elementor-widget elementor-widget-heading"
                                                data-id="138372c" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <p
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">HERRAMIENTAS</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="sm_animated elementor-element elementor-element-676c665 elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="676c665" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> Tenemos un
                                                            conjunto de <b>herramientas</b> que facilitarán la gestión
                                                            del <b>conocimiento</b> al
                                                            interior de tu organización </span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-21b90509 elementor-widget elementor-widget-sm-testimonials"
                                                data-id="21b90509" data-element_type="widget"
                                                data-widget_type="sm-testimonials.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_testimonials owl-carousel" data-items="3"
                                                        data-items-tablet="2" data-items-mobile="1" data-centered=""
                                                        items-gap="5">
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Examenes
                                                                        con evaluación automática</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Cursos de
                                                                        video</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Cursos de
                                                                        texto</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Creación de
                                                                        grupos o departamentos</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Clases en
                                                                        vivo</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Cursos en
                                                                        texto y pdf</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Apoyo para
                                                                        la creación del contenido</div>
                                                                </div>
                                                            </div>
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
                    <section id="secciontesti"
                        class="elementor-section elementor-top-section elementor-element elementor-element-35b7b6c5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="888ae79" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-690b2717"
                                    data-id="690b2717" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-138372c elementor-widget elementor-widget-heading"
                                                data-id="138372c" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <p
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center elementor-align-after-mobile-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active">TESTIMONIOS</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="sm_animated elementor-element elementor-element-676c665 elementor-invisible elementor-widget elementor-widget-heading"
                                                data-id="676c665" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h2
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default elementor-align-after-center">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> Nuestros clientes
                                                            hablan sobre <b>KPACIT</b>
                                                        </span>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-21b90509 elementor-widget elementor-widget-sm-testimonials"
                                                data-id="21b90509" data-element_type="widget"
                                                data-widget_type="sm-testimonials.default">
                                                <div class="elementor-widget-container">
                                                    <div class="seq_testimonials owl-carousel" data-items="3"
                                                        data-items-tablet="2" data-items-mobile="1"
                                                        data-centered="" items-gap="5">
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Nuestros
                                                                        clientes capacitan a sus usuarios en
                                                                        el uso de nuestro sistema, reduciendo
                                                                        significativamente la curva del aprendizaje.
                                                                    </div>
                                                                    <div class="seq_testimonials_item_desc clearfix">
                                                                        <div class="seq_testimonials_item_title_cont">
                                                                            <div
                                                                                class="seq_testimonials_item_img seq_image_bck">
                                                                                <img width="1" height="1"
                                                                                    src="2019/03/photo-1521119989659-a83eee488004-1.jpeg"
                                                                                    class="attachment-thumbnail size-thumbnail"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="seq_testimonials_item_title">
                                                                                <div
                                                                                    class="seq_testimonials_item_title_name">
                                                                                    Andres Villa</div> CTO - Innosoft
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Nuestro
                                                                        personal de ventas se ha entrenado con
                                                                        kpacit disminuyendo el tiempo necesario para que
                                                                        puedan atender los clientes.</div>
                                                                    <div class="seq_testimonials_item_desc clearfix">
                                                                        <div class="seq_testimonials_item_title_cont">
                                                                            <div
                                                                                class="seq_testimonials_item_img seq_image_bck">
                                                                                <img width="1" height="1"
                                                                                    src="2019/03/photo-1509783236416-c9ad59bae472.jpeg"
                                                                                    class="attachment-thumbnail size-thumbnail"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="seq_testimonials_item_title">
                                                                                <div
                                                                                    class="seq_testimonials_item_title_name">
                                                                                    Rebeca Laguado</div> Gerente
                                                                                Ventas - Vencoex
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Nuestro
                                                                        personal de atención al público y
                                                                        cumplimiento se ha entrenado en riesgos y
                                                                        sagrilaft usando kpacit</div>
                                                                    <div class="seq_testimonials_item_desc clearfix">
                                                                        <div class="seq_testimonials_item_title_cont">
                                                                            <div
                                                                                class="seq_testimonials_item_img seq_image_bck">
                                                                                <img width="1" height="1"
                                                                                    src="2019/03/photo-1502980426475-b83966705988.jpeg"
                                                                                    class="attachment-thumbnail size-thumbnail"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="seq_testimonials_item_title">
                                                                                <div
                                                                                    class="seq_testimonials_item_title_name">
                                                                                    José Piedrahita</div> Fundador -
                                                                                Ecoondas
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="seq_testimonials_item">
                                                            <div class="seq_default_shadow">
                                                                <div class="seq_testimonials_item_bl">
                                                                    <div class="seq_testimonials_item_cont">Hemos
                                                                        entrenado a nuestro personal de
                                                                        producción con kpacit disminuyendo el producto
                                                                        no conforme y los tiempos de proceso
                                                                    </div>
                                                                    <div class="seq_testimonials_item_desc clearfix">
                                                                        <div class="seq_testimonials_item_title_cont">
                                                                            <div
                                                                                class="seq_testimonials_item_img seq_image_bck">
                                                                                <img width="1" height="1"
                                                                                    src="2019/03/photo-1534385842125-8c9ad0bd123c.jpeg"
                                                                                    class="attachment-thumbnail size-thumbnail"
                                                                                    alt="" loading="lazy" />
                                                                            </div>
                                                                            <div class="seq_testimonials_item_title">
                                                                                <div
                                                                                    class="seq_testimonials_item_title_name">
                                                                                    Emmely Pérez</div> Fundadora -
                                                                                MastrantoBakery
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                    <section id="seccionemail" style="background-image: url('../2022/06/fondo.jpg');"
                        class="elementor-align-center elementor-section elementor-top-section elementor-element elementor-element-bdd7e15 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="bdd7e15" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b656e21"
                                    data-id="b656e21" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-8a507da elementor-widget elementor-widget-heading"
                                                data-id="8a507da" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h4 style="color: white;"
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active" class="active"
                                                            style="">¿TIENES DUDAS? RESOLVAMOSLAS JUNTOS</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-48dc3e5 elementor-widget elementor-widget-text-editor"
                                                data-id="48dc3e5" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <p style="color: white;" class="p1">Estamos listos para
                                                            atender tus necesidades</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-7a2d0d7 elementor-widget elementor-widget-text-editor"
                                                data-id="7a2d0d7" data-element_type="widget"
                                                data-widget_type="text-editor.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-text-editor elementor-clearfix">
                                                        <div class="wpcf7 js" id="wpcf7-f2063-p156-o1"
                                                            lang="en-US" dir="ltr">
                                                            <div class="screen-reader-response">
                                                                <p role="status" aria-live="polite"
                                                                    aria-atomic="true">
                                                                </p>
                                                                <ul></ul>
                                                            </div>
                                                            <form action="/contact/store" method="post"
                                                                class="wpcf7-form init" aria-label="Contact form"
                                                                novalidate="novalidate" data-status="init">
                                                                {{ csrf_field() }}
                                                                {{-- <div style="display: none;">
                                                                <input type="hidden" name="_wpcf7" value="2063">
                                                                <input type="hidden" name="_wpcf7_version"
                                                                    value="5.7.4">
                                                                <input type="hidden" name="_wpcf7_locale"
                                                                    value="en_US">
                                                                <input type="hidden" name="_wpcf7_unit_tag"
                                                                    value="wpcf7-f2063-p156-o1">
                                                                <input type="hidden" name="_wpcf7_container_post"
                                                                    value="156">
                                                                <input type="hidden" name="_wpcf7_posted_data_hash"
                                                                    value="">
                                                            </div> --}}
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="name">
                                                                                <input size="40"
                                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Nombre Completo*"
                                                                                    type="text" name="name"
                                                                                    value="{{ old('name') }}">
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="your-company">
                                                                                <input size="40"
                                                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Empresa*"
                                                                                    type="text" name="subject"
                                                                                    value="{{ old('subject') }}">
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="email">
                                                                                <input size="40"
                                                                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Email*"
                                                                                    type="email" name="email"
                                                                                    value="{{ old('email') }}">
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>
                                                                            <span class="wpcf7-form-control-wrap"
                                                                                data-name="your-tel">
                                                                                <input size="40"
                                                                                    class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                                                    aria-required="true"
                                                                                    aria-invalid="false"
                                                                                    placeholder="Teléfono Contacto*"
                                                                                    type="tel" name="phone"
                                                                                    value="{{ old('phone') }}">
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <input type="text" name="message"
                                                                        class="form-control"
                                                                        value="Estoy interesado en sus servicios."
                                                                        hidden style="display: none;">
                                                                    <input type="text" name="captcha"
                                                                        class="form-control" value="" hidden
                                                                        style="display: none;">
                                                                </div>
                                                                <p>
                                                                    <input
                                                                        class="wpcf7-form-control has-spinner wpcf7-submit"
                                                                        type="submit" value="Enviar Correo">
                                                                    <span class="wpcf7-spinner"></span>
                                                                </p>
                                                                <div class="wpcf7-response-output"
                                                                    aria-hidden="true">
                                                                </div>
                                                            </form>
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
                    <!-- </section> -->
                    <!-- </section> -->
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-9a81b8f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="9a81b8f" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2e774b5"
                                    data-id="2e774b5" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-1f1a0cc elementor-widget elementor-widget-heading"
                                                data-id="1f1a0cc" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h4
                                                        class="elementor-heading-title elementor-size-default elementor-heading-title elementor-size-default">
                                                        <span data-bottom-top="@class:noactive"
                                                            data--100-bottom="@class:active"> ELLOS YA USAN
                                                            <b>KPACIT</b></span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-b29774b"
                                    data-id="b29774b" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="seq_gallery_slider elementor-element elementor-element-0ff050f elementor-widget elementor-widget-image-gallery"
                                                data-items="4" data-id="0ff050f" data-element_type="widget"
                                                data-widget_type="image-gallery.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-image-gallery">
                                                        <div id='gallery-1'
                                                            class='gallery galleryid-46 gallery-columns-4 gallery-size-full'>
                                                            <figure class='gallery-item'>
                                                                <div class='gallery-icon landscape'>
                                                                    <img width="217" height="122"
                                                                        src="2022/06/ECOONDAS.png"
                                                                        class="attachment-full size-full"
                                                                        alt="" loading="lazy"
                                                                        srcset="2022/06/ECOONDAS.png 217w, 2022/06/ECOONDAS.png' 150w"
                                                                        sizes="(max-width: 217px) 100vw, 217px" />
                                                                </div>
                                                            </figure>
                                                            <figure class='gallery-item'>
                                                                <div style="display: flex; align-items: center; justify-content: center; height: 140px;"
                                                                    class='gallery-icon landscape'>
                                                                    <img width="211" height="122"
                                                                        src="2022/06/Mastranto.jpg"
                                                                        class="attachment-full size-full"
                                                                        alt="" loading="lazy"
                                                                        srcset="2022/06/Mastranto.jpg 211w, 2022/06/Mastranto.jpg' 150w"
                                                                        sizes="(max-width: 211px) 100vw, 211px" />
                                                                </div>
                                                            </figure>
                                                            <figure class='gallery-item'>
                                                                <div style="display: flex; align-items: center; justify-content: center; height: 140px;"
                                                                    class='gallery-icon landscape'>
                                                                    <img width="211" height="122"
                                                                        src="2022/06/Sofymov.png"
                                                                        class="attachment-full size-full"
                                                                        alt="" loading="lazy"
                                                                        srcset="2022/06/Sofymov.png 211w, 2022/06/Sofymov.png' 150w"
                                                                        sizes="(max-width: 211px) 100vw, 211px" />
                                                                </div>
                                                            </figure>
                                                            <figure class='gallery-item'>
                                                                <div class='gallery-icon landscape'>
                                                                    <img width="217" height="122"
                                                                        src="2022/06/vencoex.png"
                                                                        class="attachment-full size-full"
                                                                        alt="" loading="lazy"
                                                                        srcset="2022/06/vencoex.png 217w, 2022/06/vencoex.png' 150w"
                                                                        sizes="(max-width: 217px) 100vw, 217px" />
                                                                </div>
                                                            </figure>
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
                                                                <img src="assets\images\logorojo.png"
                                                                    alt="">
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
                                                                    <a
                                                                        onclick="scrollToSection(event,'pensandoenti')">Lo
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
                                                                    <a
                                                                        onclick="scrollToSection(event,'secciontesti')">Nuestros
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
                                                            <div
                                                                class="elementor-social-icons-wrapper elementor-grid">
                                                                <span class="elementor-grid-item">
                                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3356d00"
                                                                        target="_blank">
                                                                        <span
                                                                            class="elementor-screen-only">Facebook</span>
                                                                        <i class="fab fa-facebook"></i>
                                                                    </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
                                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-722fba1"
                                                                        target="_blank">
                                                                        <span
                                                                            class="elementor-screen-only">Instagram</span>
                                                                        <i class="fab fa-instagram"></i>
                                                                    </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
                                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-repeater-item-ada6752"
                                                                        target="_blank">
                                                                        <span
                                                                            class="elementor-screen-only">Twitter</span>
                                                                        <i class="fab fa-twitter"></i>
                                                                    </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
                                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-repeater-item-c3f4979"
                                                                        target="_blank">
                                                                        <span
                                                                            class="elementor-screen-only">Youtube</span>
                                                                        <i class="fab fa-youtube"></i>
                                                                    </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
                                                                    <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin-in elementor-repeater-item-6a3037b"
                                                                        target="_blank">
                                                                        <span
                                                                            class="elementor-screen-only">Linkedin-in</span>
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
