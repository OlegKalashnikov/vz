<?php

namespace App\Http\Controllers;

use App\ImportData;
use App\Lpu;
use App\Smo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function excerpt(){
        return view('report.excerpt', [
            'date_start' => Carbon::now()->startOfMonth()->format('Y-m-d'),
            'code_lpu_vz' => Lpu::all(),
            'smo' => Smo::all(),
        ]);
    }

    public function excerptRead(Request $request){
        //dd($request->all());
        $data = DB::table('import_datas')
                    ->join('lpus', 'import_datas.code_lpu_direction', '=', 'lpus.code')
                    ->join('services', 'import_datas.code_service', '=', 'services.service')
                    ->where('smo_id', $request->smo_id)
                    ->where('registry_id', $request->registry_id)
                    ->where('code_lpu_vz', $request->code_lpu_vz)
                    ->where('data_direction', '>=', $request->date_start)
                    ->where('data_direction', '<=', $request->date_end)
                    ->select('import_datas.*', 'lpus.full_lpu', 'services.description')
                    ->get();
        return view('report.excerpt_read', [
            'data' => $data
        ]);
    }
}
