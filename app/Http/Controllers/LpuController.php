<?php

namespace App\Http\Controllers;

use App\Lpu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class LpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lpu.index');
    }

    public function anyData(){
        return DataTables::of(Lpu::query())->make(true);
    }

    public function importData(Request $request){
        if($request->file('import')){
            $path = $request->file('import')->getRealPath();
            $data = Excel::load($path, function ($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data->toArray() as $row){
                    if(!empty($row)){
                        $dataImported[] = [
                            'code'       => $row['Код МО'],
                            'full_lpu'   => $row['полное наименование МО'],
                            'short_lpu'   => $row['краткое наименование МО'],
                        ];
                    }
                }
                if(!empty($dataImported)){
                    Lpu::insert($dataImported);
                }
            }
        }
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lpu::create($request->all());
        return back();
    }

}
