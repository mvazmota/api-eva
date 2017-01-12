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
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:20',
        ],
            [
                'name' => 'O campo de nome é obrigatório',
            ]);
        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }

        // adds to database
        $family = Family::create([
            'name' => $data['name'],
        ]);

        return $family;
    }

    public function show($id)
    {
        $family = Family::whereId($id)->first();

        return $family;
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $family = Family::whereId($id)->first();
        $family->delete();

        return $this->_result('Familia removida com sucesso');
    }

    private function _result($data, $status = 0, $msg = 'OK')
    {
        return json_encode(array(
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ));
    }


    public function getusers($familyId)
    {
        $users = Family::find($familyId)->users()->get();

        return $users;
    }

    public function create()
    {
//
    }

    public function edit()
    {
//
    }
}
