<?php

namespace App\Http\Controllers;

use App\Models\Record;
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
            switch ($range) {
                case "m":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMinute(1);
                    break;
                case "H":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subHours(1);
                    break;
                case "D":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(1);
                    break;
                case "W":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subDays(7);
                    break;
                case "M":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(1);
                    break;
                case "HM":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subMonths(6);
                    break;
                case "Y":
                    $from_date = Carbon::parse(Record::latest()->first()->time)->subYears(1);
                    break;
            }
            $records = Record::whereBetween('time', [$from_date, $latest])->get();
            $datas = [
                'records' => $records,
            ];
            return response($datas, Response::HTTP_OK);
        }
        return response(null, Response::HTTP_NOT_FOUND);
    }
}
