<?php

namespace Database\Seeders;
use App\Models\Exam;
use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the exams table with sample data
        Exam::create([
            'title' => 'Science',
            'description' => 'This is the Grade 6 Science exam paper',
            'duration' => 5, 
            'start_time' => '2023-10-01 09:00:00', 
            'end_time' => '2023-10-01 10:00:00', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         // Seed the exams table with sample data
         Exam::create([
            'title' => 'Social Studies',
            'description' => 'This is the Grade 6 social studies exam paper',
            'duration' => 5, 
            'start_time' => '2023-10-01 10:00:00', 
            'end_time' => '2023-10-01 11:00:00', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
