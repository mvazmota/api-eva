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
        header('Access-Control-Allow-Headers: *');

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
                'name' => 'The title field is required',
                'icon' => 'The icon field is required',
                'users' => 'The users field is required',
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

        $listID = Lists::find($list['id']);
        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);
        // Attach new users of the list
        foreach ($array as $value) {
            $listID->users()->attach($value);
//            print_r("User ".$value." was added.");
        }
        return $this->_result($list);
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
     * List Update
     *
     * Update a list in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $list = Lists::whereId($id)->first();
        $list->name = $data['name'];
        $list->icon = $data['icon'];
        $list->save();

        $listID = Lists::find($list['id']);
        $listID->users()->detach();

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users of the list
        foreach ($array as $value) {
            $listID->users()->attach($value);
        }
        return $list;
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
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
        
        $list = Lists::whereId($id)->first();
        // Detach users of the list
        $listID = Lists::find($list['id']);
        $users = $list['users'];
        foreach ($users as $value) {
            $listID->users()->detach($value);
            print_r("User ".$value['id']." was removed.");
        }
        $list->delete();
        return $this->_result('Lista removida com sucesso');
    }


    public function getproducts($listId)
    {
        $products = Lists::find($listId)->products()->get();

        return $products;
    }

    /**
     * Users of a List
     *
     * Gives the users linked of a list
     *
     * @param int $id Id of the list
     *
     * @return array
     */

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
