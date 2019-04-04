<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kadastr;
use App\Kato;
use App\Building;
use App\Logs;
use App\Type;
use App\Meter;
use App\Http\Controllers\DB;

class KadastrController extends Controller
{
  public function all(){
    try{
      $kadastr = kadastr::select('*')->get();
      return response()->json($kadastr);
    }
    catch(\Exception $exception){
      return response()->json(['message'=>$exception->getMessage()],500);
    }
  }

  public function getValue($cadastral_no){
    return \DB::table('almaty_meter_logs')
    ->join('almaty_meter.building_id','=','almaty_building.id')
    ->join('almaty_meter_logs.meter_id','=', 'almaty_meter.id')
    ->where('cadastral_number','=',$cadastral_no)
    ->get(
        'value'
    );
  }

  public function insert(){

  }
}
