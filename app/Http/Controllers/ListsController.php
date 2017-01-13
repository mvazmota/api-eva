<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lists;
use App\User;
use App\Tools;
use Illuminate\Http\Request;
use Validator;

/**
 * @resource Lists
 *
 * Controller for shopping lists related operations
 */

class ListsController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show', 'getusers', 'getproducts']]);
    }

    /**
     * List all Lists
     *
     * Lists all lists in the database
     *
     * @return array
     */

    public function index()
    {
        $lists = Lists::get();
        return $lists;
    }

    /**
     * List Insert
     *
     * Inserts a list in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:20',
            'icon' => 'required',
            'users' => 'required',
        ],
            [
                'name' => 'O campo de título é obrigatório',
                'icon' => 'O campo de imagem é obrigatório',
                'users' => 'O campo de users é obrigatório',

            ]);
        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 1, 'NOK');
        }

        $list = Lists::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
        ]);

//        $data = $request->all();
//        $users = Lists::find($data['list_id']);
//        $users->users()->attach($data['user_id']);

        $listID = Lists::find($list['id']);
        $users = $data['users'];
        foreach ($users as $value) {
            $listID->users()->attach($value);
        }
        return $this->_result('Lista inserida com sucesso');
    }

    /**
     * List Detail
     *
     * Gives the details of a list
     *
     * @param int $id Id of the list
     *
     * @return array
     */

    public function show($id)
    {
        $lists = Lists::whereId($id)->first();

        return $lists;
    }

    /**
     * Family Update
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
        $family = Family::whereId($id)->first();
        $family->name = $data['name'];
        $family->save();
        return $family;
    }

    /**
     * Delete List
     *
     * Deletes a list in the database
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {
        $list = Lists::whereId($id)->first();
        $list->delete();
        return $this->_result('Lista removida com sucesso');
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

    public function create()
    {
        //
    }

    public function edit()
    {
        //
    }
}
