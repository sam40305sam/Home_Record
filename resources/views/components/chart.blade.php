@php
    $classes = ($idName == "humchart")
            ? 'mt-10 card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6'
            : 'card bg-white overflow-hidden shadow-xl sm:rounded-lg p-6';
@endphp

<div>
    <div class="{{$classes}}">
        <div class="flex flex-row flex-wrap justify-between items-center">
            <h2 class="font-bold text-lg">{{$slot}}</h2>
        </div>
        <div id="{{$idName}}">
        </div>
    </div>
    <script>
        var {{$idName}}options = {
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
                name: '{{$y_name}}',
                data: [
                    @if(!$datas->isEmpty())
                    @foreach($datas as $item)
                        {
                            x:"{{$item->time}}",
                            @if(($y_data=="temperature"||$y_data=="humidity")&&$item->numbers!=0)
                                y:"{{round($item->$y_data/$item->numbers,2)}}",
                            @else
                                y:"{{$item->$y_data}}",
                            @endif
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
    
        var {{$idName}} = new ApexCharts(document.querySelector("#{{$idName}}"), {{$idName}}options);
    
        {{$idName}}.render();
    </script>
</div>