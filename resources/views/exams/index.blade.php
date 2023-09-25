@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exam Papers</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->title }}</td>
                <td>{{ $exam->description }}</td>
                <td>{{ $exam->duration }} minutes</td>
                <td>
    <a href="{{ route('exam.questions', ['exam' => $exam->id]) }}" class="btn btn-primary">View questions</a>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
