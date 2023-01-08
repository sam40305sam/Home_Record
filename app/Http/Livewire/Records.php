<?php

namespace App\Http\Livewire;

use App\Models\RecordD;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Records extends Component
{

    protected $data=[];

    public function render()
    {
        return view('livewire.records-h', [
            'data' => $this->read(),
        ]);
    }

    public function read()
    {
        $latest_data=RecordD::orderBy('id', 'desc')->first();
        if(!$latest_data){
            $latest = Carbon::now();
            $from_date = Carbon::now()->subDays(1);
        }else{
            $latest = Carbon::parse($latest_data->time);
            $from_date = Carbon::parse($latest_data->time)->subDays(1);
        }
        $records = RecordD::whereBetween('time', [$from_date, $latest])
            ->orderBy('id', 'desc')   
            ->get(); 
        return $records;
    }
}
