<?php

namespace App\Http\Livewire;

use App\Models\RecordW;
use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Carbon;

class RecordsW extends Component
{
    protected $data=[];

    public function render()
    {
        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, SUM(temperature) avg_temp,SUM(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',floor( HOUR(time)/4 )*4) ,'%Y-%m-%d %H:00:00') as data"
        //     )
        //         ->whereBetween('time', [$from_date, $from_temp])
        //         ->groupBy('data')
        //         ->get();
        //     if(!$records->count()){
        //         $from_date = Carbon::parse($from_date)->addDays(1);
        //         $from_temp = Carbon::parse($from_date)->endOfDay();
        //         continue;
        //     }else{
        //         echo $from_date." ".$from_temp."<br><br>";
        //         foreach ($records as $record){
        //             $data = [
        //                 'temperature' => $record->avg_temp,
        //                 'humidity' => $record->avg_hum,
        //                 'numbers' => $record->numbers,
        //                 'time' => $record->data
        //             ];
        //             var_dump($data);
        //             echo "<br>";
        //             echo "<br>";
        //             $record = RecordW::create($data);
        //         }
        //     }
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // dd();
        // return "asd";
        return view('livewire.records-w', [
            'data' => $this->read(),
        ]);
    }

    public function read()
    {
        $latest_data=RecordW::orderBy('time', 'desc')->first();
        $latest = Carbon::parse($latest_data->time);
        $from_date = Carbon::parse($latest_data->time)->subDays(7);
        $records = RecordW::whereBetween('time', [$from_date, $latest])
            ->orderBy('time', 'desc')   
            ->get(); 
        return $records;
    }
}
