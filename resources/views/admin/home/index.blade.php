@extends('admin.layouts.master')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route("admin.home")}}">Dashboard</a></li>
        </ol>
        {{--        <div class="card mb-4">--}}
        {{--            <div class="card-body">--}}
        {{--                Chart.js is a third party plugin that is used to generate the charts in this template. The charts below--}}
        {{--                have been customized - for further customization options, please visit the official--}}
        {{--                <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a>--}}
        {{--                .--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-chart-area fa-w-16 me-1" aria-hidden="true" focusable="false"
                     data-prefix="fas" data-icon="chart-area" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M500 384c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v308h436zM372.7 159.5L288 216l-85.3-113.7c-5.1-6.8-15.5-6.3-19.9 1L96 248v104h384l-89.9-187.8c-3.2-6.5-11.4-8.7-17.4-4.7z"></path>
                </svg><!-- <i class="fas fa-chart-area me-1"></i> Font Awesome fontawesome.com -->
                溫度
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="AreaTemperature" style="display: block; height: 287px; width: 957px;"
                        class="chartjs-render-monitor" width="1196" height="358"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated {{Illuminate\Support\Carbon::now()}}</div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-chart-area fa-w-16 me-1" aria-hidden="true" focusable="false"
                     data-prefix="fas" data-icon="chart-area" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M500 384c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v308h436zM372.7 159.5L288 216l-85.3-113.7c-5.1-6.8-15.5-6.3-19.9 1L96 248v104h384l-89.9-187.8c-3.2-6.5-11.4-8.7-17.4-4.7z"></path>
                </svg><!-- <i class="fas fa-chart-area me-1"></i> Font Awesome fontawesome.com -->
                濕度
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="AreaHumidity" style="display: block; height: 287px; width: 957px;"
                        class="chartjs-render-monitor" width="1196" height="358"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated {{Illuminate\Support\Carbon::now()}}</div>
        </div>
        @endsection

        @section("chart-area")
            <script>
                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#292b2c';

                // Area Chart Example
                var ctxTemperature = document.getElementById("AreaTemperature");
                var AreaTemperature = new Chart(ctxTemperature, {
                    type: 'line',
                    data: {
                        labels: [
                            @foreach($records as $record)
                                "{{$record->data}}"
                            @if(!($loop->last))
                            ,
                            @endif
                            @endforeach
                        ],
                        datasets: [{
                            label: "溫度",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: [
                                @foreach($records as $record)
                                        {{$record->avg_temp}}
                                        @if(!($loop->last))
                                ,
                                @endif
                                @endforeach
                            ],
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });

                // Area Chart Example
                var ctxHumidity = document.getElementById("AreaHumidity");
                var AreaHumidity = new Chart(ctxHumidity, {
                    type: 'line',
                    data: {
                        labels: [
                            @foreach($records as $record)
                                "{{$record->data}}"
                            @if(!($loop->last))
                            ,
                            @endif
                            @endforeach
                        ],
                        datasets: [{
                            label: "濕度",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: [
                                @foreach($records as $record)
                                        {{$record->avg_hum}}
                                        @if(!($loop->last))
                                ,
                                @endif
                                @endforeach
                            ],
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });

            </script>
@endsection
