<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use GuzzleHttp\Client;
use App\Http\Requests\CrmRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crms = Crm::all();
        return view('crms.index', compact('crms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $zipcode = $request->zipcode;

        $method = 'GET';
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;
        $options = [];

        $client = new Client();
        try {
            $response = $client->request($method, $url, $options);
            $body = $response->getBody();
            $code = json_decode($body, false);
            $address = $code->results[0]->address1 . $code->results[0]->address2 . $code->results[0]->address3;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return back();
        }

        return view('crms.create')->with(compact('address', 'zipcode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrmRequest $request)
    {
        $crm = new Crm();

        $crm->fill($request->all());

        $crm->save();

        return redirect()->route('crms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Crm $crm)
    {
        return view('crms.show', compact('crm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(Crm $crm)
    {
        return view('crms.edit', compact('crm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(CrmRequest $request, Crm $crm)
    {
        $crm->fill($request->all());
        
        $crm->save();

        return redirect()->route('crms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {
        $crm->delete();
        return redirect()->route('crms.index');
    }


    public function zipcode()
    {
        return view('crms.zipcode');
    }
}
