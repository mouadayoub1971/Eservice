<?php

namespace App\Services;

use Carbon\Carbon;

class TimeInterval
{

    public function isTimeInInterval($startTime, $endTime, $checkTime)
    {
        // Parse the times using Carbon
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $timeToCheck = Carbon::parse($checkTime);

        // Check if the time to check is within the interval
        if ($start->greaterThan($end)) {
            // Interval spans midnight
            return $timeToCheck->between($start, Carbon::parse('23:59:59')) ||
                $timeToCheck->between(Carbon::parse('00:00:00'), $end);
        }

        return $timeToCheck->between($start, $end);
    }

}
