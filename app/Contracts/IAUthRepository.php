<?php
/**
 * Created by PhpStorm.
 * User: DIego
 * Date: 5/25/2020
 * Time: 4:58 PM
 */

namespace App\Contracts;


interface IAUthRepository
{
    public function register(array $params);

    public function Login(array $params);

    public function Logout();
}