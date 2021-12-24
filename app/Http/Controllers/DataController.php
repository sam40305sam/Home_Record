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
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class DataController extends Controller
{
    public function index()
    {
        $latest_data=RecordH::orderBy('id', 'desc')->first();
        $latest = Carbon::parse($latest_data->time);
        $from_date = Carbon::parse($latest_data->time)->subHours(1);
        $records = RecordH::whereBetween('time', [$from_date, $latest])
            ->get();

        $datas = [
            'records' => $records,
        ];
        return view('admin.home.index', $datas);
    }

    public function status()
    {
        $latest = Carbon::parse(Carbon::today())->endOfDay();
        $from_date = Carbon::parse(Carbon::today())->subMonth();
        $records = Record::selectRaw(
            "count(*) count_data, DATE_FORMAT(date(time),'%m-%d-%Y') as data "
        )
            ->whereBetween('time', [$from_date, $latest])
            ->groupBy('data')
            ->get();
        $datas = [
            'records' => $records,
        ];
        return view('admin.home.status', $datas);
    }

    // public function refresh_avg()
    // {
    //     M
    //     set_time_limit(0);
        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H:%i:%s') data"
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
        //                 'avg_tem' => $record->avg_temp,
        //                 'avg_hum' => $record->avg_hum,
        //                 'numbers' => $record->numbers,
        //                 'time' => $record->data
        //             ];
        //             var_dump($data);
        //             echo "<br>";
        //             echo "<br>";
        //             $record = RecordM::create($data);
        //         }
        //     }
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // return "asd";
        
        
        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',hour(time),':',floor( minute(time)/5 )*5) ,'%Y-%m-%d %H:%i:00') as data"
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
        //                 'avg_tem' => $record->avg_temp,
        //                 'avg_hum' => $record->avg_hum,
        //                 'numbers' => $record->numbers,
        //                 'time' => $record->data
        //             ];
        //             var_dump($data);
        //             echo "<br>";
        //             echo "<br>";
        //             $record = RecordH::create($data);
        //         }
        //     }
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // return "asd";
        
        
        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H:00:00') as data"
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
        //                 'avg_tem' => $record->avg_temp,
        //                 'avg_hum' => $record->avg_hum,
        //                 'numbers' => $record->numbers,
        //                 'time' => $record->data
        //             ];
        //             var_dump($data);
        //             echo "<br>";
        //             echo "<br>";
        //             $record = RecordD::create($data);
        //         }
        //     }
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // return "asd";
        
        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum, DATE_FORMAT(concat(date(time),' ',floor( HOUR(time)/4 )*4) ,'%Y-%m-%d %H:00:00') as data"
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
        //                 'avg_tem' => $record->avg_temp,
        //                 'avg_hum' => $record->avg_hum,
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
        // return "asd";

        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d 00:00:00') as data"
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
        //                 'avg_tem' => $record->avg_temp,
        //                 'avg_hum' => $record->avg_hum,
        //                 'numbers' => $record->numbers,
        //                 'time' => $record->data
        //             ];
        //             var_dump($data);
        //             echo "<br>";
        //             echo "<br>";
        //             $record = RecordMM::create($data);
        //         }
        //     }
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // return "asd";

        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // $temp=Carbon::parse($from_date)->subDays(1)->format('Y-m')."-01 00:00:00";
        // $data=[
        //     'avg_tem' => 0,
        //     'avg_hum' => 0,
        //     'numbers' => 0,
        //     'time' => $temp
        // ];
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-01 00:00:00') as data"
        //     )
        //         ->whereBetween('time', [$from_date, $from_temp])
        //         ->groupBy('data')
        //         ->get();
        //     if(!$records->count()){
        //         $temp=Carbon::parse($from_date)->format('Y-m')."-01 00:00:00";
        //         $from_date = Carbon::parse($from_date)->addDays(1);
        //         $from_temp = Carbon::parse($from_date)->endOfDay();
        //         continue;
        //     }else{
        //         foreach ($records as $record){
        //             if($temp==$record->data){
        //                 $data=[
        //                     'avg_tem' => (($data['avg_tem']*$data['numbers'])+($record->avg_temp*$record->numbers))/($data['numbers']+$record->numbers),
        //                     'avg_hum' => (($data['avg_hum']*$data['numbers'])+($record->avg_hum*$record->numbers))/($data['numbers']+$record->numbers),
        //                     'numbers' => ($data['numbers']+$record->numbers),
        //                     'time' => $temp
        //                 ];
        //             }else{
        //                 echo $from_date." ".$from_temp."<br><br>";
        //                 var_dump($data);
        //                 echo "<br>";
        //                 echo "<br>";
        //                 RecordHM::create($data);
        //                 $data=[
        //                     'avg_tem' => $record->avg_temp,
        //                     'avg_hum' => $record->avg_hum,
        //                     'numbers' => $record->numbers,
        //                     'time' => $temp
        //                 ];
        //             }
        //         }
        //     }
        //     $temp=Carbon::parse($from_date)->format('Y-m')."-01 00:00:00";
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // echo $from_date." ".$from_temp."<br><br>";
        // var_dump($data);
        // echo "<br>";
        // echo "<br>";
        // RecordHM::create($data);
        // return "asd";
        

        // $from_date = Carbon::parse(Carbon::today())->subYears(1);
        // $from_temp = Carbon::parse($from_date)->endOfDay();
        // $latest = Carbon::parse(Carbon::today())->endOfDay();
        // $temp=Carbon::parse($from_date)->subDays(1)->format('Y-m')."-01 00:00:00";
        // $data=[
        //     'avg_tem' => 0,
        //     'avg_hum' => 0,
        //     'numbers' => 0,
        //     'time' => $temp
        // ];
        // while(Carbon::parse($from_temp)->subDays(1)->endofDay()!=$latest){
        //     $records = Record::selectRaw(
        //         "count(time) numbers, AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-01 00:00:00') as data"
        //     )
        //         ->whereBetween('time', [$from_date, $from_temp])
        //         ->groupBy('data')
        //         ->get();
        //     if(!$records->count()){
        //         $temp=Carbon::parse($from_date)->format('Y-m')."-01 00:00:00";
        //         $from_date = Carbon::parse($from_date)->addDays(1);
        //         $from_temp = Carbon::parse($from_date)->endOfDay();
        //         continue;
        //     }else{
        //         foreach ($records as $record){
        //             if($temp==$record->data){
        //                 $data=[
        //                     'avg_tem' => (($data['avg_tem']*$data['numbers'])+($record->avg_temp*$record->numbers))/($data['numbers']+$record->numbers),
        //                     'avg_hum' => (($data['avg_hum']*$data['numbers'])+($record->avg_hum*$record->numbers))/($data['numbers']+$record->numbers),
        //                     'numbers' => ($data['numbers']+$record->numbers),
        //                     'time' => $temp
        //                 ];
        //             }else{
        //                 echo $from_date." ".$from_temp."<br><br>";
        //                 var_dump($data);
        //                 echo "<br>";
        //                 echo "<br>";
        //                 RecordY::create($data);
        //                 $data=[
        //                     'avg_tem' => $record->avg_temp,
        //                     'avg_hum' => $record->avg_hum,
        //                     'numbers' => $record->numbers,
        //                     'time' => $temp
        //                 ];
        //             }
        //         }
        //     }
        //     $temp=Carbon::parse($from_date)->format('Y-m')."-01 00:00:00";
        //     $from_date = Carbon::parse($from_date)->addDays(1);
        //     $from_temp = Carbon::parse($from_date)->endOfDay();
        // }
        // echo $from_date." ".$from_temp."<br><br>";
        // var_dump($data);
        // echo "<br>";
        // echo "<br>";
        // RecordY::create($data);
        // return "asd";

        // return "OK";
        // return view('admin.home.status', $datas);
    // }

    public function show($range)
    {
        if ($range == "m" || $range == "H" || $range == "D" || $range == "W" || $range == "M" || $range == "HM" || $range == "Y") {
            $latest = "";
            $from_date = "";
            $item_title = "";
            $records = "";
            switch ($range) {
                case "m":
                    $latest_data=RecordM::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subMinute(1);
                    $records = RecordM::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "一分鐘";
                    break;
                case "H":
                    $latest_data=RecordH::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subHours(1);
                    $records = RecordH::whereBetween('time', [$from_date, $latest])
                        ->get();

                    $item_title = "一小時";
                    break;
                case "D":
                    $latest_data=RecordD::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subDays(1);
                    $records = RecordD::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "一天";
                    break;
                case "W":
                    $latest_data=RecordW::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subDays(7);
                    $records = RecordW::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "一周";
                    break;
                case "M":
                    $latest_data=RecordMM::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subMonths(1);
                    $records = RecordMM::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "一個月";
                    break;
                case "HM":
                    $latest_data=RecordHM::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subMonths(6);
                    $records = RecordHM::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "半年";
                    break;
                case "Y":
                    $latest_data=RecordY::orderBy('id', 'desc')->first();
                    $latest = Carbon::parse($latest_data->time);
                    $from_date = Carbon::parse($latest_data->time)->subYears(1);
                    $records = RecordY::whereBetween('time', [$from_date, $latest])
                        ->get();
                    $item_title = "一年";
                    break;
                default:
                    return response(null, Response::HTTP_NOT_FOUND);
                    break;
            }
            $datas = [
                'records' => $records,
                'item_title' => $item_title,
            ];
            return view('admin.home.search', $datas);
        }
        return response(null, Response::HTTP_NOT_FOUND);
    }
}
