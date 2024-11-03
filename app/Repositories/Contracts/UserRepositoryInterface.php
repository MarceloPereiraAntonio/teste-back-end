<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getUser(string $id): array;
    public function update(string $id, $request): array|bool;
}