<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\PageSeeder;
use Database\Seeders\FaqTablesSeeder;
use Database\Seeders\MenuTableSeeder;
use Database\Seeders\NewsTableSeeder;
use Database\Seeders\PagesTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\SitesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\AboutsTableSeeder;
use Database\Seeders\BrandsTableSeeder;
use Database\Seeders\GalleryTableSeeder;
use Database\Seeders\NoticesTableSeeder;
use Database\Seeders\SlidersTableSeeder;
use Database\Seeders\CountersTableSeeder;
use Database\Seeders\MenuItemTableSeeder;
use Database\Seeders\ServicesTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\CurrenciesTableSeeder;
use Database\Seeders\DoctorSlotTableSeeder;
use Database\Seeders\TestimonialTableSeeder;
use Database\Seeders\DoctorCategoryTableSeeder;
use Database\Seeders\GallerySectionTableSeeder;
use Database\Seeders\PaymentPlatformsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PageSeeder::class);

        $this->call(PaymentPlatformsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DoctorSlotTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(SectionTitleTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(NoticesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(MenuItemTableSeeder::class);
        $this->call(GallerySectionTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(DoctorCategoryTableSeeder::class);
        $this->call(CountersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(SocialsTableSeeder::class);
        $this->call(FaqTablesSeeder::class);
    }
}
