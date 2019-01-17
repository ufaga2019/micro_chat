<?php

namespace App\Http\Controllers;

use App\Models\MicroChats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class MicroChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('micro_chats');
    }

    /**
     *
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAlias(Request $request)
    {
        // Все сообщения по Алиасу
        $validator = Validator::make($request->all(), [
            'alias' => 'required|url',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        //  $query = MicroChats::where( 'object_id' , 1 )->where('alias', 'client')->get();
        $data = MicroChats::all();
        return response()->json(['success' => $data], 200);
    }

    public function get($alias)
    {
        // Выбор по 1 параметру
       // return response()->json(['success' => $this->getChat($alias, $request->has('withParents'))], 200);
        return response()->json(['success' => MicroChats::where(['alias' => $alias])->get()], 200);
    }

    public function getData(Request $request)
    {
        // Все сообщения по Алиасу и объекту
        $validator = Validator::make($request->all(), [
            'object_id' => 'required|url',
            'alias' => 'required|url',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
      //  $query = MicroChats::where( 'object_id' , 1 )->where('alias', 'client')->get();
        $data = MicroChats::all();
        return response()->json(['success' => $data], 200);

    }

    public function getObject($object_id, $alias)
    {
        // Выбор по 2 параметрам
        // return response()->json(['success' => $this->getChat($alias, $request->has('withParents'))], 200);
        return response()->json(['success' => MicroChats::where(['alias' => $alias])->where(['object_id' => $object_id])->get()], 200);
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
     * @param MicroChats $microChats
     * @return void
     */
    public function destroy(MicroChats $microChats)
    {
        MicroChats::where('id',$microChats->id)->delete();
    }
}
