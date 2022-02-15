<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserFormUpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
     * @param int $id
     * @return void
     */
    public function show(int $id)
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
     * @param UserFormUpdateRequest $request
     * @param int $id
     * @return RedirectResponse|null
     */
    public function update(UserFormUpdateRequest $request, int $id)
    {
        $this->userService->updateUser($request, $id);

        return redirect()->route('user.index')->with('success', 'User editing was successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|null
     */
    public function destroy(int $id)
    {
        $this->userService->destroy($id);

        return redirect()->route('user.index');
    }
}
