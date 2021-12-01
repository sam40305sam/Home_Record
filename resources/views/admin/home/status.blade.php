@extends('admin.layouts.master')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Charts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route("admin.home")}}">Dashboard</a></li>
            <li class="breadcrumb-item active">30天內的資料</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-chart-area fa-w-16 me-1" aria-hidden="true" focusable="false"
                     data-prefix="fas" data-icon="chart-area" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                          d="M500 384c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H12c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v308h436zM372.7 159.5L288 216l-85.3-113.7c-5.1-6.8-15.5-6.3-19.9 1L96 248v104h384l-89.9-187.8c-3.2-6.5-11.4-8.7-17.4-4.7z"></path>
                </svg><!-- <i class="fas fa-chart-area me-1"></i> Font Awesome fontawesome.com -->
                Status
            </div>
            <div class="card-body">
            <div id="chart">
            </div>
            </div>
            <div class="card-footer small text-muted">Updated {{Illuminate\Support\Carbon::now()}}</div>
        </div>
        @endsection

        @section("chart-area")
            <script>
                var options = {
                    chart: {
                        type: 'area',
                        height: 325,
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 800,
                            animateGradually: {
                                enabled: true,
                                delay: 150
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 350
                            }
                        }
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    markers: {
                        size: 4,
                    },
                    series: [{
                        name: 'requests',
                        data: [
                            @foreach($records as $record)
                                {
                                    x:"{{$record->data}}",
                                    y:"{{$record->count_data}}"
                                }
                            @if(!($loop->last))
                            ,
                            @endif
                            @endforeach
                        ]
                    }],
                    xaxis: {
                        type: 'datetime',
                        labels: {
                            format: 'yyyy-MM-dd',
                            datetimeUTC:false,
                        }
                    },
                    tooltip: {
                    x: {
                        format: 'yyyy-MM-dd'
                    }
                    },
                    yaxis: {
                        min: 0,
                        max: {{$records->max('count_data')+750}}
                    }
                }

                var chart = new ApexCharts(document.querySelector("#chart"), options);

                chart.render();
            </script>
@endsection
