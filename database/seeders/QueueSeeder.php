<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Queue;

class QueueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('queues')->truncate();

        // Seed the queues table
        Queue::factory()->create([
            'name' => 'pingonequeue',
        ]);

        Queue::factory()->create([
            'name' => 'pingtwoqueue',
        ]);

        Queue::factory()->create([
            'name' => 'pingthreequeue',
        ]);

        Queue::factory()->create([
            'name' => 'pingfourqueue',
        ]);

        Queue::factory()->create([
            'name' => 'pingfivequeue',
        ]);

        // HOW TO RUN MULTIPLE QUEUE WORKERS:
//         # Worker for the default queue (or 'database' connection's default queue)
// php artisan queue:work 

        // # Worker for the 'emails' queue
// php artisan queue:work --queue=emails 

        // # Worker for the 'notifications' queue
// php artisan queue:work --queue=notifications 

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
