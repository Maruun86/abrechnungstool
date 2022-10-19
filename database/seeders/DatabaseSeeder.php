<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Vat;
use App\Models\Item;
use App\Models\Layout;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\ItemVendor;
use App\Models\VendorItem;
use Illuminate\Database\Seeder;
use Database\Factories\VatFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        #
        $layoutNames = ['Getränke','Speisen','Garderobe','Merchandise','Photos','Infostand'];
        $layoutViews = ['getraenke','speisen','garderobe','merchandise','photos','infostand'];
        Layout::factory()->create([
            'name' => 'Kein Layout',
            'view_path' => 'no_layout'
        ]);

        for ($i=0; $i < 20; $i++) { 
            $rand = rand(0,5);
            $layout = Layout::factory()->create([
                'name' => $layoutNames[$rand],
                'view_path' =>  $layoutViews[$rand]
            ]);
            $vendor =Vendor::factory()->create([
                'layout_id' => $layout->id
            ]);
          
        }
        Vat::factory(10)->create(); 
        Item::factory(20)->create();

        foreach (Item::all() as $item) {
            $vats = Vat::inRandomOrder()->take(rand(1,10))->pluck('id');
        }
        Customer::factory(20)->create();
    }

};
