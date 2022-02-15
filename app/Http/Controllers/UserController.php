<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var RoleRepository
     */
    protected RoleRepository $roleRepository;

    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     * @param UserService $userService
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = $this->userRepository->all();

        return view('admin.pages.user.settings', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = $this->roleRepository->all()->pluck('name', 'name');

        return view('admin.pages.user.settings_page.user_create_modal', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserFormRequest  $request
     * @return RedirectResponse
     */
    public function store(UserFormRequest $request)
    {
        $this->userService->createUser($request);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('admin.pages.user.settings_page.user_edit_modal', $this->userService->editUser($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|null
     */
    public function update(Request $request, int $id)
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

        return redirect()->route('user.index')->with('success', 'User editing was successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|null
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
