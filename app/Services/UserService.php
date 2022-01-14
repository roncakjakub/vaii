<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param User $vehicle
     * @param array $data
     */
    public static function create(array $data)
    {
        return actionWrapper(function () use ($data) {
            $u = User::create($data);
            $u->assignRole($data['role']);
            return $u;
        });
    }

    /**
     * @param User $vehicle
     * @param array $data
     */
    public static function update(User $user, array $data)
    {
        actionWrapper(function () use ($user, $data) {
            $user->update($data);
        });
    }

    /**
     * @param User $vehicle
     * @param array $data
     */
    public static function delete(User $user)
    {
        actionWrapper(function () use ($user) {
            $user->delete();
        });
    }
}
