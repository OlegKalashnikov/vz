<?php

namespace App\Http\Controllers;

use App\Smo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('smo.index');
    }
    public function anyData(){
        return DataTables::of(Smo::query())->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Smo::create($request->all());
        return back();
    }
}
