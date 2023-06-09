<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use DB;
// use Hash;
use Illuminate\Support\Arr;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Session;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

date_default_timezone_set('Asia/Kolkata');

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function clients_form(Request $request)
    {
        return view('client.client-form');
    }
    public function clients_create(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required',
            'client_email' => 'required',
            'client_mobile' => 'required|min:10|max:10',
            'client_state' => 'required',
            'client_address' => 'required',
            'client_landmark' => 'required'
        ]);
    
        $input = $request->all();
        $client_name=$input['client_name'];
        $client_email=$input['client_email'];
        $client_mobile=$input['client_mobile'];
        $client_state=$input['client_state'];
        $client_address=$input['client_address'];
        $client_landmark=$input['client_landmark'];

        Client::create([
            'client_name' => $client_name,
            'client_email' => $client_email,
            'client_mobile' => $client_mobile,
            'client_state' => $client_state,
            'client_address' => $client_address,
            'client_landmark' => $client_landmark,
        ]);

        return redirect()->route('clients.form')
                        ->with('success','Create New Clients successful.');
    }
    public function clients_view(Request $request)
    {
        $all_team = DB::table('clients')->get();

        return view('client.client-view',compact('all_team'));
    }
    public function clients_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $team_list = DB::table('clients')
            ->where('id','=',$id)
            ->get();
        
        return view('client.client-edit',compact('team_list'));
    }
    public function clients_update(Request $request)
    {
        $input = $request->all();
        $client_name=$input['client_name'];
        $client_email=$input['client_email'];
        $client_mobile=$input['client_mobile'];
        $client_state=$input['client_state'];
        $client_address=$input['client_address'];
        $client_landmark=$input['client_landmark'];

        $id=$input['id'];

        Client::where('id','=', $id)->update([
            'client_name' => $client_name,
            'client_email' => $client_email,
            'client_mobile' => $client_mobile,
            'client_state' => $client_state,
            'client_address' => $client_address,
            'client_landmark' => $client_landmark,
            ]);

        return redirect()->route('clients.view')
                        ->with('success','Clients Details successfully updated.');
    }
    public function clients_delete(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        
        $team_list_delete = DB::table('clients')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('clients.view')
                        ->with('success','Clients Details successfully Deleted.');
    }
}
