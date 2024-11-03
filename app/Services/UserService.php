<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $repository)
    {}

    public function getUser($id): array
    {
        return $this->repository->getUser($id);
    }

    public function update(string $id, $request): array|bool
    {
        return $this->repository->update($id, $request);
    }
}