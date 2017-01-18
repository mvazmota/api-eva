<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lists;
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

        if ($lists->isEmpty()){
            return $this->_result('No lists on the database', 404);
        } else {
            return $this->_result($lists);
        }
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
            return $this->_result($errors, 400, 'NOK');
        }

        $lists = Lists::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
        ]);

        $listID = Lists::find($lists['id']);

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users of the list
        foreach ($array as $value) {
            $listID->users()->attach($value);
        }

        return $this->_result($lists);
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

        if (empty($lists)){
            return $this->_result('List doesn\'t exist', 404, "NOK");
        } else {
            return $this->_result($lists);
        }
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
            return $this->_result($errors, 400, 'NOK');
        }

        $list = Lists::whereId($id)->first();
        $list->name = $data['name'];
        $list->icon = $data['icon'];
        $list->save();

        // Detach old users of the list
        $listID = Lists::find($list['id']);
        $listID->users()->detach();

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users of the list
        foreach ($array as $value) {
            $listID->users()->attach($value);
        }

        return $this->_result($list);
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
        $lists = Lists::whereId($id)->first();

        // Check if list exists
        if (empty($lists)){
            return $this->_result('List doesn\'t exist', 404, "NOK");
        }

        // Detach users of the list
        $listID = Lists::find($lists['id']);
        $users = $lists['users'];

        foreach ($users as $value) {
            $listID->users()->detach($value);
        }

        $listID->products()->delete();

        $lists->delete();

        return $this->_result('List '.$id.' successfully removed');
    }

    /**
     * Get List Products
     *
     * Shows the users of a list
     *
     * @param int $id
     *
     * @return array
     */

    public function getproducts($listId)
    {
        $products = Lists::find($listId)->products()->get();

        if ($products->isEmpty()){
            return $this->_result('List doesn\'t have products', 404, "NOK");
        } else {
            return $this->_result($products);
        }
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

        if ($users->isEmpty()){
            return $this->_result('List doesn\'t have users', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }

//    public function addusers(Request $request)
//    {
//        $data = $request->all();
//        $users = Lists::find($data['list_id']);
//        $users->users()->attach($data['user_id']);
//    }

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
