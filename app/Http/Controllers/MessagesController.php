<?php

namespace App\Http\Controllers;

use App\id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->ajax()){
            return('ajax');
        }else{
             return('not');      
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        if($request->ajax()){

            return('ajax');
        }else{
            return view('test');        
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  return $id->test(3);
        $messages = new id;
        $messages->sender = $request->sender;
        $messages->msg = $request->msg;
        $messages->save();
        echo $messages;
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        
       $this->createtable($id); 
       /* $conversation = DB::table('1')->get();

         if($request->ajax()){
            return $conversation;
        }else{
            //return to some view
            echo $id;        
        }*/
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

    public function createtable($id)
    {
        Schema::create($id, function (Blueprint $table) {
                $table->increments('mid');
                $table->integer('sender');
                $table->text('msg');
                $table->char('status', 2)->default(1);
                $table->timestamps();
                    });
        
    }

    
}
