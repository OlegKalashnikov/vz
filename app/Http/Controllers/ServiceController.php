<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('services.index');
    }

    public function anyData(){
        return DataTables::of(Service::query())->make(true);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importData(Request $request){
        if($request->file('import')){
            $path = $request->file('import')->getRealPath();
            $data = Excel::load($path, function ($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach($data->toArray() as $row){
                    if(!empty($row)){
                        $dataImported[] = [
                            'service'       => $row['Код услуги'],
                            'description'   => $row['Наименование медицинской услуги'],
                        ];
                    }
                }
                if(!empty($dataImported)){
                    Service::insert($dataImported);
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
        Service::create($request->all());
        return back();
    }
}
