<?php

namespace Database\Seeders;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Sample data for questions
         $questions = [
            [
                'exam_id' => '1',
                'question_text' => 'The force applied to do work is called ?',
                'question_type' => 'multiple_choice',
                'short_question_answer' => null,
            ],
            [
                'exam_id' => '1',
                'question_text' => 'What is the name of material that allows heat to pass through?',
                'question_type' => 'short_text',
                'short_question_answer' => 'good conductors',
            ],
        ];

        // Insert data into the 'questions' table
        foreach ($questions as $key => $questionData) {
            $question = Question::create($questionData);

            // Add choices for the first question only
            if ($key === 0) {
                $choices = [
                    ['choice_text' => 'Effort', 'is_correct' => 1],
                    ['choice_text' => 'Power', 'is_correct' => 0],
                    ['choice_text' => 'Force', 'is_correct' => 0],
                    ['choice_text' => 'Work', 'is_correct' => 0],
                ];

                foreach ($choices as $choiceData) {
                    $question->choices()->create($choiceData);
                }
            }
        }
    }
    }

