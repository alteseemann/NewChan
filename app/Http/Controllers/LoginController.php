<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
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

    public function login(Request $request, User $uzvers){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Проверьте правильность введенных данных',$validator->errors());
        }

        $email = $request->input('email');
        $password = $request->input('password');
        $user = $uzvers::all()->where('email',$email)->first();

        if (!Hash::check($password,$user->password)){//введенный пароль перед проверкой не хэшировать
            return $this->sendError('Пароли не совпадают', 'Неверный пароль');
        }
        
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;

        return $this->sendResponse($success, 'Вы успешно авторизованы');
    }
}
