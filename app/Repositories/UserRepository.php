<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(protected User $model)
    {}

    public function getUser($id): array
    {
        return $this->model->find($id)->toArray();
    }
    public function update(string $id, $request): array|bool
    {
        $user = $this->model->find($id);
        if (!$user) {
            return false;
        }

        $user->fill([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }        
        $user->save();
        return $user->toArray();
    }
}