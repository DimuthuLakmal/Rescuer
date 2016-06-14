<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * 
 * This controller class used to calculate prewarnings using weather data and warning data in db
 * 
 * @see \App\Models\Warning
 * @see \Illuminate\Routing\Controller
 * 
 * @author Dimuthu <kjtdimuthu@gmail.com>
 * 
 * @copyright (c) 2016, Titans
 */
class PreWarningController extends Controller {

    /**
     * 
     * This function is used calculate prewarnings by weather api and warnings table in db.
     * 
     * @see \App\Models\Warning
     * @see OpenWeatherAPI
     * @see \Illuminate\Routing\Controller
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    
    public function index() {

        $result = array();

        $warnings = \DB::table('warnings')->where([
                    ['type', 'Land Slide'],
                    ['end_time', '>', date('Y-m-d H:i:s')],
                ])->orWhere([
                    ['type', 'Flood'],
                    ['end_time', '>', date('Y-m-d H:i:s')],
                ])->get();
        ;

        foreach ($warnings as $warning) {
            $data = "";
            $lat = $warning->lat;
            $lng = $warning->lng;
            $data .= $warning->id . '%' . $warning->type . '%' . $warning->address . '%' . $warning->start_time . '%' . $warning->end_time . '%' . $warning->level . '%' . $lat . '%' . $lng;

            $url = "http://api.openweathermap.org/data/2.5/forecast?lat=" . $lat . "&lon=" . $lng . "&APPID=e6f6adc7d61561f5cf6145f3ba813ee0";
            $r = file_get_contents($url);
            $obj = json_decode($r);
            //print($obj->list);
            $list = $obj->list;

            $total_rain_contains = 0;
            for ($i = 0; $i < count($list); $i++) {
                $weather = $list[$i]->weather[0]->description;
                if (strpos($weather, 'rain') !== false) {
                    $total_rain_contains++;
                }
            }
            $percentage = ($total_rain_contains / count($list)) * 100;
            if ($percentage > 80) {
                $data.='%extremly danger';
            } else if ($percentage > 65 && $percentage <= 80) {
                $data.='%danger';
            } else if ($percentage > 50 && $percentage <= 65) {
                $data.='%moderate';
            } else {
                $data.='%safe';
            }

            $result[] = $data;
        }

        return \View::make('prewarnings')->withWarnings($result);
    }

    public function getNotification() {

        $result = array();

        $warnings = \DB::table('warnings')->where([
                    ['type', 'Land Slide'],
                    ['end_time', '>', date('Y-m-d H:i:s')],
                ])->orWhere([
                    ['type', 'Flood'],
                    ['end_time', '>', date('Y-m-d H:i:s')],
                ])->get();
        ;

        foreach ($warnings as $warning) {
            $data = "";
            $lat = $warning->lat;
            $lng = $warning->lng;
            $data .= $warning->id . '%' . $warning->type . '%' . $warning->address . '%' . $warning->start_time . '%' . $warning->end_time . '%' . $warning->level . '%' . $lat . '%' . $lng;

            $url = "http://api.openweathermap.org/data/2.5/forecast?lat=" . $lat . "&lon=" . $lng . "&APPID=e6f6adc7d61561f5cf6145f3ba813ee0";
            $r = file_get_contents($url);
            $obj = json_decode($r);
            //print($obj->list);
            $list = $obj->list;

            $total_rain_contains = 0;
            for ($i = 0; $i < count($list); $i++) {
                $weather = $list[$i]->weather[0]->description;
                if (strpos($weather, 'rain') !== false) {
                    $total_rain_contains++;
                }
            }
            $percentage = ($total_rain_contains / count($list)) * 100;
            if ($percentage > 80) {
                $data.='%extremly danger';
            } else if ($percentage > 65 && $percentage <= 80) {
                $data.='%danger';
            } else if ($percentage > 50 && $percentage <= 65) {
                $data.='%moderate';
            } else {
                $data.='%safe';
            }

            $result[] = $data;
        }

        echo json_encode($result);
    }

}
