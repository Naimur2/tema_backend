<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::query()
            ->where('userType', '=', 1)
            ->get();

        return view('users.index')->with(['appUsers' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create', ['teams' => Team::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTeamRequest $request
     * @return Response
     */
    public function store(StoreUserRequest $request)
    {
        $path = 'images/undraw_profile.svg';


        $validatedData = $request->validated();

        if ($request->hasFile('image_path')) {
            $imageFile = $request->file('image_path');
            $path = 'images';
            $path = Storage::disk('public')->putFile($path, $imageFile);
        }

        $validatedData = array_merge($validatedData, ['image_path' => $path, 'password' => Hash::make($validatedData['password'])]);

        $user = User::create($validatedData);

        $user->createToken('MyApp');

        return redirect(route('users.index'))->with('success', 'User created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function edit(User $user)
    {
        $teams = Team::all();

        return view('users.edit')->with(['user' => $user, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $imageFile = $request->file('image_path');
        $path = 'images';

        $validatedData = $request->validated();

        if ($request->hasFile('image_path')) {

            if(Storage::disk('public')->exists($user->image_path)) {
                Storage::disk('public')->delete($user->image_path);
            }
            $path = Storage::disk('public')->putFile($path, $imageFile);

            $validatedData = array_merge($validatedData, ['image_path' => $path]);
        }

        if (isset($validatedData['password'])) {
            $validatedData = array_merge($validatedData, ['password' => Hash::make($validatedData['password'])]);
        }

        $user->update($validatedData);

        return redirect(route('users.index'))->with('success', 'User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return Response
     */
    public function destroy(User $user)
    {
        if(Storage::disk('public')->exists($user->image_path)) {
            Storage::disk('public')->delete($user->image_path);
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
