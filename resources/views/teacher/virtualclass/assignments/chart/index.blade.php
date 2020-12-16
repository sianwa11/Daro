@extends('layouts.master_auth')

@section('content')

    <h2 class="content-heading">{{$assignment->title}} has an average score of
        @if($average_mark == 0) 0 @else {{$average_mark}} @endif</h2>
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
                    <canvas id="marksChart" width="400" height="100" class="rounded shadow"></canvas>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{asset('js/plugins/chartjs/Chart.js')}}"></script>

    <script>
        var ctx = document.getElementById('marksChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!!json_encode($chart->labels)!!},
                datasets: [{
                    label: '',
                    data: {!! json_encode($chart->dataset)!!},
                    backgroundColor: {!! json_encode($chart->colours)!!}
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
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>
@endsection
