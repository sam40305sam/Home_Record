<div>
    <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">Requests</h2>
        </div>
        <div id="Requestschart">
        </div>
    </div>

    <script>
        var Requestsoptions = {
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
            name: 'Requests',
            data: [
                @if($data->count())
                @foreach($data as $item)
                    {
                        x:"{{$item->time}}",
                        y:"{{$item->numbers}}"
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
        },
        yaxis: {
            min: 0,
            max: {{$data->max('numbers')+750}}
        }
    }

    var Requestschart = new ApexCharts(document.querySelector("#Requestschart"), Requestsoptions);

    Requestschart.render();
    </script>
</div>

</div>