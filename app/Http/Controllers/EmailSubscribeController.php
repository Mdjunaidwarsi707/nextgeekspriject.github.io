<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscribe;
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

class EmailSubscribeController extends Controller
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
     * @param  \App\Models\EmailSubscribe  $emailSubscribe
     * @return \Illuminate\Http\Response
     */
    public function show(EmailSubscribe $emailSubscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmailSubscribe  $emailSubscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailSubscribe $emailSubscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmailSubscribe  $emailSubscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailSubscribe $emailSubscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmailSubscribe  $emailSubscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailSubscribe $emailSubscribe)
    {
        //
    }

    public function email_subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
    
        $input = $request->all();
        $email=$input['email'];

        EmailSubscribe::create([
            'email' => $email
        ]);

        return redirect('/')
                        ->with('success','NewsLetters Email Send successfully.');
    }
    public function emailsubscribe_view(Request $request)
    {
        $all_email = DB::table('email_subscribes')->get();

        return view('Email-Subscribe.emailsubscribe-view',compact('all_email'));
    }
}
