<?php

namespace App\Http\Controllers;

use App\Models\MicroChats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
class MicroChatController extends Controller
{
    public function someMethod()
    {
        $someModel = new MicroChats;

        $someModel->setConnection('pgsql2'); // non-static method
        $something = $someModel->find(1);

        return $something;
    }
    static function routes()
    {
        Route::group(array('prefix' => 'api'), function () {
            Route::get('/index', 'MicroChatController@index');
            Route::get('/show/{id}', 'MicroChatController@show');
        });
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
    //    return view('micro_chats');
        return MicroChats::all();
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
       //     return back()->withErrors($validator);
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
      //      return back()->withErrors($validator);
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
    private $microChats;

    public function __construct(MicroChats $microChats) {
        $this->microChats = $microChats;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        if (!Auth::check()) {
//            return response()->json([
//                'error' => "You are not authenticated"
//            ], 401);
//        }

//        if (Gate::denies('create-user')) {
//            return response()->json([
//                'error' => "You are no authorized to create users"
//            ], 403);
//        }
     //   $user = $this->microChats->create($request->get('user'));


        $chat = new MicroChats();
        $chat->id = $request->input('id');
        $chat->object_id = $request->input('object_id');
        $chat->message = $request->input('message');
        $chat->alias = $request->input('alias');
        $chat->by = $request->input('by');
        $chat->created_at = $request->input('created_at');
        $chat->updated_at = $request->input('updated_at');
        $result = $chat->save();
      if($result == 1)
      {
          return response()->json($result, 201);
      }




    }

    /**
     * Display the specified resource.
     *
     * @param MicroChats $microChats
     *
     * @param $id
     * @return MicroChats
     */
    public function show($id,MicroChats $microChats)
    {
        $microChats = MicroChats::find($id);
        return response()->json($microChats, 201);
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
     * @param  \Illuminate\Http\Request $request
     * @param MicroChats $microChats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MicroChats $microChats)
    {
        $microChats->update($request->all());

        return response()->json($microChats, 200);

    }
    public function delete($id)
    {

        MicroChats::find($id)->delete();
        return response()->json(['success' => 'ok'], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param MicroChats $microChats
     * @return void
     */
    public function destroy(MicroChats $microChats)
    {
       // MicroChats::where('id',$microChats->id)->delete();
    }


}
