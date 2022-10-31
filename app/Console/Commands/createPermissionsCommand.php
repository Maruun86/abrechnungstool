<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Console\Command;

class createPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates all nessesary Permissions if needed, and a User with all rights';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Checks if Permission exist, if not then create it

        //-----------------------CUSTOMERS------------------------------
        if(!Permission::where('gate_name', 'create-customer')->first())
        {
            $permission = Permission::create([
                'name' => 'Kunden erstellen',
                'gate_name' => 'create-customer',
                'description' => 'Erlaubt es dem Nutzer neue Kunden zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-customer')->first())
        {
            $permission = Permission::create([
            'name' => 'Kunde editieren',
            'gate_name' => 'edit-customer',
            'description' => 'Erlaubt es dem Nutzer Kunden zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-customer')->first())
        {
            $permission = Permission::create([
                'name' => 'Kunde löschen',
                'gate_name' => 'delete-customer',
                'description' => 'Erlaubt es dem Nutzer Kunden zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'toggle-customer')->first())
        {
            $permission = Permission::create([
                'name' => 'Kunde aktivieren/deaktivieren',
                'gate_name' => 'toggle-customer',
                'description' => 'Erlaubt es dem Nutzer Kunden zu aktivieren oder deaktivieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-customers')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Kunden anzeigen',
                'gate_name' => 'list-customers',
                'description' => 'Erlaubt es dem Nutzer die Kundenliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Customers done....\n");

        //---------------------------------ITEMS------------------------------------
        if(!Permission::where('gate_name', 'create-item')->first())
        {
            $permission = Permission::create([
                'name' => 'Item erstellen',
                'gate_name' => 'create-item',
                'description' => 'Erlaubt es dem Nutzer neue Items zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-item')->first())
        {
            $permission = Permission::create([
            'name' => 'Item editieren',
            'gate_name' => 'edit-item',
            'description' => 'Erlaubt es dem Nutzer Items zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-item')->first())
        {
            $permission = Permission::create([
                'name' => 'Item löschen',
                'gate_name' => 'delete-item',
                'description' => 'Erlaubt es dem Nutzer Items zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-items')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Items anzuzeigen',
                'gate_name' => 'list-items',
                'description' => 'Erlaubt es dem Nutzer die Itemliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Items done....\n");

        //------------------------------Layouts---------------------------------
        if(!Permission::where('gate_name', 'create-layout')->first())
        {
            $permission = Permission::create([
                'name' => 'Layout erstellen',
                'gate_name' => 'create-layout',
                'description' => 'Erlaubt es dem Nutzer neue Layouts zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-layout')->first())
        {
            $permission = Permission::create([
            'name' => 'Layout editieren',
            'gate_name' => 'edit-layout',
            'description' => 'Erlaubt es dem Nutzer Layouts zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-layout')->first())
        {
            $permission = Permission::create([
                'name' => 'Layouts löschen',
                'gate_name' => 'delete-layout',
                'description' => 'Erlaubt es dem Nutzer Layouts zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-layouts')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Layouts anzeigen',
                'gate_name' => 'list-layouts',
                'description' => 'Erlaubt es dem Nutzer die Itemliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Layouts done....\n");

        //------------------------------VATs---------------------------------
        
        if(!Permission::where('gate_name', 'create-vat')->first())
        {
            $permission = Permission::create([
                'name' => 'VATs erstellen',
                'gate_name' => 'create-vat',
                'description' => 'Erlaubt es dem Nutzer neue VATs zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-vat')->first())
        {
            $permission = Permission::create([
            'name' => 'VATs editieren',
            'gate_name' => 'edit-vat',
            'description' => 'Erlaubt es dem Nutzer VATs zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-vat')->first())
        {
            $permission = Permission::create([
                'name' => 'VATs löschen',
                'gate_name' => 'delete-vat',
                'description' => 'Erlaubt es dem Nutzer VATs zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-vats')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle VATs anzeigen',
                'gate_name' => 'list-vats',
                'description' => 'Erlaubt es dem Nutzer die VAT-Liste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("VATs done....\n");

        //------------------------------Vendors---------------------------------
        
        if(!Permission::where('gate_name', 'create-vendor')->first())
        {
            $permission = Permission::create([
                'name' => 'Vendors erstellen',
                'gate_name' => 'create-vendor',
                'description' => 'Erlaubt es dem Nutzer neue Vendors zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-vendor')->first())
        {
            $permission = Permission::create([
            'name' => 'Vendors editieren',
            'gate_name' => 'edit-vendor',
            'description' => 'Erlaubt es dem Nutzer Vendors zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-vendor')->first())
        {
            $permission = Permission::create([
                'name' => 'Vendors löschen',
                'gate_name' => 'delete-vendor',
                'description' => 'Erlaubt es dem Nutzer Vendors zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-vendors')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Vendors anzeigen',
                'gate_name' => 'list-vendors',
                'description' => 'Erlaubt es dem Nutzer die Vendorliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("VATs done....\n");

        //------------------------------Events---------------------------------
    
        if(!Permission::where('gate_name', 'create-event')->first())
        {
            $permission = Permission::create([
                'name' => 'Events erstellen',
                'gate_name' => 'create-event',
                'description' => 'Erlaubt es dem Nutzer neue Events zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-event')->first())
        {
            $permission = Permission::create([
            'name' => 'Events editieren',
            'gate_name' => 'edit-event',
            'description' => 'Erlaubt es dem Nutzer Events zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-event')->first())
        {
            $permission = Permission::create([
                'name' => 'Events löschen',
                'gate_name' => 'delete-event',
                'description' => 'Erlaubt es dem Nutzer Events zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'toggle-event')->first())
        {
            $permission = Permission::create([
                'name' => 'Events zu aktivieren/deaktivieren',
                'gate_name' => 'toggle-event',
                'description' => 'Erlaubt es dem Nutzer ein Event zu aktivieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        
        if(!Permission::where('gate_name', 'show-event')->first())
        {
            $permission = Permission::create([
                'name' => 'Eventdetails anzeigen',
                'gate_name' => 'show-event',
                'description' => 'Erlaubt es dem Nutzer ein Event genauer zu betrachten'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }

        if(!Permission::where('gate_name', 'list-events')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Events anzuzeigen',
                'gate_name' => 'list-events',
                'description' => 'Erlaubt es dem Nutzer die Eventliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'users-event')->first())
        {
            $permission = Permission::create([
                'name' => 'Benutzer für ein Event ändern',
                'gate_name' => 'users-event',
                'description' => 'Erlaubt es dem Nutzer, die Weisung von Benutzern für ein Event'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Events done....\n");
        
        //------------------------------Role---------------------------------
    
        if(!Permission::where('gate_name', 'create-role')->first())
        {
            $permission = Permission::create([
                'name' => 'Rollen erstellen',
                'gate_name' => 'create-role',
                'description' => 'Erlaubt es dem Nutzer neue Rollen zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-role')->first())
        {
            $permission = Permission::create([
            'name' => 'Rollen editieren',
            'gate_name' => 'edit-role',
            'description' => 'Erlaubt es dem Nutzer Rollen zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-role')->first())
        {
            $permission = Permission::create([
                'name' => 'Rollen löschen',
                'gate_name' => 'delete-role',
                'description' => 'Erlaubt es dem Nutzer Rollen zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Roles done....\n");

        //------------------------------Users---------------------------------
    
        if(!Permission::where('gate_name', 'create-user')->first())
        {
            $permission = Permission::create([
                'name' => 'Benutzer erstellen',
                'gate_name' => 'create-user',
                'description' => 'Erlaubt es dem Nutzer neue Benutzer zu erstellen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'edit-user')->first())
        {
            $permission = Permission::create([
            'name' => 'Benutzer editieren',
            'gate_name' => 'edit-user',
            'description' => 'Erlaubt es dem Nutzer Benutzer zu editieren'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'delete-user')->first())
        {
            $permission = Permission::create([
                'name' => 'Benutzer löschen',
                'gate_name' => 'delete-user',
                'description' => 'Erlaubt es dem Nutzer Benutzer zu löschen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        if(!Permission::where('gate_name', 'list-users')->first())
        {
            $permission = Permission::create([
                'name' => 'Alle Benutzer anzuzeigen',
                'gate_name' => 'list-users',
                'description' => 'Erlaubt es dem Nutzer die Benutzerliste zu sehen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }
        echo("Users done....\n");



         //------------------------------Stuff---------------------------------
        if(!Permission::where('gate_name', 'show-dashboard')->first())
        {
            $permission = Permission::create([
                'name' => 'Zeigt das Dashboard an',
                'gate_name' => 'show-dashboard',
                'description' => 'Erlaubt es dem Nutzer das Dashboard zu nutzen'
            ]);
            echo("Gate:".$permission->gate_name." "."created\n");
        }






        if(!Role::where('name', 'SuperAdmin')->first())
        {
            //User and Role created
            $role = Role::factory()->create([
                'name' => 'SuperAdmin',
                'pin_needed' => false,
                'password_needed' => true
            ]);
            echo($role->name." created\n");
            //Has all Permissions
            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                $role->permissions()->attach($permission);
            }
            echo($role->name." "."got all Permissions\n");
        }
        if(!User::where('name', 'Admin')->first())
        {
            $role = Role::where('name', 'SuperAdmin')->first();
            $user =  User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@jade-hs.de',
                'vendor_id' => NULL,
                'password' => bcrypt('password'),
                'rfid_nr' => '0000',
            ]);
            $user->role()->associate($role)->save();
            echo($user->name." is now ".$role->name."\n");
            
        }else{
            $role = Role::where('name', 'SuperAdmin')->first();
            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                if(!$role->permissions->contains($permission))
                {
                    $role->permissions()->attach($permission);
                    echo('Missing '.$permission->name." added to ".$role->gate_name."\n");
                }
            }
        
        }
    }
}
