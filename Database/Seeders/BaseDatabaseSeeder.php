<?php

namespace Modules\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Entities\Contact;
use Modules\Base\Entities\Setting;
use Modules\Base\Entities\ContactPage;

class BaseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Setting::firstOrCreate([
            'site_name' => 'Sample Site Name',
            'title' => 'Sample Title',
        ]);

        ContactPage::firstOrCreate([]);

        // $this->call("OthersTableSeeder");
    }
}
