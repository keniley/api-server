<?php

namespace App\Http\Controllers\Web;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Repository\UserRepository;

class UserController extends Controller
{
    /**
     * Get all users from database
     * @TODO: add filtering and pagging
     *
     * @param  mixed   $userRepository
     *
     * @return view
     */
    public function list(UserRepository $repo)
    {
        // list of table
        $response["data"] = $repo->list();

        // send data to view
        return view('user',$response);
    }

    /**
     * Create new user
     *
     * @param  mixed   $request
     * @param  mixed   $userRepository
     *
     * @return redirect
     */
    public function create(Request $request, UserRepository $repo)
    {
        // validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'required|boolean'
        ]);

        // no valid data, redirect to list page with errors
        if ($validator->fails()) {
             return redirect()
                        ->route('usersList')
                        ->withErrors($validator)
                        ->withInput();   
        }

        // data is valid. Let's save it
        $repo->save($request->all());

        // redirect to to list page
        return redirect()->route('usersList');
    }

}
