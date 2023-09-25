@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exam Questions</h1>
    @if ($exam)
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Your Answer</th>
                    <th>Correct Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result['question']->question_text }}</td>
                        <td>
                            @if ($result['userAnswer'])
                                {{ $result['userAnswer'] }}
                            @else
                                No answer submitted
                            @endif
                        </td>
                        <td>
                            @if ($result['question']->question_type === 'short_text')
                                @if ($result['isCorrect'])
                                    Correct
                                @else
                                    Incorrect - {{ $result['correctAnswer'] }}
                                @endif
                            @elseif ($result['question']->question_type === 'multiple_choice')
                                @if ($result['isCorrect'])
                                    Correct
                                @else
                                    Incorrect - Correct Answer: {{ $result['correctAnswer'] }}
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No questions available for this exam.</p>
    @endif
</div>
@endsection
