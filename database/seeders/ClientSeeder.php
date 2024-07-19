<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Site;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('clients')->truncate();

        // Across Sites
        $clientAcross = Client::factory()->create([
                'name'=> 'Across Sites',
            ]);

        Site::factory()->create([
            'client_id'=> $clientAcross->id,
            'name' => 'Across Lainya', 
            'ip_address' => '196.202.164.9', 
            'is_online' => true,  
        ]);

        // Care sites 
        $clientCare = Client::factory()->create([
            'name'=> 'Care Sites',
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Pariang Care', 
            'ip_address' => '81.199.20.181', 
            'is_online' => true, 
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Yida Care', 
            'ip_address' => '81.199.20.185', 
            'is_online' => true, 
        ]);

       

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
