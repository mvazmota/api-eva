<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Listeners\NewListNotification;
use App\Lists;
use App\Tools;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Validator;
use App\Events\Newlist;
use App\Notifications\ListCreated;
use App\User;
use Auth;


/**
 * @resource Lists
 *
 * Controller for shopping lists related operations
 */

class ListsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
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
            'created_by' => 'required',
        ],
        [
            'name' => 'The title field is required',
            'icon' => 'The icon field is required',
            'users' => 'The users field is required',
            'created_by' => 'The created_by field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $lists = Lists::create([
            'name' => $data['name'],
            'icon' => $data['icon'],
            'created_by' => $data['created_by'],
        ]);

        $listID = Lists::find($lists['id']);

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users of the list
        foreach ($array as $value) {
            $listID->users()->attach($value);

            // Notify users of list creation
            $user = User::whereId($value)->first();
            $user->notify(new ListCreated($lists));
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
            'created_by' => 'required',
        ],
        [
            'name' => 'The title field is required',
            'icon' => 'The icon field is required',
            'created_by' => 'The created_by field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $list = Lists::whereId($id)->first();
        $list->name = $data['name'];
        $list->icon = $data['icon'];
        $list->created_by = $data['created_by'];
        $list->save();

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

        // Delete products attached to the list
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

    public function getProducts($id)
    {
        $products = Lists::find($id)->products()->get();

        if ($products->isEmpty()){
            return $this->_result('List doesn\'t have products', 404, "NOK");
        } else {
            return $this->_result($products);
        }
    }

    /**
     * Users of a List
     *
     * Returns the users linked to a list
     *
     * @param int $id Id of the list
     *
     * @return array
     */

    public function getUsers($id)
    {
        $users = Lists::find($id)->users()->orderBy('id')->get();

        if ($users->isEmpty()){
            return $this->_result('List doesn\'t have users', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }

    /**
     * Add Users
     *
     * Inserts a user to a list in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function addUsers(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'users' => 'required',
        ],
        [
            'users' => 'The users field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $listID = Lists::find($id);

        // Check if list exists
        if (empty($listID)){
            return $this->_result('List doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];
        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already on the list
        $hasUser = $listID->users()->where('id', $userID)->exists();

        if($hasUser != 1){
            // Attach new user to the list
            $listID->users()->attach($userID);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly added');
        } else {
            return $this->_result('User is already in this list', 400, "NOK");
        }
    }

    /**
     * Remove Users
     *
     * Deletes a user from a list in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function removeUsers(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'users' => 'required',
        ],
            [
                'users' => 'The users field is required',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $lists = Lists::whereId($id)->first();

        // Check if list exists
        if (empty($lists)){
            return $this->_result('List doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];

        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already on the list
        $hasUser = $lists->users()->where('id', $userID)->exists();

        if($hasUser == 1){
            // Detach user of the list
            $lists->users()->detach($user);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly removed');
        } else {
            return $this->_result('User was not on the list', 400, "NOK");
        }
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
