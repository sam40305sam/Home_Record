<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\RecordD;
use App\Models\RecordH;
use App\Models\RecordHM;
use App\Models\RecordM;
use App\Models\RecordMM;
use App\Models\RecordW;
use App\Models\RecordY;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();
        $datas = [
            'records' => $records,
        ];
        return response($datas, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                               'temperature' => 'required',
                               'humidity' => 'required',
                               'time' => 'required',
                           ]);
        $record = Record::create($request->all());
        $time=Carbon::parse($request->time);

        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}:{$time->minute}:{$time->second}";
        $m_time=Carbon::parse($m_time);
        $data=RecordM::where('time',$m_time)->first();
        if($data){
            RecordM::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordM::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}:".floor($time->minute/5*5);
        $m_time=Carbon::parse($m_time);
        $data=RecordH::where('time',$m_time)->first();
        if($data){
            RecordH::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordH::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}".":00";
        $m_time=Carbon::parse($m_time);
        $data=RecordD::where('time',$m_time)->first();
        if($data){
            RecordD::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordD::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day} ".floor($time->hour/4*4).":00";
        $m_time=Carbon::parse($m_time);
        $data=RecordW::where('time',$m_time)->first();
        if($data){
            RecordW::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordW::create($data);
        }

        $m_time="{$time->year}-{$time->month}-{$time->day}";
        $m_time=Carbon::parse($m_time);
        $data=RecordMM::where('time',$m_time)->first();
        if($data){
            RecordMM::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordMM::create($data);
        }

        $m_time="{$time->year}-{$time->month}-01";
        $m_time=Carbon::parse($m_time);
        $data=RecordHM::where('time',$m_time)->first();
        if($data){
            RecordHM::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordHM::create($data);
        }

        $m_time="{$time->year}-{$time->month}-01";
        $m_time=Carbon::parse($m_time);
        $data=RecordY::where('time',$m_time)->first();
        if($data){
            RecordY::where('time',$m_time)
                ->update([
                    'avg_tem' => (($data->avg_tem*$data->numbers)+$request->temperature)/($data->numbers+1),
                    'avg_hum'=>(($data->avg_hum*$data->numbers)+$request->humidity)/($data->numbers+1),
                    'numbers'=>($data->numbers+1),
                    'time' => $m_time
                ]);
        }else{
            $data = [
                'avg_tem' => $request->temperature,
                'avg_hum' => $request->humidity,
                'numbers' => 1,
                'time' => $m_time
            ];
            $record = RecordY::create($data);
        }
        return response($record, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return response($record, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        $record->update($request->all());
        return response($record, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Record $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        $record->delete();
        // 回傳 null 並且給予 204 狀態碼
        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    public function refresh(Request $request)
    {
        $range = "m";
        if ($range == "m" || $range == "H" || $range == "D" || $range == "W" || $range == "M" || $range == "HM" || $range == "Y" || $range == "YTD") {
            $latest = Carbon::parse(Record::latest()->first()->time);
            $from_date = Carbon::now();
            $records="";
            switch ($range) {
                case "m":
                    $record = RecordM::create($request->all());
                    return "OK";
                    // return $request->humidity;
                    break;
                case "H":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subHours(1);
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',hour(time),':',floor( minute(time)/5 )*5) ,'%Y-%m-%d %H:%i') as data"
                    )
                        ->groupBy('data')
                        ->get();
                    break;
                case "D":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(1);
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H:00:00') data"
                    )
                        ->groupBy('data')
                        ->get();
                    break;
                case "W":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(7);
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',floor( HOUR(time)/4 )*4) ,'%Y-%m-%d %H:00:00') as data"
                    )
                        ->groupBy('data')
                        ->get();
                    break;
                case "M":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(1);
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d 00:00:00') data"
                    )
                        ->groupBy('data')
                        ->get();
                    break;
                case "HM":
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-01 00:00:00') data"
                    )
                        ->groupBy('data')
                        ->get();
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(6);
                    break;
                case "Y":
                    $records = Record::selectRaw(
                        "count(time) numbers, AVG(temperature) avg_tem,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-01 00:00:00') data"
                    )
                        ->groupBy('data')
                        ->get();
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subYears(1);
                    break;
            }
            $datas = [
                'records' => $records,
            ];
            return response($datas, Response::HTTP_OK);
        }
        return response(null, Response::HTTP_NOT_FOUND);
    }
    /**
     * Search Record Range By DateTime
     *
     * @param str $range
     * @return \Illuminate\Http\Response
     */
    public function search($range)
    {
        if ($range == "m" || $range == "H" || $range == "D" || $range == "W" || $range == "M" || $range == "HM" || $range == "Y" || $range == "YTD") {
            $latest = Carbon::parse(Record::latest()->first()->time);
            $from_date = Carbon::now();
            $records="";
            switch ($range) {
                case "m":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMinute(1);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H:%i:%s') data"
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();
                    $item_title = "一分鐘";
                    break;
                case "H":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subHours(1);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',hour(time),':',floor( minute(time)/5 )*5) ,'%Y-%m-%d %H:%i') as data "
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();

                    $item_title = "一小時";
                    break;
                case "D":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(1);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H') data"
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();
                    $item_title = "一天";
                    break;
                case "W":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(7);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',floor( HOUR(time)/4 )*4) ,'%Y-%m-%d %H') as data "
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();

                    $item_title = "一周";
                    break;
                case "M":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(1);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d') data"
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();
                    $item_title = "一個月";
                    break;
                case "HM":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(6);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m') data"
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();
                    $item_title = "半年";
                    break;
                case "Y":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subYears(1);
                    $records = Record::selectRaw(
                        "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m') data"
                    )
                        ->whereBetween('time', [$from_date, $latest])
                        ->groupBy('data')
                        ->get();
                    $item_title = "一年";
                    break;
                default:
                    return response(null, Response::HTTP_NOT_FOUND);
                    break;
            }
            $datas = [
                'records' => $records,
            ];
            return response($datas, Response::HTTP_OK);
        }
        return response(null, Response::HTTP_NOT_FOUND);
    }
}
