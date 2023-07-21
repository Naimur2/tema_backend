<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->first_name . ' ' . $user->last_name;
    
            return response()->json([
                'data'    => $success,
                'message' => 'User login successfully.',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
