<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request)
    {
        try {
            //code...
            $password = $request->password;

            $path = 'admin/img/undraw_profile.svg';

            $validatedData = $request->validated();

            if ($request->hasFile('image_path')) {
                $imageFile = $request->file('image_path');
                $path = 'images';
                $path = Storage::disk('public')->put($path, $imageFile);
            }

            $validatedData = array_merge($validatedData, ['image_path' => $path, 'password' => Hash::make($validatedData['password'])]);

            $user = User::create($validatedData);

            $user->token = $user->createToken('MyApp')->plainTextToken;

            $user->password = $password;

            return response()->json([
                'data' => $user,
                'message' => 'You Have successfully registered.'
            ], SymfonyResponse::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong.'
            ], SymfonyResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
