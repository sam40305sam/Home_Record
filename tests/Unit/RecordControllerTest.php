<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecordControllerTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithAuthentication;

    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_store()
    {
        $user = User::factory()->create();
        $time = Carbon::now();

        $data = [
            'temperature' => rand(0, 100),
            'humidity' => rand(0, 100),
            'time' => $time
        ];

        $response = $this->actingAs($user)->post(Route('record.store'), $data);

        //Record(records)
        $this->assertDatabaseHas('records', $data);

        //RecordH
        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}:".(floor($time->minute/5)*5).":00";
        $m_time=Carbon::parse($m_time);
        $data['time'] = $m_time;
        $this->assertDatabaseHas('recordsh', $data);

        //RecordD
        $m_time="{$time->year}-{$time->month}-{$time->day} {$time->hour}".":00:00";
        $m_time=Carbon::parse($m_time);
        $data['time'] = $m_time;
        $this->assertDatabaseHas('recordsd', $data);

        //RecordW
        $m_time="{$time->year}-{$time->month}-{$time->day} ".(floor($time->hour/4)*4).":00:00";
        $m_time=Carbon::parse($m_time);
        $data['time'] = $m_time;
        $this->assertDatabaseHas('recordsw', $data);

        //RecordMM
        $m_time="{$time->year}-{$time->month}-{$time->day} 00:00:00";
        $m_time=Carbon::parse($m_time);
        $data['time'] = $m_time;
        $this->assertDatabaseHas('recordsmm', $data);

        //RecordY
        $m_time="{$time->year}-{$time->month}-01 00:00:00";
        $m_time=Carbon::parse($m_time);
        $data['time'] = $m_time;
        $this->assertDatabaseHas('recordsy', $data);

        $this->assertTrue(true);
    }
}
