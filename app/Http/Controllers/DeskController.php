<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desk;

class DeskController extends Controller
{

    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function index(Request $request, Desk $desks){
        $id_param = explode('_',$request->url());
        $desk_id = array_pop($id_param);
        $desk = $desks->all()->find($desk_id);
        if (!$desk){return redirect(route('welcome'));}
        $desk_name=$desk->name;
        $data = [
            'desk_name'=>$desk_name,
            'desk_id'=>$desk_id
        ];
        return view('desk')->with($data);
    }

    public function show(Request $request,Desk $desks){//отображает список тредов
        $desk_id = $request->input('desk_id');
        $desk = $desks->all()->find($desk_id);
        $threads = $desk -> threads;
        foreach ($threads as $thread){
            $com_counter[$thread->id]=count($thread->comments);
        }
        $desk_name=$desk->name;
        $result=[
            'threads'=>$threads,
            'com_counter'=>$com_counter
        ];
        return $this->sendResponse($result, "Получен список тредов доски $desk_name");
    }

}
