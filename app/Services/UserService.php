<?php

namespace App\Services;

use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserFormUpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Update user.
     *
     * @param UserFormUpdateRequest $request
     * @param int $id
     * @return mixed|null
     */
    public function updateUser(UserFormUpdateRequest $request, int $id)
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

        $user = $this->userRepository->update($data, $id);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($data['role']);

        return $user;
    }

    /**
     * Deleting user by id.
     *
     * @param int $id
     * @return mixed|null
     */
    public function destroy(int $id)
    {
        if ($id == 1) {
            return null;
        }

        return $this->userRepository->delete($id);
    }
}
