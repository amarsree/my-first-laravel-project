<?php

namespace App\Http\Controllers; 

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;

class ShowUsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $users=DB::table('users')->select('email','id','name')->get();        
        if($request->ajax()){
            return $users;
        }else{
            //return view("test");
            return view('home');
        }
        //both ajax and for html
     /* $users = User::select('id', 'name')->get();
      if ($request->is('ajax')) {
        return $users;
        }
        else{
           return view('home', ['users'=> $users]); 
        }
     */
    }

  //return $users;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //displaying the user conversation with id's 
         $user = DB::table('users')->where('id', $id)->first();

         if($request->ajax()){
            return 'sdf';
        }else{
            return 'dsf';        
        }


     /* if ($request->is('ajax/*')) {
        return $user->name;
        }
        else{
          return view('home', array('chat_user' => $user));
        }*/



       
      // return view('home', array('chat_user' => $user));
      // return $user->name;
       
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
