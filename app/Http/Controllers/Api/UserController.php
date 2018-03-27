<?php

namespace App\Http\Controllers\Api;

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
     * @param  mixed   $request
     * @param  mixed   $userRepository
     *
     * @return json
     */
    public function list(Request $request, UserRepository $repo)
    {
        // list of table
        $data = $repo->list();
        if($data) {
            // data rereived from database
            $response['code'] = 200;
            $response['data'] = $data;

            return response()->json($response, 200);      
        }

        // no data found
        return response()->json(['msg' => 'No data found', 'code' => '402'], 204);
    }

    /**
     * Get detail of one user
     *
     * @param  mixed   $userRepository
     * @param  integer $user
     *
     * @return json
     */
    public function show(UserRepository $repo, $user)
    {
        // find user
        $response = $repo->find($user);
        if($response) {
            // user find
            $response['code'] = 200;

            return response()->json($response, 200);    
        }

        // user don't find!
        return response()->json(['msg' => 'User not found', 'code' => '401'], 404);
    }

    /**
     * Create new user
     *
     * @param  mixed   $request
     * @param  mixed   $userRepository
     *
     * @return json
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

        // no valid data
        if ($validator->fails()) {
            $response['code'] = 405;
            $response['msg'] = $validator->errors();

            return response()->json($response, 400);  
        }

        // data is valid. Let's save it
        $response = $repo->save($request->all());
        if($response) {
            // data saved
            $response['code'] = 200;
            $response['data'] = $response;

            return response()->json($response, 200);
        }

        // data don't be saved, error!
        return response()->json(['msg' => 'System error. No data saved', 'code' => '500'], 500);   
    }


}
