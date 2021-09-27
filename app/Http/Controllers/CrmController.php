<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('crms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Crm $crm)
    {
        return view('crms.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(Crm $crm)
    {
        return view('crms.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crm $crm)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {

    }
}
