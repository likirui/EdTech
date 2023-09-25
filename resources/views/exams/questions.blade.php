@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exam: {{ $exam->title }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Countdown timer at the top right -->
    <div id="timer" class="text-right font-weight-bold" style="font-size: 24px;"></div>

    <div class="container">
    <h1>Exam: {{ $exam->title }}</h1>

    <!-- Countdown timer at the top right -->
    <div id="timer" class="text-right font-weight-bold" style="font-size: 24px;"></div>

    @if ($currentQuestion)
    <form id="examForm" action="{{ route('exam.submit', ['exam' => $exam->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
        <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">

        <div class="question">
            <h3>Question {{ $currentQuestion->id }}</h3>
            <p>{{ $currentQuestion->question_text }}</p>

            <!-- Display choices for multiple-choice questions -->
            @if ($currentQuestion->question_type == 'multiple_choice')
                <div class="choices">
                    @foreach ($currentQuestion->choices as $choice)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="choice{{ $choice->id }}" value="{{ $choice->choice_text }}">
                            <label class="form-check-label" for="choice{{ $choice->id }}">
                                {{ $choice->choice_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Display input field for short text questions -->
                <div class="form-group">
                    <label for="answer">Answer:</label>
                    <input type="text" class="form-control" id="answer" name="answer">
                </div>
            @endif
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary" id="submitExam">Submit Answer</button>
        </div>
    </form>
    @else
        <p>No more questions available for this exam.</p>
    @endif
</div>


<script>
  var durationInSeconds = {{ $exam->duration * 60 }}; // Convert duration to seconds
        var display = document.getElementById('timer');

        // Function to start the timer
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;

            function updateDisplay() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (timer <= 0) {
                    clearInterval(timerInterval);
                    alert('Time is up! Your answer will be submitted.');
                     document.getElementById('examForm').submit();
                }

                timer--; // Decrement timer
            }

            var timerInterval = setInterval(updateDisplay, 1000);
            updateDisplay(); // Update display immediately
        }

        // Start the timer when the page loads
        startTimer(durationInSeconds, display);
    </script>
   
@endsection
