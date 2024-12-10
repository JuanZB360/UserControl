<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use App\Services\ErrorServices;
use App\Http\Request\UserRequest;
use App\Models\User;
use App\Models\Contry;

class UserController extends Controller
{
    private $userService;
    private $errorService;

    public function __construct(
        UserServices $userService,
        ErrorServices $errorService
    )
    {
        $this->userService = $userService;
        $this->errorService = $errorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->error->handleError($this->UserService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->error->handleError($this->UserService->create());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->error->handleError(function () use ($request) {return $this->UserService->store();});
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->error->handleError(function () use ($id) {return $this->UserService->show();});
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->error->handleError(function () use ($id) {return $this->UserService->edit();});
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->error->handleError(function () use ($request, $id){return $this->userService->update();});
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->error->handleError(function () use ($id) {return $this->userService->destroy();});
    }
}
