@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Total Marks for Exams</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Exam Title</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->total_marks }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
