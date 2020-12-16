@extends('layouts.master_auth')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header block-header-default">
                    <div class="block-options">
                        <div class="block-options-item">
                            <span class="js-flot-live-info text-primary font-w700"></span>
                        </div>
                        <div class="block-options-item">
                            <i class="fa fa-refresh fa-spin text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- Pie Chart Container -->
                    <canvas id="marksChart" width="370" height="120" class="rounded shadow"></canvas>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{asset('js/plugins/chartjs/Chart.js')}}"></script>

    <script>
        var ctx = document.getElementById('marksChart');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: {!!json_encode($chart->labels)!!},
                datasets: [{
                    // Students dataset
                    label: 'Students per class',
                    data: {!!json_encode($chart->students)!!},
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.3)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    // Class assignments dataset
                    label: 'Assignments per class',
                    data: {!!json_encode($chart->assignments)!!},
                    backgroundColor: [
                        'rgba(0, 0, 233, 0.3)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 255, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    // Class posts datasets
                    label: 'Posts per class',
                    data: {!!json_encode($chart->class_posts)!!},
                    backgroundColor: [
                        'rgba(50, 205, 50, 0.3)'


                    ],
                    borderColor: [
                        'rgba(124, 252, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                }
            }
        });
    </script>
@endsection
