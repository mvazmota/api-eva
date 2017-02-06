<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Families;
use Validator;
use App\User;
use App\Http\Requests;

/**
 * @resource Families
 *
 * Controller for family related operations
 */

class FamiliesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * List all Families
     *
     * Lists all families in the database
     *
     * @return array
     */

    public function index()
    {
        $family = Families::get();
        return $this->_result($family);
    }

    /**
     * Family Insert
     *
     * Inserts a family in the database
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
            'user' => 'required'
        ],
        [
            'name' => 'The name field is required',
            'user' => 'The user field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $family = Families::create([
            'name' => $data['name'],
        ]);

        // Insert user into the created family
        $users = User::whereId($data['user'])->first();
        $users->family_id = $family['id'];

        // Set user as owner of the family
        $family->owners()->attach($data['user']);

        return $this->_result($family);
    }

    /**
     * Family Detail
     *
     * Gives the details of a family
     *
     * @param int $id Id of the family
     *
     * @return array
     */

    public function show($id)
    {
        $family = Families::whereId($id)->first();

        if (empty($family)){
            return $this->_result('Family doesn\'t exist', 1, "NOK");
        } else {
            return $this->_result($family);
        }
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
        $family = Families::whereId($id)->first();
        $family->name = $data['name'];
        $family->save();

        return $this->_result($family);
    }

    /**
     * Delete Family
     *
     * Deletes a family in the database
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {
        $family = Families::whereId($id)->first();

        if (empty($family)){
            return $this->_result('Family doesn\'t exist');
        } else {
            $family->delete();

            return $this->_result('Family '.$id.' removed with sucess');
        }
    }

    /**
     * Get Family Users
     *
     * Lists the users of a Family
     *
     * @param int $id Id of the family
     *
     * @return array
     */

    public function getusers($id)
    {

        $family = Families::whereId($id)->first();

        if (empty($family)){

            return $this->_result('Family doesn\'t exist');

        } else {

            $users = Families::find($id)->users()->get();

            return $this->_result($users);
        }

    }

    /**
     * Owners of a Family
     *
     * Returns the users that own a family
     *
     * @param int $id Id of the family
     *
     * @return array
     */

    public function getOwners($id)
    {
        $owners = Families::find($id)->owners()->orderBy('name')->get();

        if ($owners->isEmpty()){
            return $this->_result('Family doesn\'t have owners', 404, "NOK");
        } else {
            return $this->_result($owners);
        }
    }

    /**
     * Add Owners
     *
     * Inserts a owner to a family in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function addOwners(Request $request, $id)
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

        $family = Families::find($id);

        // Check if family exists
        if (empty($family)){
            return $this->_result('Family doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];
        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already a owner
        $hasUser = $family->owners()->where('id', $userID)->exists();

        if($hasUser != 1){
            // Attach new owner to the family
            $family->owners()->attach($userID);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly added');
        } else {
            return $this->_result('User is already a family owner', 400, "NOK");
        }
    }

    /**
     * Remove Owner
     *
     * Deletes a owner from a family in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function removeOwners(Request $request, $id)
    {
        $data = $request->all();

        $family = Families::whereId($id)->first();

        // Check if family exists
        if (empty($family)){
            return $this->_result('Family doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];

        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already a owner
        $hasUser = $family->owners()->where('id', $userID)->exists();

        if($hasUser == 1){
            // Detach user of the list
            $family->owners()->detach($user);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly removed');
        } else {
            return $this->_result('User was not a family owner', 400, "NOK");
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
