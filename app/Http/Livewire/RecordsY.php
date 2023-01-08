<?php

namespace App\Http\Livewire;

use App\Models\RecordY;
use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Carbon;

class RecordsY extends Component
{
    protected $data=[];

    public function render()
    {
        return view('livewire.records-y', [
            'data' => $this->read(),
        ]);
    }

    public function read()
    {
        $latest_data=RecordY::orderBy('id', 'desc')->first();
        if(!$latest_data){
            $latest = Carbon::now();
            $from_date = Carbon::now()->subYears(1);
        }else{
            $latest = Carbon::parse($latest_data->time);
            $from_date = Carbon::parse($latest_data->time)->subYears(1);
        }
        $records = RecordY::whereBetween('time', [$from_date, $latest])
            ->orderBy('id', 'desc')   
            ->get(); 
        return $records;
    }
}
