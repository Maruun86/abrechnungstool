<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Customer Permissions
        Permission::factory()->create([
            'name' => 'Kunden erstellen',
            'gate_name' => 'create-customer',
            'description' => 'Erlaubt es dem Nutzer neue Kunden zu erstellen'
        ]);
        Permission::factory()->create([
            'name' => 'Kunde editieren',
            'gate_name' => 'edit-customer',
            'description' => 'Erlaubt es dem Nutzer Kunden zu editieren'
        ]);
        Permission::factory()->create([
            'name' => 'Kunde löschen',
            'gate_name' => 'delete-customer',
            'description' => 'Erlaubt es dem Nutzer Kunden zu löschen'
        ]);
        Permission::factory()->create([
            'name' => 'Kunde aktivieren/deaktivieren',
            'gate_name' => 'toggle-customer',
            'description' => 'Erlaubt es dem Nutzer Kunden zu aktivieren oder deaktivieren'
        ]);
        Permission::factory()->create([
            'name' => 'Alle Kunden anzeigen',
            'gate_name' => 'list-customers',
            'description' => 'Erlaubt es dem Nutzer die Kundenliste zu sehen'
        ]);
    }
}
