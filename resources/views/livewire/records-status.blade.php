<div>

    <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">Requests</h2>
        </div>
        <div id="Requestschart">
        </div>
    </div>
    
    <script>
        var Requestschartoptions = {
                chart: {
                type: 'area',
                height: 325,
                animations: {
                    enabled: false,
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
                    @if(!$data->isEmpty())
                    @foreach($data as $item)
                        {
                            x:"{{$item->time}}",
                            y:"{{$item->numbers}}",
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
    
        var Requestschart = new ApexCharts(document.querySelector("#Requestschart"), Requestschartoptions);
    
        Requestschart.render();
    </script>
</div>

</div>