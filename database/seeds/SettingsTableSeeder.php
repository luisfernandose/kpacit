<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'page' => 'seo',
                'name' => 'seo_metas',
                'value' => '{"home":{"title":"Home","description":"home page Description","robot":"index"},"search":{"title":"Search","description":"search page Description","robot":"index"},"categories":{"title":"Category","description":"categories page Description","robot":"index"},"login":{"title":"Login","description":"login page description","robot":"index"},"register":{"title":"Register","description":"register page Description","robot":"index"},"about":{"title":"about page title","description":"about page Description"},"contact":{"title":"Contact","description":"contact page Description update","robot":"index"},"certificate_validation":{"title":"Certificate Validation","description":"Certificate validation description","robot":"index"},"classes":{"title":"Classes","description":"Classes page Description","robot":"index"},"blog":{"title":"Blog","description":"Blog page description","robot":"index"},"instructors":{"title":"Instructors","description":"instructors page Description","robot":"index"},"organizations":{"title":"Organizations","description":"Organizations page description","robot":"index"}}',
                'updated_at' => 1625294079,
            ),
            1 =>
            array (
                'id' => 2,
                'page' => 'general',
                'name' => 'socials',
                'value' => '{"Instagram":{"title":"Instagram","image":"\\/store\\/1\\/default_images\\/social\\/instagram.svg","link":"https:\\/\\/www.instagram.com\\/","order":"1"},"Whatsapp":{"title":"Whatsapp","image":"\\/store\\/1\\/default_images\\/social\\/whatsapp.svg","link":"https:\\/\\/web.whatsapp.com\\/","order":"2"},"Twitter":{"title":"Twitter","image":"\\/store\\/1\\/default_images\\/social\\/twitter.svg","link":"https:\\/\\/twitter.com\\/","order":"3"},"Linkedin":{"title":"Linkedin","image":"\\/store\\/1\\/default_images\\/social\\/linkedin.svg","link":"https:\\/\\/www.linkedin.com\\/","order":"4"},"Facebook":{"title":"Facebook","image":"\\/store\\/1\\/default_images\\/social\\/facebook.svg","link":"https:\\/\\/www.facebook.com\\/","order":"5"}}',
                'updated_at' => 1625301320,
            ),
            2 =>
            array (
                'id' => 4,
                'page' => 'other',
                'name' => 'footer',
                'value' => '{"second_column":{"title":"Links","value":"<p><a href=\\"\\/login\\"><font color=\\"#ffffff\\">- Acceder<\\/font><\\/a><\\/p><p><font color=\\"#ffffff\\"><a href=\\"\\/register\\"><font color=\\"#ffffff\\">- Registrate<\\/font><\\/a><br><\\/font><\\/p><p><a href=\\"\\/blog\\"><font color=\\"#ffffff\\">- Blog<\\/font><\\/a><\\/p><p><a href=\\"\\/contact\\"><font color=\\"#ffffff\\">- Contacto<\\/font><\\/a><\\/p><p><font color=\\"#ffffff\\"><a href=\\"\\/certificate_validation\\"><font color=\\"#ffffff\\">- Validar Certificado<\\/font><\\/a><br><\\/font><\\/p><p><font color=\\"#ffffff\\"><a href=\\"\\/become_instructor\\"><font color=\\"#ffffff\\">- Ser Profesor<\\/font><\\/a><\\/font><\\/p><p><a href=\\"\\/pages\\/about\\"><font color=\\"#ffffff\\">- Quienes Somos<\\/font><\\/a><br><\\/p>"},"first_column":{"title":"Quienes Somos","value":"<p><font color=\\"#ffffff\\">Kpacit es un sistema de gesti\\u00f3n de aprendizaje Online con todas las funciones que le ayudaran a dirigir su negocio de educaci\\u00f3n. Esta plataforma ayuda a los instructores\\/Empresas a crear materiales educativos profesionales y ayuda a los estudiantes a aprender de los mejores instructores.<\\/font><\\/p>"},"third_column":{"title":"Legal","value":"<p><a href=\\"#\\" target=\\"_blank\\"><font color=\\"#ffffff\\">- Terminos &amp; Condiciones<\\/font><\\/a><\\/p><p><a href=\\"#\\" target=\\"_blank\\"><font color=\\"#ffffff\\">- Politica de Privacidad<\\/font><\\/a><\\/p><p><a href=\\"#\\" target=\\"_blank\\"><font color=\\"#ffffff\\">- Politica de Reembolso<\\/font><\\/a><\\/p><p><a href=\\"#\\" target=\\"_blank\\"><font color=\\"#ffffff\\">- Politica de Cookies<\\/font><\\/a><\\/p><p><a href=\\"#\\" target=\\"_blank\\"><font color=\\"#ffffff\\">- Mapa del sitio<\\/font><\\/a><\\/p><p><\\/p>"},"forth_column":{"title":"Apps Moviles","value":"<p><img src=\\"\\/store\\/1\\/_google-play-png-app-store-google-play.png\\" style=\\"width: 75%;\\"><br><\\/p>"}}',
                'updated_at' => 1629721202,
            ),
            3 =>
            array (
                'id' => 5,
                'page' => 'general',
                'name' => 'general',
                'value' => '{"site_name":"Kpacit","site_email":"info@kpacit.com","site_phone":"+57 415-716-1","site_language":"ES","register_method":"email","user_languages":["EN","ES"],"fav_icon":"\\/store\\/1\\/favicon60d8dddcb03b8.png","logo":"\\/store\\/1\\/logo60d8ddbc6a69a.png","footer_logo":"\\/store\\/1\\/logo-kpacit-footer.svg","webinar_reminder_schedule":"1","preloading":"1","hero_section2":"1"}',
                'updated_at' => 1634165131,
            ),
            4 =>
            array (
                'id' => 6,
                'page' => 'financial',
                'name' => 'financial',
                'value' => '{"commission":"20","tax":"19","minimum_payout":"30000","currency":"COP"}',
                'updated_at' => 1634603690,
            ),
            5 =>
            array (
                'id' => 8,
                'page' => 'personalization',
                'name' => 'home_hero',
                'value' => '{"title":"Kpacit - Sue\\u00f1a en grande...","description":"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?","hero_background":"\\/store\\/1\\/default_images\\/hero_1.jpg"}',
                'updated_at' => 1629676866,
            ),
            6 =>
            array (
                'id' => 12,
                'page' => 'customization',
                'name' => 'custom_css_js',
            'value' => '{"css":".text-secondary {\\r\\n    color: #ee2354!important;\\r\\n}\\r\\n\\r\\n.btn-primary {\\r\\n    color: #fff;\\r\\n    background-color: #ff1e58;\\r\\n    box-shadow: 0 3px 6px 0 rgb(255 30 88 \\/ 30%);\\r\\n    transition: all .3s;\\r\\n    border-color: #ff1e58;\\r\\n}\\r\\n.bg-secondary {\\r\\n    background-color: #ef2354!important;\\r\\n}\\r\\n.navbar .nav-item .nav-link {\\r\\n    font-size: 17px;\\r\\n    text-align: center;\\r\\n    color: #343434;\\r\\n    font-weight: 600;\\r\\n}\\r\\n\\r\\n.stats-container .stats-item .stat-title {\\r\\n    font-size: 20px;\\r\\n    font-weight: 700;\\r\\n    line-height: 1.25;\\r\\n    color: #00d990;\\r\\n    pointer-events: none;\\r\\n}\\r\\n\\r\\n.stats-container .stats-item:hover {\\r\\n    transform: translateY(-25px);\\r\\n    background-color: #ee2354;\\r\\n    transition: all .5s ease;\\r\\n    box-shadow: 0 10px 40px 0 rgb(0 0 0 \\/ 20%);\\r\\n}\\r\\n.home-sections .section-title {\\r\\n    font-size: 35px;\\r\\n    font-weight: 700;\\r\\n    line-height: 1.5;\\r\\n    color: #00da91;\\r\\n    pointer-events: none;\\r\\n}\\r\\n.cart-banner {\\r\\n    width: 100%;\\r\\n    padding: 100px 0;\\r\\n    background-color: #F22354;\\r\\n}","js":null}',
                'updated_at' => 1629764985,
            ),
            7 =>
            array (
                'id' => 14,
                'page' => 'personalization',
                'name' => 'page_background',
                'value' => '{"admin_login":"\\/store\\/1\\/default_images\\/admin_login.jpg","admin_dashboard":"\\/store\\/1\\/default_images\\/admin_dashboard.jpg","login":"\\/store\\/1\\/default_images\\/front_login.jpg","register":"\\/store\\/1\\/default_images\\/front_register.jpg","remember_pass":"\\/store\\/1\\/default_images\\/password_recovery.jpg","verification":"\\/store\\/1\\/default_images\\/verification.jpg","search":"\\/store\\/1\\/default_images\\/search_cover.png","categories":"\\/store\\/1\\/default_images\\/category_cover.png","become_instructor":"\\/store\\/1\\/default_images\\/become_instructor.jpg","certificate_validation":"\\/store\\/1\\/default_images\\/certificate_validation.jpg","blog":"\\/store\\/1\\/default_images\\/blogs_cover.png","instructors":"\\/store\\/1\\/default_images\\/instructors_cover.png","organizations":"\\/store\\/1\\/default_images\\/organizations_cover.png","dashboard":"\\/store\\/1\\/dashboard.png","user_avatar":"\\/store\\/1\\/default_images\\/default_profile.jpg","user_cover":"\\/store\\/1\\/default_images\\/default_cover.jpg"}',
                'updated_at' => 1625988370,
            ),
            8 =>
            array (
                'id' => 15,
                'page' => 'personalization',
                'name' => 'home_hero2',
                'value' => '{"title":"Kpacit - Sue\\u00f1a en grande...","description":"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?","hero_background":"\\/assets\\/default\\/img\\/home\\/world.png","hero_vector":"\\/store\\/1\\/animated-header.json","has_lottie":"1"}',
                'updated_at' => 1629652906,
            ),
            9 =>
            array (
                'id' => 20,
                'page' => 'other',
                'name' => 'report_reasons',
                'value' => '{"1":"Rude Content","2":"Against Rules","3":"Not Related","4":"Spam"}',
                'updated_at' => 1625992126,
            ),
            10 =>
            array (
                'id' => 22,
                'page' => 'notifications',
                'name' => 'notifications',
                'value' => '{"new_comment_admin":"33","support_message_admin":"10","support_message_replied_admin":"11","promotion_plan_admin":"29","new_contact_message":"26","new_badge":"2","change_user_group":"3","course_created":"4","course_approve":"5","course_reject":"6","new_comment":"7","support_message":"8","support_message_replied":"9","new_rating":"17","webinar_reminder":"27","new_financial_document":"12","payout_request":"34","payout_proceed":"14","offline_payment_request":"18","offline_payment_approved":"19","offline_payment_rejected":"20","new_sales":"15","new_purchase":"16","new_subscribe_plan":"21","promotion_plan":"28","new_appointment":"22","new_appointment_link":"23","appointment_reminder":"24","meeting_finished":"25","new_certificate":"30","waiting_quiz":"31","waiting_quiz_result":"32","payout_request_admin":"13","course_shared":"35"}',
                'updated_at' => 1625551833,
            ),
            11 =>
            array (
                'id' => 23,
                'page' => 'financial',
                'name' => 'site_bank_accounts',
                'value' => '{"158":{"title":"Bancolombia","image":"\\/store\\/1\\/2560px-Logo_Bancolombia.svg.png","card_id":"Ahorros","account_id":"Kpacit","iban":"22222222222222"}}',
                'updated_at' => 1629672259,
            ),
            12 =>
            array (
                'id' => 24,
                'page' => 'other',
                'name' => 'contact_us',
                'value' => '{"background":"\\/assets\\/default\\/img\\/home\\/coures-banner.png","latitude":"6.2068941","longitude":"-75.5797054","map_zoom":"16","phones":"+57 707-750-1, +57 415-716-1, +57 415-716-1","emails":"info@kpacit.com,finanzas@kpacit.com,hr@kpacit.com","address":"Medellin, Antioquia\\r\\nColombia,\\r\\nSur America"}',
                'updated_at' => 1629653168,
            ),
            13 =>
            array (
                'id' => 25,
                'page' => 'personalization',
                'name' => 'home_sections',
                'value' => '{"best_sellers":"1","free_classes":"1","discount_classes":"1","best_rates":"1","trend_categories":"1","testimonials":"1","blog":"1","instructors":"1"}',
                'updated_at' => 1629676848,
            ),
            14 =>
            array (
                'id' => 26,
                'page' => 'other',
                'name' => 'navbar_links',
                'value' => '{"Home":{"title":"Inicio","link":"\\/","order":"1"},"About_Us":{"title":"Profesores","link":"\\/instructors","order":"3"},"Contact":{"title":"Contacto","link":"\\/contact","order":"6"},"Blog":{"title":"Blog","link":"\\/blog","order":"5"},"Classes":{"title":"Cursos","link":"\\/classes?sort=newest","order":"2"}}',
                'updated_at' => 1629675241,
            ),
            15 =>
            array (
                'id' => 27,
                'page' => 'personalization',
                'name' => 'home_video_or_image_box',
                'value' => '{"link":"\\/classes","title":"Kpacit - Sue\\u00f1a en grande...","description":"Ambici\\u00f3n aceptada. Aprende las \\u00faltimas habilidades para alcanzar tus objetivos profesionales.  \\u00bfQu\\u00e9 quieres aprender?","background":"\\/store\\/1\\/default_images\\/home_video_section.png"}',
                'updated_at' => 1629676876,
            ),
            16 =>
            array (
                'id' => 28,
                'page' => 'other',
                'name' => '404',
                'value' => '{"error_image":"\\/store\\/1\\/default_images\\/404.svg","error_title":"404 - Lo Sentimos!","error_description":"El enlace seleccionado no existe o podr\\u00eda haber ser eliminado. Pruebe con un enlace v\\u00e1lido."}',
                'updated_at' => 1629653236,
            ),
            17 =>
            array (
                'id' => 29,
                'page' => 'personalization',
                'name' => 'panel_sidebar',
                'value' => '{"link":"\\/classes?sort=newest","background":"\\/store\\/1\\/sidebar-user.png"}',
                'updated_at' => 1628536185,
            ),
        ));


    }
}