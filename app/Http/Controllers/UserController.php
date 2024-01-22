<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get(['id', 'name']);
        return view('users.create', [
            'user' => new User,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $this->authorize('create', User::class);
            $validated = $request->validated();
            $user = User::create($validated);
            $user->roles()->sync($validated['role']);
            event(new Registered($user));
        } catch (\Throwable $th) {
            return redirect()
                ->route('users.create',)
                ->with('status', $th->getMessage())
                ->withInput($request->only(['name', 'email']));
        }
        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get(['id', 'name']);
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $this->authorize('update', $user);
            $validated = $request->validated();
            if (!$request->filled('password')) {
                unset($validated['password']);
            }
            $user = tap($user)->update($validated);
            $user->roles()->sync($validated['role']);
        } catch (\Throwable $th) {
            return redirect()->route('users.edit', [
                'user' => $user
            ])->with('status', $th->getMessage());
        }
        return view('users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
