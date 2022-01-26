<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\RecordD;
use App\Models\RecordH;
use App\Models\RecordM;
use App\Models\RecordMM;
use App\Models\RecordW;
use App\Models\RecordY;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class RecordController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
                               'temperature' => 'required',
                               'humidity' => 'required',
                               'time' => 'required',
                           ]);
        $records = Record::create($request->all());
        $time=Carbon::parse($request->time);

        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}:".(floor($time->minute/5)*5).":00";
        $m_time=Carbon::parse($m_time);
        $data=RecordH::where('time',$m_time);
        $first_data=$data->first();
        if($first_data){
            $data->update([
                    'temperature' => $first_data->temperature+$request->temperature,
                    'humidity'=>$first_data->humidity+$request->humidity,
                    'numbers'=>($first_data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordH::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}".":00:00";
        $m_time=Carbon::parse($m_time);
        $data=RecordD::where('time',$m_time);
        $first_data=$data->first();
        if($first_data){
            $data->update([
                    'temperature' => $first_data->temperature+$request->temperature,
                    'humidity'=>$first_data->humidity+$request->humidity,
                    'numbers'=>($first_data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordD::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} ".floor($time->hour/4*4).":00:00";
        $m_time=Carbon::parse($m_time);
        $data=RecordW::where('time',$m_time);
        $first_data=$data->first();
        if($first_data){
            $data->update([
                    'temperature' => $first_data->temperature+$request->temperature,
                    'humidity'=>$first_data->humidity+$request->humidity,
                    'numbers'=>($first_data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordW::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} 00:00:00";
        $m_time=Carbon::parse($m_time);
        $data=RecordMM::where('time',$m_time);
        $first_data=$data->first();
        if($first_data){
            $data->update([
                    'temperature' => $first_data->temperature+$request->temperature,
                    'humidity'=>$first_data->humidity+$request->humidity,
                    'numbers'=>($first_data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordMM::create($data);
        }

        $m_time="{$time->year}-{$time->month}-01 00:00:00";
        $m_time=Carbon::parse($m_time);
        $data=RecordY::where('time',$m_time);
        $first_data=$data->first();
        if($first_data){
            $data->update([
                    'temperature' => $first_data->temperature+$request->temperature,
                    'humidity'=>$first_data->humidity+$request->humidity,
                    'numbers'=>($first_data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordY::create($data);
        }
        return response($records, Response::HTTP_CREATED);
    }
}
