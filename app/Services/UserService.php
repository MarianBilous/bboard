<?php

namespace App\Services;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @var RoleRepository
     */
    private RoleRepository $roleRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Creates users with added roles.
     *
     * @param UserFormRequest $request
     * @return mixed
     */
    public function createUser(UserFormRequest $request)
    {
        $data = $request->only(['email', 'password', 'first_name', 'last_name', 'role']);
        $data['password'] = Hash::make($data['password']);

        $user = $this->userRepository->create($data);

        $user->assignRole($data['role']);
        $user->save();

        return $user;
    }

    /**
     * Shows the form with user data.
     *
     * @param int $id
     * @return array|null
     */
    public function editUser(int $id): ?array
    {
        if ($id == 1) {
            return null;
        }

        $roles = $this->roleRepository->all()->pluck('name', 'name');
        $user = $this->userRepository->getById($id);

        if (!$user) {
            return null;
        }

        $userRole = $user->roles->pluck('name', 'name')->all();

        return compact('user', 'roles', 'userRole');
    }
}
