<?php

namespace App\Http\Controllers;

use App\ImportData;
use App\Lpu;
use App\Smo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataController extends Controller
{
    public function index(){
        return view('import.index', [
            'smo' => Smo::all(),
            'lpu' => Lpu::all(),
        ]);
    }

    public function upload(Request $request){
        Validator::make($request->all(), [
            'smo'           => 'required',
            'registry'      => 'required',
            'importdata'    => 'required|file',
            'code_lpu_vz'   => 'required'
        ])->validate();

        $smo_id         = $request->smo;
        $registry_id    = $request->registry;
        $code_lpu_vz    = $request->code_lpu_vz;

        $path = $request->file('importdata')->getRealPath();
        $data = Excel::load($path, function ($reader){})->get()->toArray();

        switch($smo_id){
            case "1": {
                foreach($data as $value){
                    $count = count($value);
                    foreach($value as $key => $upload){
                        if($key > 9 && $key < $count-9){
                            $temp = explode(',', $upload[2]);
                            $importData[] = [
                                'smo_id' => $smo_id,
                                'registry_id' => $registry_id,
                                'code_lpu_vz' => $code_lpu_vz,
                                'policy' => $upload[1],
                                'patient' => $temp[0],
                                'birthday' => Carbon::parse($temp[1])->format('Y-m-d'),
                                'code_lpu_direction' => $upload[3],
                                'code_service' => $upload[4],
                                'data_direction' => Carbon::parse($upload[5])->format('Y-m-d'),
                                'price' => $upload[6],
                                'status' => $upload['Приложение 9'],
                            ];
                        }
                    }
                }
                if(!empty($importData)){
                    ImportData::insert($importData);
                }
                break;
            }
            case '2': {
                foreach($data as $value){
                    $count = count($value);
                    foreach($value as $key => $upload){
                        if($key > 5 && $key < $count-9){
                            $temp = explode(' ', $upload[3]);
                            //dd($temp);
                            $temp1 = explode('/', end($temp));
                            $temp2 = explode('-', $upload[7]);
                            $date = str_replace('/', '.', $temp2[0]);
                            $importData[] = [
                                'smo_id' => $smo_id,
                                'registry_id' => $registry_id,
                                'code_lpu_vz' => $code_lpu_vz,
                                'policy' => $upload[2],
                                'patient' => $temp[0].' '.$temp[1].' '.$temp[2],
                                'birthday' => Carbon::parse($temp1[0])->format('Y-m-d'),
                                'code_lpu_direction' => $upload[4],
                                'code_lpu_attachment' => $upload[5],
                                'code_service' => $upload[6],
                                'data_direction' => Carbon::parse($date)->format('Y-m-d'),
                                'price' => $upload[8],
                            ];
                        }
                    }
                }
                if(!empty($importData)){
                    ImportData::insert($importData);
                }
                break;
            }
        }

        return back()->with('success', 'Данные успешно загружены');

    }
}
