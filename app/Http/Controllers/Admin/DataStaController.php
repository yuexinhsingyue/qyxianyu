<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DataStaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取图表的X轴 近30天日期
        $days = 30;
        $nowday = date ('m/d');
        $chartX = array ();
        for($i = 0; $i < $days; $i++)
        {
            $chartX[]=date('m/d',strtotime($nowday)-$i*24*60*60);
        }
        // dd($chartX);
        $chartX = implode($chartX,',');
        return view('admin.datastati.salestat',compact('chartX'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visit()
    {

        //获取图表的X轴 近30天日期
        $days = 30;
        $nowday = date ('m/d');
        $chartX = array ();
        for($i = 0; $i < $days; $i++)
        {
            $chartX[]=date('m/d',strtotime($nowday)-$i*24*60*60);
        }
        // dd($chartX);
        $chartX = implode($chartX,',');
        return view('admin.datastati.visite',compact('chartX'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
