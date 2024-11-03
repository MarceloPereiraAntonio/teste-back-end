<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {}
    public function index()
    {
        return view('pages.user.edit')->with('user', $this->userService->getUser(auth()->user()->id));
    }

    public function update(StoreUpdateUserRequest $request)
    {
        $this->userService->update(auth()->user()->id, $request->all());
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso');
    }
}
