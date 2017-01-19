<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;
use Auth;


/**
 * @resource Users
 *
 * Controller for user related operations
 */

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    /**
     * List all Users
     *
     * Lists all users in the database
     *
     * @return array
     */

    public function index()
    {
//        $users = User::get();

//        if ($users->isEmpty()){
//            return $this->_result('No users on the database', 404, "NOK");
//        } else {
//            return $this->_result($users);
//        }
        $user = Auth::user();
        return $user;
    }

    /**
     * User Insert
     *
     * Inserts a user in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'color' => 'required',
            'family_id' => 'required',
            'password' => 'required',
            'birthday' => 'required'
        ],
        [
            'name' => 'The name field is required',
            'email' => 'The email field is required',
            'color' => 'The color field is required',
            'family_id' => 'The family_id field is required',
            'password' => 'The password field is required',
            'birthday' => 'The birthday field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $users = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'color' => $data['color'],
            'password' => $data['password'],
            'family_id' => $data['family_id'],
            'birthday' => $data['birthday'],
        ]);

        return $this->_result($users);
    }

    /**
     * User Detail
     *
     * Gives the details of a user
     *
     * @param int $id Id of the user
     *
     * @return array
     */

    public function show($id)
    {
        $users = User::whereId($id)->first();

        if (empty($users)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }

    /**
     * User Update
     *
     * Update a family in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'color' => 'required',
            'family_id' => 'required',
            'password' => 'required',
            'birthday' => 'required'
        ],
        [
            'name' => 'The name field is required',
            'email' => 'The email field is required',
            'color' => 'The color field is required',
            'family_id' => 'The family_id field is required',
            'password' => 'The password field is required',
            'birthday' => 'The birthday field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        $users = User::whereId($id)->first();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->color = $data['color'];
        $users->family_id = $data['family_id'];
        $users->password = $data['password'];
        $users->birthday = $data['birthday'];
        $users->save();

        return $this->_result($users);
    }

    /**
     * Delete User
     *
     * Deletes a user in the database
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {
        $users = User::whereId($id)->first();

        if (empty($users)){
            return $this->_result('User doesn\'t exist', 404, 'NOK');
        }

        $users->delete();

        return $this->_result('User '.$id.' removed with sucess');
    }

    /**
     * @hideFromAPIDocumentation
     */

    private function _result($data, $status = 200, $msg = 'OK')
    {
        return json_encode(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }

    /**
     * @hideFromAPIDocumentation
     */

    public function create()
    {
//
    }

    /**
     * @hideFromAPIDocumentation
     */

    public function edit()
    {
//
    }

}
