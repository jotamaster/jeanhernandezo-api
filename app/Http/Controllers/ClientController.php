<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all()->where('is_active',1);

        return response()->json(["data"=>$clients,"error"=>false]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'giro' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(["data"=>["message"=>"data invalid"],"error"=>true]);
        }

        $client = new Client;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->giro = $request->giro;
        $client->is_active = 1;
        $client->save();
        
        return response()->json(["data"=>$client,"error"=>false]);
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
        $client = Client::find($id);
        if (!$client){
            return response()->json([
                "data" => [
                    "message"=>"404 not found"
                ],
                "error"=>true
            ]);
        }
        $client->is_active = 0;
        $client->save();

        return response()->json([
            "data"=>[
                "message"=>"client delete successful"
            ],
            "error"=>false
            ]
        );

    }
}
