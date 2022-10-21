<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Vat;
use App\Models\Item;
use App\Models\User;
use App\Models\Event;
use App\Models\Layout;
use App\Models\Vendor;
use App\Models\History;
use App\Models\Customer;
use App\Models\Protokoll;
use App\Models\Role;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        #
        $layoutNames = ['Getränke','Speisen','Garderobe','Merchandise','Photos','Infostand'];
        $layoutViews = ['getraenke','speisen','garderobe','merchandise','photos','infostand'];
        User::factory(20)->create();
        Role::factory(5)->create();
        Vat::factory()->create([
            'prozent_in_decimal' => 0
        ]); 
        Layout::factory()->create([
            'name' => 'Kein Layout',
            'view_path' => 'no_layout'
        ]);

        for ($i=0; $i < 5; $i++) { 
            $layout = Layout::factory()->create([
                'name' => $layoutNames[$i],
                'view_path' =>  $layoutViews[$i]
            ]);Vendor::factory()->create([
                'layout_id' => $layout->id
            ]);
          
        }
        Vat::factory(10)->create(); 
        Item::factory(20)->create();

        foreach (Item::all() as $item) {
            $vats = Vat::inRandomOrder()->take(rand(1,10))->pluck('id');
        }
        Customer::factory(20)->create();
        Event::factory(3)->create();

        for ($i=0; $i < 30  ; $i++) { 
            History::factory()->create([
                'customer_id' => rand(1,20),
                'event_id' => rand(1,3),
                'vendor_id' => rand(1,5),
            ]);
        }
        for ($i=0; $i < 30  ; $i++) { 
            Protokoll::factory()->create([
                'user_id' => rand(1,20),
                'event_id' => rand(1,3),
                'role_id' => rand(1,5),
            ]);
        }
        $users = User::all();
        $vendors = Vendor::all();
        foreach ($users as $user) {
            
            for ($i=0; $i < 5 ; $i++) { 
                $user->vendor()->associate($vendors[rand(1,4)])->save();
            }  
        }
        }
        

};
