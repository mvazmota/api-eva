<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lists;
use App\User;
use App\Tools;
use Illuminate\Http\Request;
use Validator;


class ListsApiController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show', 'getusers', 'getproducts']]);
    }

    public function index()
    {

        $lists = Lists::get();

        return $lists;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->all();

        print_r($data['users']);

//        $validator = Validator::make($data, [
//            'name' => 'required|max:20',
//            'icon' => 'required',
//
//        ],
//            [
//                'name' => 'O campo de título é obrigatório',
//                'icon' => 'O campo de imagem é obrigatório',
//            ]);
//        if($validator->fails())
//        {
//            $errors = $validator->errors()->all();
//
//            return $this->_result($errors, 1, 'NOK');
//        }
//
//        // adds to database
//        $list = Lists::create([
//            'name' => $data['name'],
//            'icon' => $data['icon'],
//        ]);
//
//        return $list;
    }


    public function show($id)
    {
        $lists = Lists::whereId($id)->first();

        return $lists;
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $list = Lists::whereId($id)->first();
        $list->delete();

        return $this->_result('Lista removida com sucesso');
    }

    private function _result($data, $status = 0, $msg = 'OK')
    {
        return json_encode(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }

    public function getproducts($listId)
    {
        $products = Lists::find($listId)->products()->get();

        return $products;
    }

    //Methods related to users of a list
    public function getusers($id)
    {
        $users = Lists::find($id)->users()->orderBy('name')->get();

        return $users;
    }

    public function addusers(Request $request)
    {
        $data = $request->all();
        $users = Lists::find($data['list_id']);
        $users->users()->attach($data['user_id']);
    }


    public function edit()
    {
//
    }
}
