<!-- resources/views/parent/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-12 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Student Dashboard >> Online Assessment</h1>
            </div>

            <!-- Sample cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subjects</h5>
                            <p class="card-text">8</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming exams</h5>
                            <p class="card-text">200</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Assesment</h5>
                            <p class="card-text">10</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sample chart -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Total Assesment Per Month Graph</h5>
                            <canvas id="sampleChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Line Graph -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Student Performance Progress Graph</h5>
                            <canvas id="sampleLineGraph" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- JavaScript for charts and graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample chart
    var ctx = document.getElementById('sampleChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Total Assesment',
                data: [12, 14, 17, 25, 24, 13],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Sample Line Graph
    var lineCtx = document.getElementById('sampleLineGraph').getContext('2d');
    var lineGraph = new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Exam Performance',
                data: [12, 15, 16, 18, 16, 20],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
