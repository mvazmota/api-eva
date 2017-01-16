<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;

/**
 * @resource Users
 *
 * Controller for user related operations
 */

class UsersController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index','show']]);
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
        $users = User::get();

        return $this->_result($users);
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
            'password' => 'required'
        ],
            [
                'name' => 'O campo de título é obrigatório',
                'email' => 'O campo de descrição é obrigatório',
                'color' => 'O campo de imagem é obrigatório',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }

        // adds to database
        $users = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'color' => $data['color'],
            'password' => $data['password'],
            'family_id' => $data['family_id'],
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

//        print_r($users);

        if (empty($users)){
            return $this->_result('User doesn\'t exist', 1, "NOK");
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
//        $validator = Validator::make($data, [
//            'name' => 'required',
//            'email' => 'required',
//            'color' => 'required',
//            'family_id' => 'required',
//            'password' => 'required'
//        ],
//            [
//                'name' => 'O campo de título é obrigatório',
//                'email' => 'O campo de descrição é obrigatório',
//                'color' => 'O campo de imagem é obrigatório',
//            ]);
//
//        if($validator->fails())
//        {
//            $errors = $validator->errors()->all();
//
//            return $this->_result($errors, 1, 'NOK');
//        }

        $users = User::whereId($id)->first();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->color = $data['color'];
        $users->family_id = $data['family_id'];
        $users->password = $data['password'];
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
            return $this->_result('User doesn\'t exist');

        } else {
            $users->delete();

            return $this->_result('User '.$id.' removed with sucess');
        }
    }

    /**
     * @hideFromAPIDocumentation
     */

    private function _result($data, $status = 0, $msg = 'OK')
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
