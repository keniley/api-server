<?php

namespace App\Model\Repository;

use App\Model\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Gete all data from database
     *
     * @return mixed
     */
    public function list()
    {
        return User::all();
    }

    /**
     * Gete all data from database
     *
     * @param  array   $data
     *
     * @return mixed
     */
    public function save($data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->is_admin = $data['is_admin'];
        $user->password =  Hash::make($data['pwd']);
        $user->save();

        return $user;       
    }

    /**
     * Gete one of users
     *
     * @param  integer   $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return User::find($id);
    }
}