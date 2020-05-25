<?php
/**
 * Created by PhpStorm.
 * User: DIego
 * Date: 5/25/2020
 * Time: 5:40 PM
 */

namespace App\Repositories;


use App\Contracts\IAUthRepository;
use App\User;

class AuthRepository implements IAUthRepository
{

    protected $model;

    /**
     * AuthRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function register(array $params)
    {
        // TODO: Implement register() method.
    }

    public function Login(array $params)
    {
        // TODO: Implement Login() method.
    }

    public function Logout()
    {
        // TODO: Implement Logout() method.
    }
}