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
        /*
            Across Sites
            Across Lainya: ping 196.202.164.9 -t
        */
        $clientAcross = Client::factory()->create([
            'name' => 'Across Sites',
        ]);

        Site::factory()->create([
            'client_id' => $clientAcross->id,
            'name' => 'Across Lainya',
            'ip_address' => '196.202.164.9',
            'is_online' => true,
        ]);

        /*
            Care Sites 
        */
        $clientCare = Client::factory()->create([
            'name' => 'Care Sites',
            'queue' => 'care'
        ]);
        // Pariang Care: ping 81.199.20.181 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Pariang Care',
            'ip_address' => '81.199.20.181',
            'is_online' => true,
        ]);
        // Yida Care: ping 81.199.20.185 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Yida Care',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);

        // Mankien Care: ping 81.199.20.193 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Mankien Care',
            'ip_address' => '81.199.20.193',
            'is_online' => true,
        ]);
        // Abien Care: ping 81.199.20.209 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Abien Care',
            'ip_address' => '81.199.20.209 ',
            'is_online' => true,
        ]);
        // Wau Care: ping 81.199.20.217 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Wau Care',
            'ip_address' => '81.199.20.217',
            'is_online' => true,
        ]);
        // Torit Care: ping 81.199.201.29 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Torit Care',
            'ip_address' => '81.199.201.29',
            'is_online' => true,
        ]);
        // Ikwotos: ping 81.199.20.221 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Ikwotos Care',
            'ip_address' => '81.199.20.221',
            'is_online' => true,
        ]);
        // Panyagor Care: ping 81.199.20.177 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Panyagor Care',
            'ip_address' => '81.199.20.177',
            'is_online' => true,
        ]);
        // Bor Care: ping 81.199.20.129 -t
        Site::factory()->create([
            'client_id' => $clientCare->id,
            'name' => 'Bor Care',
            'ip_address' => '81.199.20.129',
            'is_online' => true,
        ]);


        /*
            CEDSS 
        */
        $clientCEDDS = Client::factory()->create([
            'name' => 'CEDSS',
            'queue' => 'cedss'
        ]);

        // CEDSS Rumbek: ping 196.202.166.57 -t
        Site::factory()->create([
            'client_id' => $clientCEDDS->id,
            'name' => 'CEDSS Rumbek',
            'ip_address' => '196.202.166.57',
            'is_online' => true,
        ]);

        // CEDSS Awiel: ping 154.56.98.65 -t
        Site::factory()->create([
            'client_id' => $clientCEDDS->id,
            'name' => 'CEDSS Awiel',
            'ip_address' => '154.56.98.65',
            'is_online' => true,
        ]);


        /*
            EC POP 
        */
        $clientECPOP = Client::factory()->create([
            'name' => 'EC POP ',
            'queue' => 'ecpop'
        ]);

        // EC JUBA SUPER: ping 102.64.125.193 -t
        Site::factory()->create([
            'client_id' => $clientECPOP->id,
            'name' => 'EC JUBA SUPER',
            'ip_address' => '102.64.125.193',
            'is_online' => true,
        ]);

        // EC JUBA LQ: ping 41.220.251.181 -t
        Site::factory()->create([
            'client_id' => $clientECPOP->id,
            'name' => 'EC JUBA LQ',
            'ip_address' => '41.220.251.181',
            'is_online' => true,
        ]);


        /*
            iSat KU Sites 
        */
        $clientiSatKUSites = Client::factory()->create([
            'name' => 'iSat KU Sites',
            'queue' => 'isat'
        ]);

        // CARNAK YEI: ping 154.56.98.49 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'CARNAK YEI',
            'ip_address' => '154.56.98.49',
            'is_online' => true,
        ]);

        // Warchild Melut: ping 196.202.166.141 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'Warchild Melut',
            'ip_address' => '196.202.166.141',
            'is_online' => true,
        ]);

        // NIDO Chotbora: ping 196.202.165.201 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'NIDO Chotbora',
            'ip_address' => '196.202.165.201',
            'is_online' => true,
        ]);

        // NIDO Pangak: ping 196.202.166.49 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'NIDO Pangak',
            'ip_address' => '196.202.166.49',
            'is_online' => true,
        ]);

        // DT-Blobal Akobo: ping 196.202.165.129 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'DT-Blobal Akobo',
            'ip_address' => '196.202.165.129',
            'is_online' => true,
        ]);

        // MEDICAIR Akobo: ping 196.202.165.233 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'MEDICAIR Akobo',
            'ip_address' => '196.202.165.233',
            'is_online' => true,
        ]);

        // CARITAS SSD YEI: ping 196.202.165.93 -t
        Site::factory()->create([
            'client_id' => $clientiSatKUSites->id,
            'name' => 'CARITAS SSD YEI',
            'ip_address' => '196.202.165.93',
            'is_online' => true,
        ]);


        /*
            JOHANITER  
        */
        $clientJOHANITER = Client::factory()->create([
            'name' => 'Care Sites',
            'queue' => 'care'
        ]);

        // JOHANITTER TORIT GH: ping 154.56.98.173 -t
        Site::factory()->create([
            'client_id' => $clientJOHANITER->id,
            'name' => 'JOHANITTER TORIT GH',
            'ip_address' => '154.56.98.173',
            'is_online' => true,
        ]);

        // JOHANITTER TORIT OFF: ping 154.56.98.177 -t
        Site::factory()->create([
            'client_id' => $clientJOHANITER->id,
            'name' => 'JOHANITTER TORIT OFF',
            'ip_address' => '154.56.98.177',
            'is_online' => true,
        ]);

        // JOHANITTER WAU: ping 81.199.20.213 -t
        Site::factory()->create([
            'client_id' => $clientJOHANITER->id,
            'name' => 'JOHANITTER WAU',
            'ip_address' => '81.199.20.213',
            'is_online' => true,
        ]);


        /* 
            Plan Sites 
        */
        $clientPlanSites = Client::factory()->create([
            'name' => 'Care Sites',
        ]);

        // Plan Pibor HUB: ping 81.199.201.21 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Plan Pibor HUB',
            'ip_address' => '81.199.20.181',
            'is_online' => true,
        ]);
        // Plan Pibor Office: ping 81.199.201.121 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Plan Pibor ',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);
        // Plan Rumbek: ping 81.199.201.117 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => ' Plan Rumbek',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);

        // Plan Bentiu: ping 154.56.98.121 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Yida Care',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);

        // Plan RENK: ping 154.56.98.117 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Plan Bentiu',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);

        // Plan Torit: ping 154.56.98.53 -t
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Plan Torit',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);

        // Plan Malakal: ping 154.56.98.25 -t 
        Site::factory()->create([
            'client_id' => $clientPlanSites->id,
            'name' => 'Plan Malakal',
            'ip_address' => '81.199.20.185',
            'is_online' => true,
        ]);


        /* 
            TEARFUND 
        */
        $clientTEARFUND = Client::factory()->create([
            'name' => 'TEARFUND',
        ]);

        // TF POKTAP: ping 154.56.99.9 -t
        Site::factory()->create([
            'client_id' => $clientTEARFUND->id,
            'name' => 'TF POKTAP',
            'ip_address' => '154.56.99.9',
            'is_online' => true,
        ]);

        // TF POCHALLA: ping 154.56.99.5 -t 
        Site::factory()->create([
            'client_id' => $clientTEARFUND->id,
            'name' => 'TF POCHALLA',
            'ip_address' => '154.56.99.5',
            'is_online' => true,
        ]);



        /* 
            TOCH 
        */
        $clientTOCH = Client::factory()->create([
            'name' => 'TOCH',
        ]);

        // TOCH KUAJOK: ping 196.202.164.237 -t
        Site::factory()->create([
            'client_id' => $clientTOCH->id,
            'name' => 'TOCH KUAJOK',
            'ip_address' => '196.202.164.237',
            'is_online' => true,
        ]);

        // TOCH AWIEL: ping 196.202.164.5 -t
        Site::factory()->create([
            'client_id' => $clientTOCH->id,
            'name' => 'TOCH AWIEL',
            'ip_address' => '196.202.164.5',
            'is_online' => true,
        ]);

        // TOCH TONJ NORTH: ping 196.202.165.161 -t 
        Site::factory()->create([
            'client_id' => $clientTOCH->id,
            'name' => 'TOCH TONJ NORTH',
            'ip_address' => '196.202.165.161',
            'is_online' => true,
        ]);


        /* 
            WVI Sites 
            Tonj North WVI: ping 81.199.201.17 -t
            Tonj South WVI: ping 81.199.201.1 -t
            Malualkon WVI: ping 81.199.201.25 -t
            Melut WVI: ping 81.199.201.5 -t
            Kodok WVI: ping 81.199.20.17 -t
            Ulang WVI: ping 81.199.201.33 -t
            Ezo WVI: ping 81.199.20.245 -t
            Tambura Office WVI: ping 81.199.20.237 -t
            Tonj North CHD WVI: ping 196.202.165.73 -t
            Jikmir WVI CHD: ping 196.202.164.105 -t
            Makpandu WVI CHD: ping 196.202.164.57 -t
            EZO CHD WVI: ping 196.202.165.113 -t
            Nzara CHD WVI: ping 196.202.165.53 -t
            Yambio CHD WVI: ping 196.202.165.105 -t
            Nagero WVI CHD: ping 196.202.164.209 -t
            Tambura CHD: ping 196.202.165.149 -t
            Twic County WVI: ping 81.199.20.225 -t
            Kaka CHD WVI: ping 196.202.164.41 -t
            Kwajok WVI: ping 81.199.20.197 -t
            Malakal WVI: ping 81.199.20.201 -t
            Yambio WVI: ping 81.199.20.205 -t
            RENK WVI: ping 154.56.98.181 -t 
        */
        // ...existing code...

        /* 
            WVI Sites 
        */
        $clientWVISites = Client::factory()->create([
            'name' => 'WVI Sites',
        ]);

        // Tonj North WVI: ping 81.199.201.17 -t
        Site::factory()->create([
            'client_id' => $clientWVISites->id,
            'name' => 'Tonj North WVI',
            'ip_address' => '81.199.201.17',
            'is_online' => true,
        ]);

        // Tonj South WVI: ping 81.199.201.1 -t
        Site::factory()->create([
            'client_id' => $clientWVISites->id,
            'name' => 'Tonj South WVI',
            'ip_address' => '81.199.201.1',
            'is_online' => true,
        ]);

        // // Malualkon WVI: ping 81.199.201.25 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Malualkon WVI',
        //     'ip_address' => '81.199.201.25',
        //     'is_online' => true,
        // ]);

        // // Melut WVI: ping 81.199.201.5 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Melut WVI',
        //     'ip_address' => '81.199.201.5',
        //     'is_online' => true,
        // ]);

        // // Kodok WVI: ping 81.199.20.17 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Kodok WVI',
        //     'ip_address' => '81.199.20.17',
        //     'is_online' => true,
        // ]);

        // // Ulang WVI: ping 81.199.201.33 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Ulang WVI',
        //     'ip_address' => '81.199.201.33',
        //     'is_online' => true,
        // ]);

        // // Ezo WVI: ping 81.199.20.245 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Ezo WVI',
        //     'ip_address' => '81.199.20.245',
        //     'is_online' => true,
        // ]);

        // // Tambura Office WVI: ping 81.199.20.237 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Tambura Office WVI',
        //     'ip_address' => '81.199.20.237',
        //     'is_online' => true,
        // ]);

        // // Tonj North CHD WVI: ping 196.202.165.73 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Tonj North CHD WVI',
        //     'ip_address' => '196.202.165.73',
        //     'is_online' => true,
        // ]);

        // // Jikmir WVI CHD: ping 196.202.164.105 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Jikmir WVI CHD',
        //     'ip_address' => '196.202.164.105',
        //     'is_online' => true,
        // ]);

        // // Makpandu WVI CHD: ping 196.202.164.57 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Makpandu WVI CHD',
        //     'ip_address' => '196.202.164.57',
        //     'is_online' => true,
        // ]);

        // // EZO CHD WVI: ping 196.202.165.113 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'EZO CHD WVI',
        //     'ip_address' => '196.202.165.113',
        //     'is_online' => true,
        // ]);

        // // Nzara CHD WVI: ping 196.202.165.53 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Nzara CHD WVI',
        //     'ip_address' => '196.202.165.53',
        //     'is_online' => true,
        // ]);

        // // Yambio CHD WVI: ping 196.202.165.105 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Yambio CHD WVI',
        //     'ip_address' => '196.202.165.105',
        //     'is_online' => true,
        // ]);

        // // Nagero WVI CHD: ping 196.202.164.209 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Nagero WVI CHD',
        //     'ip_address' => '196.202.164.209',
        //     'is_online' => true,
        // ]);

        // // Tambura CHD: ping 196.202.165.149 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Tambura CHD',
        //     'ip_address' => '196.202.165.149',
        //     'is_online' => true,
        // ]);

        // // Twic County WVI: ping 81.199.20.225 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Twic County WVI',
        //     'ip_address' => '81.199.20.225',
        //     'is_online' => true,
        // ]);

        // // Kaka CHD WVI: ping 196.202.164.41 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Kaka CHD WVI',
        //     'ip_address' => '196.202.164.41',
        //     'is_online' => true,
        // ]);

        // // Kwajok WVI: ping 81.199.20.197 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Kwajok WVI',
        //     'ip_address' => '81.199.20.197',
        //     'is_online' => true,
        // ]);

        // // Malakal WVI: ping 81.199.20.201 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Malakal WVI',
        //     'ip_address' => '81.199.20.201',
        //     'is_online' => true,
        // ]);

        // // Yambio WVI: ping 81.199.20.205 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'Yambio WVI',
        //     'ip_address' => '81.199.20.205',
        //     'is_online' => true,
        // ]);

        // // RENK WVI: ping 154.56.98.181 -t
        // Site::factory()->create([
        //     'client_id' => $clientWVISites->id,
        //     'name' => 'RENK WVI',
        //     'ip_address' => '154.56.98.181',
        //     'is_online' => true,
        // ]);

        // Kuajok TH WVI: ping 81.199.20.241 -t
        Site::factory()->create([
            'client_id' => $clientWVISites->id,
            'name' => 'Kuajok TH WVI',
            'ip_address' => '81.199.20.241',
            'is_online' => true,
            // 'ping_output' => [

            // ]
        ]);

        // Gogrial WVI: ping 81.199.20.233 -t
        Site::factory()->create([
            'client_id' => $clientWVISites->id,
            'name' => 'Gogrial WVI',
            'ip_address' => '81.199.20.233',
            'is_online' => true,
        ]);


        /*
            ZOA Sites
        */
        $clientZOA = Client::factory()->create([
            'name' => 'ZOA Sites',
        ]);

        // ZOA AKON NORTH: ping 196.202.166.53 -t
        Site::factory()->create([
            'client_id' => $clientZOA->id,
            'name' => 'ZOA AKON NORTH',
            'ip_address' => '196.202.166.53',
            'is_online' => true,
        ]);

        // ZOA WAU: ping 154.56.98.85 -t
        Site::factory()->create([
            'client_id' => $clientZOA->id,
            'name' => 'ZOA WAU',
            'ip_address' => '154.56.98.85',
            'is_online' => true,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
