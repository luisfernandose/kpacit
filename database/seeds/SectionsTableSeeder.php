<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sections')->delete();

        \DB::table('sections')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin_general_dashboard',
                'section_group_id' => NULL,
                'caption' => 'General Dashboard',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'admin_general_dashboard_show',
                'section_group_id' => 1,
                'caption' => 'General Dashboard page',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'admin_general_dashboard_quick_access_links',
                'section_group_id' => 1,
                'caption' => 'Quick access links in General Dashboard',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'admin_general_dashboard_daily_sales_statistics',
                'section_group_id' => 1,
                'caption' => 'Daily Sales Type Statistics Section',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'admin_general_dashboard_income_statistics',
                'section_group_id' => 1,
                'caption' => 'Income Statistics Section',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'admin_general_dashboard_total_sales_statistics',
                'section_group_id' => 1,
                'caption' => 'Total Sales Statistics Section',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'admin_general_dashboard_new_sales',
                'section_group_id' => 1,
                'caption' => 'New Sales Section',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'admin_general_dashboard_new_comments',
                'section_group_id' => 1,
                'caption' => 'New Comments Section',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'admin_general_dashboard_new_tickets',
                'section_group_id' => 1,
                'caption' => 'New Tickets Section',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'admin_general_dashboard_new_reviews',
                'section_group_id' => 1,
                'caption' => 'New Reviews Section',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'admin_general_dashboard_sales_statistics_chart',
                'section_group_id' => 1,
                'caption' => 'Sales Statistics Chart',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'admin_general_dashboard_recent_comments',
                'section_group_id' => 1,
                'caption' => 'Recent comments Section',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'admin_general_dashboard_recent_tickets',
                'section_group_id' => 1,
                'caption' => 'Recent tickets Section',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'admin_general_dashboard_recent_webinars',
                'section_group_id' => 1,
                'caption' => 'Recent webinars Section',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'admin_general_dashboard_recent_courses',
                'section_group_id' => 1,
                'caption' => 'Recent courses Section',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'admin_general_dashboard_users_statistics_chart',
                'section_group_id' => 1,
                'caption' => 'Users Statistics Chart',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'admin_clear_cache',
                'section_group_id' => 1,
                'caption' => 'Clear cache',
            ),
            17 =>
            array (
                'id' => 25,
                'name' => 'admin_marketing_dashboard',
                'section_group_id' => NULL,
                'caption' => 'Marketing Dashboard',
            ),
            18 =>
            array (
                'id' => 26,
                'name' => 'admin_marketing_dashboard_show',
                'section_group_id' => 25,
                'caption' => 'Marketing Dashboard page',
            ),
            19 =>
            array (
                'id' => 50,
                'name' => 'admin_roles',
                'section_group_id' => NULL,
                'caption' => 'Roles',
            ),
            20 =>
            array (
                'id' => 51,
                'name' => 'admin_roles_list',
                'section_group_id' => 50,
                'caption' => 'Roles List',
            ),
            21 =>
            array (
                'id' => 52,
                'name' => 'admin_roles_create',
                'section_group_id' => 50,
                'caption' => 'Roles Create',
            ),
            22 =>
            array (
                'id' => 53,
                'name' => 'admin_roles_edit',
                'section_group_id' => 50,
                'caption' => 'Roles Edit',
            ),
            23 =>
            array (
                'id' => 54,
                'name' => 'admin_roles_delete',
                'section_group_id' => 50,
                'caption' => 'Roles Delete',
            ),
            24 =>
            array (
                'id' => 100,
                'name' => 'admin_users',
                'section_group_id' => NULL,
                'caption' => 'Users',
            ),
            25 =>
            array (
                'id' => 101,
                'name' => 'admin_staffs_list',
                'section_group_id' => 100,
                'caption' => 'Staffs list',
            ),
            26 =>
            array (
                'id' => 102,
                'name' => 'admin_users_list',
                'section_group_id' => 100,
                'caption' => 'Students list',
            ),
            27 =>
            array (
                'id' => 103,
                'name' => 'admin_instructors_list',
                'section_group_id' => 100,
                'caption' => 'Instructors list',
            ),
            28 =>
            array (
                'id' => 104,
                'name' => 'admin_organizations_list',
                'section_group_id' => 100,
                'caption' => 'Organizations list',
            ),
            29 =>
            array (
                'id' => 105,
                'name' => 'admin_users_create',
                'section_group_id' => 100,
                'caption' => 'Users Create',
            ),
            30 =>
            array (
                'id' => 106,
                'name' => 'admin_users_edit',
                'section_group_id' => 100,
                'caption' => 'Users Edit',
            ),
            31 =>
            array (
                'id' => 107,
                'name' => 'admin_users_delete',
                'section_group_id' => 100,
                'caption' => 'Users Delete',
            ),
            32 =>
            array (
                'id' => 108,
                'name' => 'admin_users_export_excel',
                'section_group_id' => 100,
                'caption' => 'List Export excel',
            ),
            33 =>
            array (
                'id' => 109,
                'name' => 'admin_users_badges',
                'section_group_id' => 100,
                'caption' => 'Users Badges',
            ),
            34 =>
            array (
                'id' => 110,
                'name' => 'admin_users_badges_edit',
                'section_group_id' => 100,
                'caption' => 'Badges edit',
            ),
            35 =>
            array (
                'id' => 111,
                'name' => 'admin_users_badges_delete',
                'section_group_id' => 100,
                'caption' => 'Badges delete',
            ),
            36 =>
            array (
                'id' => 112,
                'name' => 'admin_users_impersonate',
                'section_group_id' => 100,
            'caption' => 'users impersonate (login by users)',
            ),
            37 =>
            array (
                'id' => 113,
                'name' => 'admin_become_instructors_list',
                'section_group_id' => 100,
                'caption' => 'Lists of requests for become instructors',
            ),
            38 =>
            array (
                'id' => 114,
                'name' => 'admin_become_instructors_reject',
                'section_group_id' => 100,
                'caption' => 'Reject requests for become instructors',
            ),
            39 =>
            array (
                'id' => 115,
                'name' => 'admin_become_instructors_delete',
                'section_group_id' => 100,
                'caption' => 'Delete requests for become instructors',
            ),
            40 =>
            array (
                'id' => 150,
                'name' => 'admin_webinars',
                'section_group_id' => NULL,
                'caption' => 'Webinars',
            ),
            41 =>
            array (
                'id' => 151,
                'name' => 'admin_webinars_list',
                'section_group_id' => 150,
                'caption' => 'Webinars List',
            ),
            42 =>
            array (
                'id' => 152,
                'name' => 'admin_webinars_create',
                'section_group_id' => 150,
                'caption' => 'Webinars Create',
            ),
            43 =>
            array (
                'id' => 153,
                'name' => 'admin_webinars_edit',
                'section_group_id' => 150,
                'caption' => 'Webinars Edit',
            ),
            44 =>
            array (
                'id' => 154,
                'name' => 'admin_webinars_delete',
                'section_group_id' => 150,
                'caption' => 'Webinars Delete',
            ),
            45 =>
            array (
                'id' => 155,
                'name' => 'admin_webinars_export_excel',
                'section_group_id' => 150,
                'caption' => 'Feature webinars list',
            ),
            46 =>
            array (
                'id' => 156,
                'name' => 'admin_feature_webinars',
                'section_group_id' => 150,
                'caption' => 'Feature webinars list',
            ),
            47 =>
            array (
                'id' => 157,
                'name' => 'admin_feature_webinars_create',
                'section_group_id' => 150,
                'caption' => 'create feature webinar',
            ),
            48 =>
            array (
                'id' => 158,
                'name' => 'admin_feature_webinars_export_excel',
                'section_group_id' => 150,
                'caption' => 'Feature webinar export excel',
            ),
            49 =>
            array (
                'id' => 200,
                'name' => 'admin_categories',
                'section_group_id' => NULL,
                'caption' => 'Categories',
            ),
            50 =>
            array (
                'id' => 201,
                'name' => 'admin_categories_list',
                'section_group_id' => 200,
                'caption' => 'Categories List',
            ),
            51 =>
            array (
                'id' => 202,
                'name' => 'admin_categories_create',
                'section_group_id' => 200,
                'caption' => 'Categories Create',
            ),
            52 =>
            array (
                'id' => 203,
                'name' => 'admin_categories_edit',
                'section_group_id' => 200,
                'caption' => 'Categories Edit',
            ),
            53 =>
            array (
                'id' => 204,
                'name' => 'admin_categories_delete',
                'section_group_id' => 200,
                'caption' => 'Categories Delete',
            ),
            54 =>
            array (
                'id' => 205,
                'name' => 'admin_trending_categories',
                'section_group_id' => 200,
                'caption' => 'Trends Categories List',
            ),
            55 =>
            array (
                'id' => 206,
                'name' => 'admin_create_trending_categories',
                'section_group_id' => 200,
                'caption' => 'Create Trend Categories',
            ),
            56 =>
            array (
                'id' => 207,
                'name' => 'admin_edit_trending_categories',
                'section_group_id' => 200,
                'caption' => 'Edit Trend Categories',
            ),
            57 =>
            array (
                'id' => 208,
                'name' => 'admin_delete_trending_categories',
                'section_group_id' => 200,
                'caption' => 'Delete Trend Categories',
            ),
            58 =>
            array (
                'id' => 250,
                'name' => 'admin_tags',
                'section_group_id' => NULL,
                'caption' => 'Tags',
            ),
            59 =>
            array (
                'id' => 251,
                'name' => 'admin_tags_list',
                'section_group_id' => 250,
                'caption' => 'Tags List',
            ),
            60 =>
            array (
                'id' => 252,
                'name' => 'admin_tags_create',
                'section_group_id' => 250,
                'caption' => 'Tags Create',
            ),
            61 =>
            array (
                'id' => 253,
                'name' => 'admin_tags_edit',
                'section_group_id' => 250,
                'caption' => 'Tags Edit',
            ),
            62 =>
            array (
                'id' => 254,
                'name' => 'admin_tags_delete',
                'section_group_id' => 250,
                'caption' => 'Tags Delete',
            ),
            63 =>
            array (
                'id' => 300,
                'name' => 'admin_filters',
                'section_group_id' => NULL,
                'caption' => 'Filters',
            ),
            64 =>
            array (
                'id' => 301,
                'name' => 'admin_filters_list',
                'section_group_id' => 300,
                'caption' => 'Filters List',
            ),
            65 =>
            array (
                'id' => 302,
                'name' => 'admin_filters_create',
                'section_group_id' => 300,
                'caption' => 'Filters Create',
            ),
            66 =>
            array (
                'id' => 303,
                'name' => 'admin_filters_edit',
                'section_group_id' => 300,
                'caption' => 'Filters Edit',
            ),
            67 =>
            array (
                'id' => 304,
                'name' => 'admin_filters_delete',
                'section_group_id' => 300,
                'caption' => 'Filters Delete',
            ),
            68 =>
            array (
                'id' => 350,
                'name' => 'admin_quizzes',
                'section_group_id' => NULL,
                'caption' => 'Quizzes',
            ),
            69 =>
            array (
                'id' => 351,
                'name' => 'admin_quizzes_list',
                'section_group_id' => 350,
                'caption' => 'Quizzes List',
            ),
            70 =>
            array (
                'id' => 352,
                'name' => 'admin_quizzes_edit',
                'section_group_id' => 350,
                'caption' => 'Quiz edit',
            ),
            71 =>
            array (
                'id' => 353,
                'name' => 'admin_quizzes_delete',
                'section_group_id' => 350,
                'caption' => 'Quiz delete',
            ),
            72 =>
            array (
                'id' => 354,
                'name' => 'admin_quizzes_results',
                'section_group_id' => 350,
                'caption' => 'Quizzes results',
            ),
            73 =>
            array (
                'id' => 355,
                'name' => 'admin_quizzes_results_delete',
                'section_group_id' => 350,
                'caption' => 'Quizzes results delete',
            ),
            74 =>
            array (
                'id' => 356,
                'name' => 'admin_quizzes_lists_excel',
                'section_group_id' => 350,
                'caption' => 'Quizzes export excel',
            ),
            75 =>
            array (
                'id' => 400,
                'name' => 'admin_quiz_result',
                'section_group_id' => NULL,
                'caption' => 'Quiz Result',
            ),
            76 =>
            array (
                'id' => 401,
                'name' => 'admin_quiz_result_list',
                'section_group_id' => 400,
                'caption' => 'Quiz Result List',
            ),
            77 =>
            array (
                'id' => 402,
                'name' => 'admin_quiz_result_create',
                'section_group_id' => 400,
                'caption' => 'Quiz Result Create',
            ),
            78 =>
            array (
                'id' => 403,
                'name' => 'admin_quiz_result_edit',
                'section_group_id' => 400,
                'caption' => 'Quiz Result Edit',
            ),
            79 =>
            array (
                'id' => 404,
                'name' => 'admin_quiz_result_delete',
                'section_group_id' => 400,
                'caption' => 'Quiz Result Delete',
            ),
            80 =>
            array (
                'id' => 405,
                'name' => 'admin_quiz_result_export_excel',
                'section_group_id' => 400,
                'caption' => 'quiz result export excel',
            ),
            81 =>
            array (
                'id' => 450,
                'name' => 'admin_certificate',
                'section_group_id' => NULL,
                'caption' => 'Certificate',
            ),
            82 =>
            array (
                'id' => 451,
                'name' => 'admin_certificate_list',
                'section_group_id' => 450,
                'caption' => 'Certificate List',
            ),
            83 =>
            array (
                'id' => 452,
                'name' => 'admin_certificate_create',
                'section_group_id' => 450,
                'caption' => 'Certificate Create',
            ),
            84 =>
            array (
                'id' => 453,
                'name' => 'admin_certificate_edit',
                'section_group_id' => 450,
                'caption' => 'Certificate Edit',
            ),
            85 =>
            array (
                'id' => 454,
                'name' => 'admin_certificate_delete',
                'section_group_id' => 450,
                'caption' => 'Certificate Delete',
            ),
            86 =>
            array (
                'id' => 455,
                'name' => 'admin_certificate_template_list',
                'section_group_id' => 450,
                'caption' => 'Certificate template lists',
            ),
            87 =>
            array (
                'id' => 456,
                'name' => 'admin_certificate_template_create',
                'section_group_id' => 450,
                'caption' => 'Certificate template create',
            ),
            88 =>
            array (
                'id' => 457,
                'name' => 'admin_certificate_template_edit',
                'section_group_id' => 450,
                'caption' => 'Certificate template edit',
            ),
            89 =>
            array (
                'id' => 458,
                'name' => 'admin_certificate_template_delete',
                'section_group_id' => 450,
                'caption' => 'Certificate template delete',
            ),
            90 =>
            array (
                'id' => 459,
                'name' => 'admin_certificate_export_excel',
                'section_group_id' => 450,
                'caption' => 'Certificates export excel',
            ),
            91 =>
            array (
                'id' => 500,
                'name' => 'admin_discount_codes',
                'section_group_id' => NULL,
                'caption' => 'Discount codes',
            ),
            92 =>
            array (
                'id' => 501,
                'name' => 'admin_discount_codes_list',
                'section_group_id' => 500,
                'caption' => 'Discount codes list',
            ),
            93 =>
            array (
                'id' => 502,
                'name' => 'admin_discount_codes_create',
                'section_group_id' => 500,
                'caption' => 'Discount codes create',
            ),
            94 =>
            array (
                'id' => 503,
                'name' => 'admin_discount_codes_edit',
                'section_group_id' => 500,
                'caption' => 'Discount codes edit',
            ),
            95 =>
            array (
                'id' => 504,
                'name' => 'admin_discount_codes_delete',
                'section_group_id' => 500,
                'caption' => 'Discount codes delete',
            ),
            96 =>
            array (
                'id' => 505,
                'name' => 'admin_discount_codes_export',
                'section_group_id' => 500,
                'caption' => 'Discount codes export excel',
            ),
            97 =>
            array (
                'id' => 550,
                'name' => 'admin_group',
                'section_group_id' => NULL,
                'caption' => 'Groups',
            ),
            98 =>
            array (
                'id' => 551,
                'name' => 'admin_group_list',
                'section_group_id' => 550,
                'caption' => 'Groups List',
            ),
            99 =>
            array (
                'id' => 552,
                'name' => 'admin_group_create',
                'section_group_id' => 550,
                'caption' => 'Groups Create',
            ),
            100 =>
            array (
                'id' => 553,
                'name' => 'admin_group_edit',
                'section_group_id' => 550,
                'caption' => 'Groups Edit',
            ),
            101 =>
            array (
                'id' => 554,
                'name' => 'admin_group_delete',
                'section_group_id' => 550,
                'caption' => 'Groups Delete',
            ),
            102 =>
            array (
                'id' => 600,
                'name' => 'admin_payment_channel',
                'section_group_id' => NULL,
                'caption' => 'Payment Channels',
            ),
            103 =>
            array (
                'id' => 601,
                'name' => 'admin_payment_channel_list',
                'section_group_id' => 600,
                'caption' => 'Payment Channels List',
            ),
            104 =>
            array (
                'id' => 602,
                'name' => 'admin_payment_channel_toggle_status',
                'section_group_id' => 600,
                'caption' => 'active or inactive channel',
            ),
            105 =>
            array (
                'id' => 603,
                'name' => 'admin_payment_channel_edit',
                'section_group_id' => 600,
                'caption' => 'Payment Channels Edit',
            ),
            106 =>
            array (
                'id' => 650,
                'name' => 'admin_settings',
                'section_group_id' => NULL,
                'caption' => 'settings',
            ),
            107 =>
            array (
                'id' => 651,
                'name' => 'admin_settings_general',
                'section_group_id' => 650,
                'caption' => 'General settings',
            ),
            108 =>
            array (
                'id' => 652,
                'name' => 'admin_settings_financial',
                'section_group_id' => 650,
                'caption' => 'Financial settings',
            ),
            109 =>
            array (
                'id' => 653,
                'name' => 'admin_settings_personalization',
                'section_group_id' => 650,
                'caption' => 'Personalization settings',
            ),
            110 =>
            array (
                'id' => 654,
                'name' => 'admin_settings_notifications',
                'section_group_id' => 650,
                'caption' => 'Notifications settings',
            ),
            111 =>
            array (
                'id' => 655,
                'name' => 'admin_settings_seo',
                'section_group_id' => 650,
                'caption' => 'Seo settings',
            ),
            112 =>
            array (
                'id' => 656,
                'name' => 'admin_settings_customization',
                'section_group_id' => 650,
                'caption' => 'Customization settings',
            ),
            113 =>
            array (
                'id' => 657,
                'name' => 'admin_settings_notifications',
                'section_group_id' => 650,
                'caption' => 'Notifications settings',
            ),
            114 =>
            array (
                'id' => 658,
                'name' => 'admin_settings_home_sections',
                'section_group_id' => 650,
                'caption' => 'Home sections settings',
            ),
            115 =>
            array (
                'id' => 700,
                'name' => 'admin_blog',
                'section_group_id' => NULL,
                'caption' => 'Blog',
            ),
            116 =>
            array (
                'id' => 701,
                'name' => 'admin_blog_lists',
                'section_group_id' => 700,
                'caption' => 'Blog lists',
            ),
            117 =>
            array (
                'id' => 702,
                'name' => 'admin_blog_create',
                'section_group_id' => 700,
                'caption' => 'Blog create',
            ),
            118 =>
            array (
                'id' => 703,
                'name' => 'admin_blog_edit',
                'section_group_id' => 700,
                'caption' => 'Blog edit',
            ),
            119 =>
            array (
                'id' => 704,
                'name' => 'admin_blog_delete',
                'section_group_id' => 700,
                'caption' => 'Blog delete',
            ),
            120 =>
            array (
                'id' => 705,
                'name' => 'admin_blog_categories',
                'section_group_id' => 700,
                'caption' => 'Blog categories list',
            ),
            121 =>
            array (
                'id' => 706,
                'name' => 'admin_blog_categories_create',
                'section_group_id' => 700,
                'caption' => 'Blog categories create',
            ),
            122 =>
            array (
                'id' => 707,
                'name' => 'admin_blog_categories_edit',
                'section_group_id' => 700,
                'caption' => 'Blog categories edit',
            ),
            123 =>
            array (
                'id' => 708,
                'name' => 'admin_blog_categories_delete',
                'section_group_id' => 700,
                'caption' => 'Blog categories delete',
            ),
            124 =>
            array (
                'id' => 750,
                'name' => 'admin_sales',
                'section_group_id' => NULL,
                'caption' => 'Sales',
            ),
            125 =>
            array (
                'id' => 751,
                'name' => 'admin_sales_list',
                'section_group_id' => 750,
                'caption' => 'Sales List',
            ),
            126 =>
            array (
                'id' => 752,
                'name' => 'admin_sales_refund',
                'section_group_id' => 750,
                'caption' => 'Sales Refund',
            ),
            127 =>
            array (
                'id' => 753,
                'name' => 'admin_sales_invoice',
                'section_group_id' => 750,
                'caption' => 'Sales invoice',
            ),
            128 =>
            array (
                'id' => 754,
                'name' => 'admin_sales_export',
                'section_group_id' => 750,
                'caption' => 'Sales Export Excel',
            ),
            129 =>
            array (
                'id' => 800,
                'name' => 'admin_documents',
                'section_group_id' => NULL,
                'caption' => 'Balances',
            ),
            130 =>
            array (
                'id' => 801,
                'name' => 'admin_documents_list',
                'section_group_id' => 800,
                'caption' => 'Balances List',
            ),
            131 =>
            array (
                'id' => 802,
                'name' => 'admin_documents_create',
                'section_group_id' => 800,
                'caption' => 'Balances Create',
            ),
            132 =>
            array (
                'id' => 803,
                'name' => 'admin_documents_print',
                'section_group_id' => 800,
                'caption' => 'Balances print',
            ),
            133 =>
            array (
                'id' => 850,
                'name' => 'admin_payouts',
                'section_group_id' => NULL,
                'caption' => 'Payout',
            ),
            134 =>
            array (
                'id' => 851,
                'name' => 'admin_payouts_list',
                'section_group_id' => 850,
                'caption' => 'Payout List',
            ),
            135 =>
            array (
                'id' => 852,
                'name' => 'admin_payouts_reject',
                'section_group_id' => 850,
                'caption' => 'Payout Reject',
            ),
            136 =>
            array (
                'id' => 853,
                'name' => 'admin_payouts_payout',
                'section_group_id' => 850,
                'caption' => 'Payout accept',
            ),
            137 =>
            array (
                'id' => 854,
                'name' => 'admin_payouts_export_excel',
                'section_group_id' => 850,
                'caption' => 'Payout export excel',
            ),
            138 =>
            array (
                'id' => 900,
                'name' => 'admin_offline_payments',
                'section_group_id' => NULL,
                'caption' => 'Offline Payments',
            ),
            139 =>
            array (
                'id' => 901,
                'name' => 'admin_offline_payments_list',
                'section_group_id' => 900,
                'caption' => 'Offline Payments List',
            ),
            140 =>
            array (
                'id' => 902,
                'name' => 'admin_offline_payments_reject',
                'section_group_id' => 900,
                'caption' => 'Offline Payments Reject',
            ),
            141 =>
            array (
                'id' => 903,
                'name' => 'admin_offline_payments_approved',
                'section_group_id' => 900,
                'caption' => 'Offline Payments Approved',
            ),
            142 =>
            array (
                'id' => 904,
                'name' => 'admin_offline_payments_export_excel',
                'section_group_id' => 900,
                'caption' => 'Offline Payments export excel',
            ),
            143 =>
            array (
                'id' => 950,
                'name' => 'admin_supports',
                'section_group_id' => NULL,
                'caption' => 'Supports',
            ),
            144 =>
            array (
                'id' => 951,
                'name' => 'admin_supports_list',
                'section_group_id' => 950,
                'caption' => 'Supports List',
            ),
            145 =>
            array (
                'id' => 952,
                'name' => 'admin_support_send',
                'section_group_id' => 950,
                'caption' => 'Send Support',
            ),
            146 =>
            array (
                'id' => 953,
                'name' => 'admin_supports_reply',
                'section_group_id' => 950,
                'caption' => 'Supports reply',
            ),
            147 =>
            array (
                'id' => 954,
                'name' => 'admin_supports_delete',
                'section_group_id' => 950,
                'caption' => 'Supports delete',
            ),
            148 =>
            array (
                'id' => 955,
                'name' => 'admin_support_departments',
                'section_group_id' => 950,
                'caption' => 'Support departments lists',
            ),
            149 =>
            array (
                'id' => 956,
                'name' => 'admin_support_department_create',
                'section_group_id' => 950,
                'caption' => 'Create support department',
            ),
            150 =>
            array (
                'id' => 957,
                'name' => 'admin_support_departments_edit',
                'section_group_id' => 950,
                'caption' => 'Edit support departments',
            ),
            151 =>
            array (
                'id' => 958,
                'name' => 'admin_support_departments_delete',
                'section_group_id' => 950,
                'caption' => 'Delete support department',
            ),
            152 =>
            array (
                'id' => 959,
                'name' => 'admin_support_course_conversations',
                'section_group_id' => 950,
                'caption' => 'Course conversations',
            ),
            153 =>
            array (
                'id' => 1000,
                'name' => 'admin_subscribe',
                'section_group_id' => NULL,
                'caption' => 'Subscribes',
            ),
            154 =>
            array (
                'id' => 1001,
                'name' => 'admin_subscribe_list',
                'section_group_id' => 1000,
                'caption' => 'Subscribes list',
            ),
            155 =>
            array (
                'id' => 1002,
                'name' => 'admin_subscribe_create',
                'section_group_id' => 1000,
                'caption' => 'Subscribes create',
            ),
            156 =>
            array (
                'id' => 1003,
                'name' => 'admin_subscribe_edit',
                'section_group_id' => 1000,
                'caption' => 'Subscribes edit',
            ),
            157 =>
            array (
                'id' => 1004,
                'name' => 'admin_subscribe_delete',
                'section_group_id' => 1000,
                'caption' => 'Subscribes delete',
            ),
            158 =>
            array (
                'id' => 1050,
                'name' => 'admin_notifications',
                'section_group_id' => NULL,
                'caption' => 'Notifications',
            ),
            159 =>
            array (
                'id' => 1051,
                'name' => 'admin_notifications_list',
                'section_group_id' => 1050,
                'caption' => 'Notifications list',
            ),
            160 =>
            array (
                'id' => 1052,
                'name' => 'admin_notifications_send',
                'section_group_id' => 1050,
                'caption' => 'Send Notifications',
            ),
            161 =>
            array (
                'id' => 1053,
                'name' => 'admin_notifications_edit',
                'section_group_id' => 1050,
                'caption' => 'Edit and details Notifications',
            ),
            162 =>
            array (
                'id' => 1054,
                'name' => 'admin_notifications_delete',
                'section_group_id' => 1050,
                'caption' => 'Delete Notifications',
            ),
            163 =>
            array (
                'id' => 1055,
                'name' => 'admin_notifications_markAllRead',
                'section_group_id' => 1050,
                'caption' => 'Mark All Read Notifications',
            ),
            164 =>
            array (
                'id' => 1056,
                'name' => 'admin_notifications_templates',
                'section_group_id' => 1050,
                'caption' => 'Notifications templates',
            ),
            165 =>
            array (
                'id' => 1057,
                'name' => 'admin_notifications_template_create',
                'section_group_id' => 1050,
                'caption' => 'Create notification template',
            ),
            166 =>
            array (
                'id' => 1058,
                'name' => 'admin_notifications_template_edit',
                'section_group_id' => 1050,
                'caption' => 'Edit notification template',
            ),
            167 =>
            array (
                'id' => 1059,
                'name' => 'admin_notifications_template_delete',
                'section_group_id' => 1050,
                'caption' => 'Delete notification template',
            ),
            168 =>
            array (
                'id' => 1075,
                'name' => 'admin_noticeboards',
                'section_group_id' => NULL,
                'caption' => 'Noticeboards',
            ),
            169 =>
            array (
                'id' => 1076,
                'name' => 'admin_noticeboards_list',
                'section_group_id' => 1075,
                'caption' => 'Noticeboards list',
            ),
            170 =>
            array (
                'id' => 1077,
                'name' => 'admin_noticeboards_send',
                'section_group_id' => 1075,
                'caption' => 'Send Noticeboards',
            ),
            171 =>
            array (
                'id' => 1078,
                'name' => 'admin_noticeboards_edit',
                'section_group_id' => 1075,
                'caption' => 'Edit Noticeboards',
            ),
            172 =>
            array (
                'id' => 1079,
                'name' => 'admin_noticeboards_delete',
                'section_group_id' => 1075,
                'caption' => 'Delete Noticeboards',
            ),
            173 =>
            array (
                'id' => 1100,
                'name' => 'admin_promotion',
                'section_group_id' => NULL,
                'caption' => 'Promotions',
            ),
            174 =>
            array (
                'id' => 1101,
                'name' => 'admin_promotion_list',
                'section_group_id' => 1100,
                'caption' => 'Promotions list',
            ),
            175 =>
            array (
                'id' => 1102,
                'name' => 'admin_promotion_create',
                'section_group_id' => 1100,
                'caption' => 'Promotion create',
            ),
            176 =>
            array (
                'id' => 1103,
                'name' => 'admin_promotion_edit',
                'section_group_id' => 1100,
                'caption' => 'Promotion edit',
            ),
            177 =>
            array (
                'id' => 1104,
                'name' => 'admin_promotion_delete',
                'section_group_id' => 1100,
                'caption' => 'Promotion delete',
            ),
            178 =>
            array (
                'id' => 1150,
                'name' => 'admin_testimonials',
                'section_group_id' => NULL,
                'caption' => 'testimonials',
            ),
            179 =>
            array (
                'id' => 1151,
                'name' => 'admin_testimonials_list',
                'section_group_id' => 1150,
                'caption' => 'testimonials list',
            ),
            180 =>
            array (
                'id' => 1152,
                'name' => 'admin_testimonials_create',
                'section_group_id' => 1150,
                'caption' => 'testimonials create',
            ),
            181 =>
            array (
                'id' => 1153,
                'name' => 'admin_testimonials_edit',
                'section_group_id' => 1150,
                'caption' => 'testimonials edit',
            ),
            182 =>
            array (
                'id' => 1154,
                'name' => 'admin_testimonials_delete',
                'section_group_id' => 1150,
                'caption' => 'testimonials delete',
            ),
            183 =>
            array (
                'id' => 1200,
                'name' => 'admin_advertising',
                'section_group_id' => NULL,
                'caption' => 'advertising',
            ),
            184 =>
            array (
                'id' => 1201,
                'name' => 'admin_advertising_banners',
                'section_group_id' => 1200,
                'caption' => 'advertising banners list',
            ),
            185 =>
            array (
                'id' => 1202,
                'name' => 'admin_advertising_banners_create',
                'section_group_id' => 1200,
                'caption' => 'create advertising banner',
            ),
            186 =>
            array (
                'id' => 1203,
                'name' => 'admin_advertising_banners_edit',
                'section_group_id' => 1200,
                'caption' => 'edit advertising banner',
            ),
            187 =>
            array (
                'id' => 1204,
                'name' => 'admin_advertising_banners_delete',
                'section_group_id' => 1200,
                'caption' => 'delete advertising banner',
            ),
            188 =>
            array (
                'id' => 1230,
                'name' => 'admin_newsletters',
                'section_group_id' => NULL,
                'caption' => 'Newsletters',
            ),
            189 =>
            array (
                'id' => 1231,
                'name' => 'admin_newsletters_lists',
                'section_group_id' => 1230,
                'caption' => 'Newsletters lists',
            ),
            190 =>
            array (
                'id' => 1232,
                'name' => 'admin_newsletters_delete',
                'section_group_id' => 1230,
                'caption' => 'Delete newsletters item',
            ),
            191 =>
            array (
                'id' => 1233,
                'name' => 'admin_newsletters_export_excel',
                'section_group_id' => 1230,
                'caption' => 'Export excel newsletters item',
            ),
            192 =>
            array (
                'id' => 1250,
                'name' => 'admin_contacts',
                'section_group_id' => NULL,
                'caption' => 'Contacts',
            ),
            193 =>
            array (
                'id' => 1251,
                'name' => 'admin_contacts_lists',
                'section_group_id' => 1250,
                'caption' => 'Contacts lists',
            ),
            194 =>
            array (
                'id' => 1252,
                'name' => 'admin_contacts_reply',
                'section_group_id' => 1250,
                'caption' => 'Contacts reply',
            ),
            195 =>
            array (
                'id' => 1253,
                'name' => 'admin_contacts_delete',
                'section_group_id' => 1250,
                'caption' => 'Contacts delete',
            ),
            196 =>
            array (
                'id' => 1300,
                'name' => 'admin_product_discount',
                'section_group_id' => NULL,
                'caption' => 'product discount',
            ),
            197 =>
            array (
                'id' => 1301,
                'name' => 'admin_product_discount_list',
                'section_group_id' => 1300,
                'caption' => 'product discount list',
            ),
            198 =>
            array (
                'id' => 1302,
                'name' => 'admin_product_discount_create',
                'section_group_id' => 1300,
                'caption' => 'create product discount',
            ),
            199 =>
            array (
                'id' => 1303,
                'name' => 'admin_product_discount_edit',
                'section_group_id' => 1300,
                'caption' => 'edit product discount',
            ),
            200 =>
            array (
                'id' => 1304,
                'name' => 'admin_product_discount_delete',
                'section_group_id' => 1300,
                'caption' => 'delete product discount',
            ),
            201 =>
            array (
                'id' => 1305,
                'name' => 'admin_product_discount_export',
                'section_group_id' => 1300,
                'caption' => 'delete product export excel',
            ),
            202 =>
            array (
                'id' => 1350,
                'name' => 'admin_pages',
                'section_group_id' => NULL,
                'caption' => 'pages',
            ),
            203 =>
            array (
                'id' => 1351,
                'name' => 'admin_pages_list',
                'section_group_id' => 1350,
                'caption' => 'pages list',
            ),
            204 =>
            array (
                'id' => 1352,
                'name' => 'admin_pages_create',
                'section_group_id' => 1350,
                'caption' => 'pages create',
            ),
            205 =>
            array (
                'id' => 1353,
                'name' => 'admin_pages_edit',
                'section_group_id' => 1350,
                'caption' => 'pages edit',
            ),
            206 =>
            array (
                'id' => 1354,
                'name' => 'admin_pages_toggle',
                'section_group_id' => 1350,
                'caption' => 'pages toggle publish/draft',
            ),
            207 =>
            array (
                'id' => 1355,
                'name' => 'admin_pages_delete',
                'section_group_id' => 1350,
                'caption' => 'pages delete',
            ),
            208 =>
            array (
                'id' => 1400,
                'name' => 'admin_comments',
                'section_group_id' => NULL,
                'caption' => 'Comments',
            ),
            209 =>
            array (
                'id' => 1401,
                'name' => 'admin_webinar_comments',
                'section_group_id' => 1400,
                'caption' => 'Classes comments',
            ),
            210 =>
            array (
                'id' => 1402,
                'name' => 'admin_webinar_comments_edit',
                'section_group_id' => 1400,
                'caption' => 'Classes comments edit',
            ),
            211 =>
            array (
                'id' => 1403,
                'name' => 'admin_webinar_comments_reply',
                'section_group_id' => 1400,
                'caption' => 'Classes comments reply',
            ),
            212 =>
            array (
                'id' => 1404,
                'name' => 'admin_webinar_comments_delete',
                'section_group_id' => 1400,
                'caption' => 'Classes comments delete',
            ),
            213 =>
            array (
                'id' => 1405,
                'name' => 'admin_webinar_comments_status',
                'section_group_id' => 1400,
            'caption' => 'Classes comments status (active or pending)',
            ),
            214 =>
            array (
                'id' => 1406,
                'name' => 'admin_blog_comments',
                'section_group_id' => 1400,
                'caption' => 'Blog comments',
            ),
            215 =>
            array (
                'id' => 1407,
                'name' => 'admin_blog_comments_edit',
                'section_group_id' => 1400,
                'caption' => 'Blog comments edit',
            ),
            216 =>
            array (
                'id' => 1408,
                'name' => 'admin_blog_comments_reply',
                'section_group_id' => 1400,
                'caption' => 'Blog comments reply',
            ),
            217 =>
            array (
                'id' => 1409,
                'name' => 'admin_blog_comments_delete',
                'section_group_id' => 1400,
                'caption' => 'Blog comments delete',
            ),
            218 =>
            array (
                'id' => 1410,
                'name' => 'admin_blog_comments_status',
                'section_group_id' => 1400,
            'caption' => 'Blog comments status (active or pending)',
            ),
            219 =>
            array (
                'id' => 1450,
                'name' => 'admin_reports',
                'section_group_id' => NULL,
                'caption' => 'Reports',
            ),
            220 =>
            array (
                'id' => 1451,
                'name' => 'admin_webinar_reports',
                'section_group_id' => 1450,
                'caption' => 'Classes reports',
            ),
            221 =>
            array (
                'id' => 1452,
                'name' => 'admin_webinar_comments_reports',
                'section_group_id' => 1450,
                'caption' => 'Classes Comments reports',
            ),
            222 =>
            array (
                'id' => 1453,
                'name' => 'admin_webinar_reports_delete',
                'section_group_id' => 1450,
                'caption' => 'Classes reports delete',
            ),
            223 =>
            array (
                'id' => 1454,
                'name' => 'admin_blog_comments_reports',
                'section_group_id' => 1450,
                'caption' => 'Blog Comments reports',
            ),
            224 =>
            array (
                'id' => 1455,
                'name' => 'admin_report_reasons',
                'section_group_id' => 1450,
                'caption' => 'Reports reasons',
            ),
            225 =>
            array (
                'id' => 1500,
                'name' => 'admin_additional_pages',
                'section_group_id' => NULL,
                'caption' => 'Additional Pages',
            ),
            226 =>
            array (
                'id' => 1501,
                'name' => 'admin_additional_pages_404',
                'section_group_id' => 1500,
                'caption' => '404 error page settings',
            ),
            227 =>
            array (
                'id' => 1502,
                'name' => 'admin_additional_pages_contact_us',
                'section_group_id' => 1500,
                'caption' => 'Contact page settings',
            ),
            228 =>
            array (
                'id' => 1503,
                'name' => 'admin_additional_pages_footer',
                'section_group_id' => 1500,
                'caption' => 'Footer settings',
            ),
            229 =>
            array (
                'id' => 1504,
                'name' => 'admin_additional_pages_navbar_links',
                'section_group_id' => 1500,
                'caption' => 'Top Navbar links settings',
            ),
            230 =>
            array (
                'id' => 1550,
                'name' => 'admin_appointments',
                'section_group_id' => NULL,
                'caption' => 'Appointments',
            ),
            231 =>
            array (
                'id' => 1551,
                'name' => 'admin_appointments_lists',
                'section_group_id' => 1550,
                'caption' => 'Appointments lists',
            ),
            232 =>
            array (
                'id' => 1552,
                'name' => 'admin_appointments_join',
                'section_group_id' => 1550,
                'caption' => 'Appointments join',
            ),
            233 =>
            array (
                'id' => 1553,
                'name' => 'admin_appointments_send_reminder',
                'section_group_id' => 1550,
                'caption' => 'Appointments send reminder',
            ),
            234 =>
            array (
                'id' => 1554,
                'name' => 'admin_appointments_cancel',
                'section_group_id' => 1550,
                'caption' => 'Appointments cancel',
            ),
            235 =>
            array (
                'id' => 1600,
                'name' => 'admin_reviews',
                'section_group_id' => NULL,
                'caption' => 'Reviews',
            ),
            236 =>
            array (
                'id' => 1601,
                'name' => 'admin_reviews_lists',
                'section_group_id' => 1600,
                'caption' => 'Reviews lists',
            ),
            237 =>
            array (
                'id' => 1602,
                'name' => 'admin_reviews_status_toggle',
                'section_group_id' => 1600,
            'caption' => 'Reviews status toggle (publish or hidden)',
            ),
            238 =>
            array (
                'id' => 1603,
                'name' => 'admin_reviews_detail_show',
                'section_group_id' => 1600,
                'caption' => 'Review details page',
            ),
            239 =>
            array (
                'id' => 1604,
                'name' => 'admin_reviews_delete',
                'section_group_id' => 1600,
                'caption' => 'Review delete',
            ),
            240 =>
            array (
                'id' => 1650,
                'name' => 'admin_consultants',
                'section_group_id' => NULL,
                'caption' => 'Consultants',
            ),
            241 =>
            array (
                'id' => 1651,
                'name' => 'admin_consultants_lists',
                'section_group_id' => 1650,
                'caption' => 'Consultants lists',
            ),
            242 =>
            array (
                'id' => 1652,
                'name' => 'admin_consultants_export_excel',
                'section_group_id' => 1650,
                'caption' => 'Consultants export excel',
            ),
        ));


    }
}