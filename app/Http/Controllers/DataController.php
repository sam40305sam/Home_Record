<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class DataController extends Controller
{
    public function index()
    {
        $latest = Carbon::parse(Record::latest()->first()->time);
        $from_date = Carbon::parse(Record::latest()->first()->time)->subHours(1);
        $records = Record::selectRaw(
            "AVG(temperature) avg_temp,AVG(humidity) avg_hum, DATE_FORMAT(time, '%Y-%m-%d %H:%i') data"
        )
            ->whereBetween('time', [$from_date, $latest])
            ->groupBy('data')
            ->get();
//        dd($records);
        $datas = [
            'records' => $records,
        ];
        return view('admin.home.index', $datas);
    }

    public function show($range)
    {
        if ($range == "m" || $range == "H" || $range == "D" || $range == "W" || $range == "M" || $range == "HM" || $range == "Y") {
            $latest = Carbon::parse(Record::latest()->first()->time);
            $from_date = Carbon::now();
            $item_title = "";
            $records = Record::selectRaw(
                "AVG(temperature) avg_temp,AVG(humidity) avg_hum,  DATE_FORMAT(time, '%Y-%m-%d %H:%i') minute"
            )
                ->whereBetween('time', [$from_date, $latest])
                ->groupBy('minute')
                ->get();
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
                'item_title' => $item_title,
            ];
            return view('admin.home.search', $datas);
        }
        return response(null, Response::HTTP_NOT_FOUND);
    }
}
