<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Ad\Database\Seeders\AdDatabaseSeeder;
use Modules\Auth\Database\Seeders\UserSeeder;
use Modules\ContactUs\Database\Seeders\ContactUsDatabaseSeeder;
use Modules\MainPage\Database\Seeders\MainPageDatabaseSeeder;
use Modules\Order\Database\Seeders\OrderDatabaseSeeder;
use Modules\Page\Database\Seeders\ImageVideoTitleSeeder;
use Modules\Page\Database\Seeders\PageDatabaseSeeder;
use Modules\Page\Database\Seeders\SectionFileSeeder;
use Modules\Page\Database\Seeders\SectionImageVideoSeeder;
use Modules\Page\Database\Seeders\SectionSeeder;
use Modules\Page\Database\Seeders\SectionTextSeeder;
use Modules\Page\Database\Seeders\SliderSeeder;
use Modules\Rest\Database\Seeders\RestDatabaseSeeder;
use Modules\Setting\Database\Seeders\SettingSeeder;
use Modules\SocialLink\Database\Seeders\SocialLinkDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
//            RestDatabaseSeeder::class,
//            OrderDatabaseSeeder::class,
//            AdDatabaseSeeder::class,
        ]);
    }
}
