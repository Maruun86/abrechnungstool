<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Vat;
use App\Models\Item;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Layout;
use App\Models\Vendor;
use App\Models\History;
use App\Models\Customer;
use App\Models\Protokoll;
use App\Models\Permission;
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
        $this->call([
            PermissionsSeeder::class,
            SuperAdminSeeder::class
           
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        #
        $layoutNames = ['Getränke','Speisen','Garderobe','Merchandise','Photos','Infostand'];
        $layoutViews = ['getraenke','speisen','garderobe','merchandise','photos','infostand'];
        Role::factory()->create([
            'name' => 'PIN_Tester',
            'pin_needed' => true,
            'password_needed' => false
        ]);
        User::factory()->create([
            'name' => 'Tester_Pin',
            'email' => 'pin@test.de',
            'password' => bcrypt('1542'), //PIN
            'rfid_nr' => '99999',
            'role_id' => 2
        ]);
        Role::factory()->create([
            'name' => 'Password_Tester',
            'pin_needed' => false,
            'password_needed' => true
        ]);
        User::factory()->create([
            'name' => 'Tester_Password',
            'email' => 'password@test.de',
            'password' => bcrypt('password'), //Password
            'rfid_nr' => '99998',
            'role_id' => 3
        ]);

        User::factory(20)->create();
        Vat::factory()->create([
            'prozent_in_decimal' => 0
        ]); 
        Layout::factory()->create([
            'name' => 'Kein Layout',
            'view_path' => 'no_layout'
        ]);
        Role::factory()->create([
            'name' => 'Tester_Bedienung',
            'pin_needed' => true,
            'password_needed' => false
        ]);
        Role::factory()->create([
            'name' => 'Tester_Super-Verkäufer',
            'pin_needed' => false,
            'password_needed' => true
        ]);
        Role::factory()->create([
            'name' => 'Tester_Kassierer',
            'pin_needed' => true,
            'password_needed' => false
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


}