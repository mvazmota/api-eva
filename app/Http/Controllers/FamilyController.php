<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;
use Validator;
use App\Http\Requests;

class FamilyController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {

        $families = Family::get();

        return $families;
    }

    public function store(Request $request)
    {
//        $data = $request->all();
//
//        print_r($data);
//
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
        $families = Family::whereId($id)->first();

        return $families;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function getusers($familyId)
    {
        $users = Family::find($familyId)->users()->get();

        return $users;
    }
}
