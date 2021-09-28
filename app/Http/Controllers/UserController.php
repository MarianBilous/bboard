<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.pages.user.settings', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'name');

        return view('admin.pages.user.settings_page.user_create_modal', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $user = new User();

        $data = $request->only(['email', 'password', 'first_name', 'last_name', 'role']);
        $user->fill($data);
        $user->assignRole($data['role']);
        $user->save();

        return redirect()->route('user.index');
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
        if ($id == 1) {
            return null;
        }

        $roles = Role::all()->pluck('name', 'name');
        $user = User::find($id);
        $userRole = $user->roles->pluck('name','name')->all();

        if (!$user) {
            return null;
        }

        return view('admin.pages.user.settings_page.user_edit_modal', compact('user', 'roles', 'userRole'));
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
        if ($id == 1) {
            return null;
        }

        $data = $request->all();

        if (!empty($data['password']) && ($data['password'] === $data['password_confirmation'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, ['password', 'password_confirmation']);
        }

        $user = User::find($id);
        $user->update($data);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($data['role']);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return null;
        }

        User::find($id)->delete();

        return redirect()->route('user.index');
    }
}
