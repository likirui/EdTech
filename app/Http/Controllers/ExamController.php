<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Choice;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index()
    {
    // Fetch all exams from the database
     $exams = Exam::all();

     $role = auth()->user()->role;

     return view('exams.index', compact('role', 'exams'));
  }


public function showQuestions($examId)
{
    $exam = Exam::with('questions.choices')->find($examId);
    $role = auth()->user()->role;
    
    // Check if the exam exists
    if (!$exam) {
        abort(404);
    }
    
    // Get the user's submitted answers for this exam
    $userAnswers = Answer::where('exam_id', $examId)
        ->where('user_id', auth()->user()->id)
        ->pluck('question_id')
        ->toArray();
    
    // Filter questions to only load those that have not been answered by the user
    $questions = $exam->questions->filter(function ($question) use ($userAnswers) {
        return !in_array($question->id, $userAnswers);
    });
    
    // Pick the first unanswered question as the current question
    $currentQuestion = $questions->first();
    
    return view('exams.questions', compact('exam', 'role', 'currentQuestion'));
}

public function checkAnswerIsCorrect($questionId, $answerText) {
    $question = Question::find($questionId);

    if (!$question) {
        return false;
    }

    if ($question->question_type === 'short_text') {
        // For short text questions, compare the answer text stored in the question
         return strtolower($answerText) === strtolower($question->short_question_answer) ? 1 : 0;
    } elseif ($question->question_type === 'multiple_choice') {
        // For multiple-choice questions, check the selected choice and its correctness
        $selectedChoice = Choice::where('choice_text', $answerText)->first();
        if ($selectedChoice) {
            // Check if the selected choice is the correct choice for the question
            return $selectedChoice->is_correct == 1 ? 1 : 0;
        }
    }

    return 0;
}



public function submitExam(Request $request)
{

     // Validate the request data
     $validator = Validator::make($request->all(), [
        'exam_id' => 'required|string|max:255',
        'question_id' => 'required|string|max:255',
        'answer_text' => [
            'required_if:question_type,short_text',
            'string',
            'max:255',
        ],
    ]);

    if ($validator->fails()) {
        // Return validation errors as a PHP response
        return back()->withErrors($validator)->withInput();
    }
   // Validate the request data
$userId = auth()->user()->id;
$examId = $request->input('exam_id');
$questionId = $request->input('question_id'); 
$answerText = $request->input('answer_text');  
$answer = $request->input('answer');  

if (empty($answerText) && !empty($answer)) {
    $answerText = $answer;
}


$isCorrect = $this->checkAnswerIsCorrect($questionId, $answerText);

// Create a new Answer record for the question
Answer::create([
    'user_id' => $userId,
    'exam_id' => $examId,
    'question_id' => $questionId,
    'answer_text' => $answerText,
    'is_correct' => $isCorrect,
    'submitted_at' => now(),
]);

// Redirect back with a success message
return redirect()->back()->with('success', 'Answer submitted successfully.');
}

public function results()
{
    $user = auth()->user();
    $role = $user->role;
    
    // Get all exams that the user has attempted and where answers exist
    $attemptedExams = Exam::has('answers')
        ->whereHas('answers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->get();
    
    // Calculate total marks, exam total, and percentage for each attempted exam
    foreach ($attemptedExams as $exam) {
        $totalMarks = Answer::where('exam_id', $exam->id)
            ->where('user_id', $user->id)
            ->where('is_correct', 1)
            ->count();
    
        $exam->total_marks = $totalMarks;
        $exam->exam_total = $exam->questions()->count();
        $exam->percentage = ($totalMarks / $exam->exam_total) * 100;
    }
    
    return view('exams.results', compact('attemptedExams', 'role'));
    
}

public function showQuestionsWithAnswers($examId)
{
 // Get the exam and its questions
$exam = Exam::with('questions.choices')->find($examId);
$user = auth()->user();
$role = $user->role;

if (!$exam) {
    abort(404);
}

// Get the user's answers for this exam
$userAnswers = Answer::where('exam_id', $examId)
    ->where('user_id', auth()->user()->id)
    ->pluck('answer_text', 'question_id')
    ->toArray();

// Get all questions associated with the exam, including choices for multiple-choice questions
$questions = $exam->questions;

// Prepare an array to store results for each question
$results = [];

foreach ($questions as $question) {
    $result = [
        'question' => $question,
        'userAnswer' => isset($userAnswers[$question->id]) ? $userAnswers[$question->id] : null,
        'isCorrect' => false, 
        'correctAnswer' => '',
    ];

    if ($question->question_type === 'short_text') {
        if (isset($userAnswers[$question->id])) {
            $result['isCorrect'] = strtolower($userAnswers[$question->id]) === strtolower($question->short_question_answer);
            $result['correctAnswer'] = $question->short_question_answer;
        }
    } elseif ($question->question_type === 'multiple_choice') {
        if (isset($userAnswers[$question->id])) {
            $selectedChoice = Choice::where('choice_text', $userAnswers[$question->id])->first();
            if ($selectedChoice) {
                $result['isCorrect'] = $selectedChoice->is_correct == 1;
                $result['correctAnswer'] = $selectedChoice->choice_text;
            }
        }
    }

    $results[] = $result;
}

// Pass all data to the view
return view('exams.questions-with-answers', compact('exam', 'results', 'role'));
}


}
