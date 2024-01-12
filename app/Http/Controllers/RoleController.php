<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create', [
            'role' => new Role()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create', Role::class);
        $role = $request->validated();
        try {
            $role = Role::create($role);
        } catch (\Throwable $th) {
            return redirect()->route('roles.create', [
                'role' => $role
            ])->with('status', $th->getMessage());
        }
        return redirect()->route('roles.show', [
            'role' => $role->id
        ])->with('status', __('Saved.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', [
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);
        $validated = $request->validated();

        try {
            $role = tap($role)->update($validated);
        } catch (\Throwable $th) {
            return redirect()->route('roles.create', [
                'role' => $role
            ])->with('status', $th->getMessage());
        }
        return view('roles.show', [
            'role' => $role,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        return abort(403, 'Unauthorized action.');
    }
}
