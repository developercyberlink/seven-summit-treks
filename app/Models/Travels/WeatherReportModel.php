<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class WeatherReportModel extends Model
{
    protected $table = 'cl_trip_weather_reports';
    protected $fillable = ['title', 'weather_report_uri', 'content', 'trip_detail_id'];
}
