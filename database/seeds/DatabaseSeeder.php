<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PaymentChannelsTableSeeder::class);
        $this->call(AdvertisingBannersTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(CertificatesTemplatesTableSeeder::class);
        $this->call(NotificationTemplatesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SubscribesTableSeeder::class);
        $this->call(SupportDepartmentsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
    }
}
