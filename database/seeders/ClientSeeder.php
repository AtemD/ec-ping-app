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

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Mankien Care', 
            'ip_address' => '81.199.20.193', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Abien Care', 
            'ip_address' => '81.199.20.209', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Wau Care', 
            'ip_address' => '81.199.20.217', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Torit Care', 
            'ip_address' => '81.199.201.29', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Ikwotos', 
            'ip_address' => '81.199.201.29', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Panyagor Care', 
            'ip_address' => '81.199.20.177', 
            'is_online' => true,  
        ]);

        Site::factory()->create([
            'client_id'=> $clientCare->id,
            'name' => 'Bor Care', 
            'ip_address' => '81.199.20.129', 
            'is_online' => true,  
        ]);
            
        
        // CEDSS 
        //     CEDSS Rumbek: ping 196.202.166.57 -t
        //     CEDSS Awiel: ping 154.56.98.65 -t

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
