<?php

namespace Database\Seeders;

use App\Models\Consultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consultation::create([
            'user_id' => 1,
            'topic' => 'Laravel Development',
            'description' => 'Discuss Laravel best practices.',
            'scheduled_at' => now()->addDays(2),
        ]);
    }
}
