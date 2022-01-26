<?php

namespace App\Http\Livewire;

use App\Models\RecordMM;
use App\Models\Record;
use Livewire\Component;
use Illuminate\Support\Carbon;

class RecordsStatus extends Component
{
    public function render()
    {
        return view('livewire.records-status', [
            'data' => $this->read(),
        ]);
    }

    public function read()
    {
        $latest_data=RecordMM::orderBy('id', 'desc')->first();
        $latest = Carbon::parse($latest_data->time);
        $from_date = Carbon::parse($latest_data->time)->subMonths(1);
        $records = RecordMM::whereBetween('time', [$from_date, $latest])
            ->orderBy('id', 'desc')   
            ->get(); 
        return $records;
    }
}
