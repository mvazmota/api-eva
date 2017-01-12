<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Validator;


class UsersController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $users = User::get();

        return $users;
    }


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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'color' => $data['color'],
            'password' => $data['password'],
            'family_id' => $data['family_id'],
        ]);

        return $user;
    }


    public function show($id)
    {
        $users = User::whereId($id)->first();

        return $users;
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
