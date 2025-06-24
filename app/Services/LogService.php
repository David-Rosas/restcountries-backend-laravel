<?php

namespace App\Services;

use App\Models\CountryLog;

class LogService
{
    public function get($startDate = null, $endDate = null)
    {
        $query = CountryLog::query();

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('request_timestamp', [$startDate, $endDate]);
            return $query->get();
        }
         $result = $query->latest()->take(10)->get();

        return  $result;
    }

    public function updateUsername($id, $username)
    {
        $log = CountryLog::findOrFail($id);
        $log->username = $username;
        $log->save();

        return $log;
    }

    public function delete($id)
    {
        return CountryLog::where('id', $id)->delete();
    }
}
