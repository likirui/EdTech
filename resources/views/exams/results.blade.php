@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Total Marks for Exams</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Exam Title</th>
                <th>Total Marks Attained</th>
                <th>Total Exam Marks </th>
                <th>Percentage </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attemptedExams as $exam)
            <tr>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->total_marks }}</td>
                <td>{{ $exam->exam_total }}</td>
                <td>{{ $exam->percentage }} %</td>
                <td>
                <a href="{{ route('exam.questions-with-answers', ['exam' => $exam->id]) }}" class="btn btn-primary">Revise Questions</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
