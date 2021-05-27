<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
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
        return response()->json($response, $code);
    }

    public function register(Request $request, User $uzvers){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password
        ]);    //User::create($input);

        $user = $uzvers->all()->where('email',$email)->first();
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['email'] =  $email;
        $success['user'] =  $user;

        return $this->sendResponse($success, 'Вы успешно зарегистрированы');
    }

    public function BackToLogin (){
        return redirect(route('login'));
    }
}
