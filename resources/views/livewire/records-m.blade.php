<div>
<div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
    <div class="flex flex-row flex-wrap justify-between items-center">
        <h2 class="font-bold text-lg">溫度</h2>
    </div>
    <div id="tempchart">
    </div>
</div>

<div class="mt-10 card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
    <div class="flex flex-row flex-wrap justify-between items-center">
        <h2 class="font-bold text-lg">濕度</h2>
    </div>
    <div id="humchart">
    </div>
</div>

    <script>
        var tempoptions = {
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
            name: 'temperature',
            data: [
                @if($data->count())
                @foreach($data as $item)
                    {
                        x:"{{$item->time}}",
                        y:"{{$item->temperature}}"
                    }
                    @if(!($loop->last))
                    ,
                    @endif
                @endforeach
                @endif
            ]
        }],
        xaxis: {
            type: 'datetime',
            labels: {
                format: 'yyyy-MM-dd HH:mm:ss',
                datetimeUTC:false,
            }
        },
        tooltip: {
        x: {
            format: 'yyyy-MM-dd HH:mm:ss'
        }
        }
    }

    var tempchart = new ApexCharts(document.querySelector("#tempchart"), tempoptions);

    tempchart.render();


    
    var humoptions = {
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
            name: 'humidity',
            data: [
                @if($data->count())
                @foreach($data as $item)
                    {
                        x:"{{$item->time}}",
                        y:"{{$item->humidity}}"
                    }
                    @if(!($loop->last))
                    ,
                    @endif
                @endforeach
                @endif
            ]
        }],
        xaxis: {
            type: 'datetime',
            labels: {
                format: 'yyyy-MM-dd HH:mm:ss',
                datetimeUTC:false,
            }
        },
        tooltip: {
        x: {
            format: 'yyyy-MM-dd HH:mm:ss'
        }
        }
    }

    var humchart = new ApexCharts(document.querySelector("#humchart"), humoptions);

    humchart.render();
    </script>
</div>
</div>
