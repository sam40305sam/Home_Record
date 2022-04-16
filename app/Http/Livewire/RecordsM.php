<?php

namespace App\Http\Livewire;

use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Carbon;

class RecordsM extends Component
{

    protected $data=[];

    public function render()
    {
        return view('livewire.records-m', [
            'data' => $this->read(),
        ]);
    }
    
    public function read()
    {
        $latest_data=Record::orderBy('time', 'desc')->first();
        $latest = Carbon::parse($latest_data->time);
        $from_date = Carbon::parse($latest_data->time)->subMinute(1);
        $records = Record::whereBetween('time', [$from_date, $latest])
            ->orderBy('time', 'desc')    
            ->get();
        return $records;
    }
}
