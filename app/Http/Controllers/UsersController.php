<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lists;
use App\Families;
use App\Invitation;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Events;

/**
 * @resource Users
 *
 * Controller for user related operations
 */

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','authUser','store']]);
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

        if ($users->isEmpty()){
            return $this->_result('No users on the database', 404, "NOK");
        } else {
            return $this->_result($users);
        }
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'color' => 'required',
            'avatar' => 'required',
            'birthday' => 'required'
        ],
        [
            'name' => 'The name field is required',
            'email' => 'The email field is required',
            'color' => 'The color field is required',
            'avatar' => 'The avatar field is required',
            'password' => 'The password field is required',
            'birthday' => 'The birthday field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 400, 'NOK');
        }

        if (empty($data['code'])){

            $users = User::create([
                'name' => $data['name'],
                'color' => $data['color'],
                'avatar' => $data['avatar'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'birthday' => $data['birthday'],
            ]);

            return $this->_result($users);

        } else {

            // Check if code and email match an invitation
            $this->check($data['code'], $data['email']);

            if ($this==True){

                $family_id = DB::table('invitations')
                    ->select('family_id')
                    ->where('email', '=', $data['email'])
                    ->value('family_id');

                $users = User::create([
                    'name' => $data['name'],
                    'color' => $data['color'],
                    'avatar' => $data['avatar'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'birthday' => $data['birthday'],
                    'family_id' => $family_id
                ]);

                return $this->_result($users);
            }
        }
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

        if (empty($users)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }

    /**
     * User Update
     *
     * Update a user in the database
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
//            'birthday' => 'required'
//        ],
//        [
//            'name' => 'The name field is required',
//            'email' => 'The email field is required',
//            'color' => 'The color field is required',
//            'birthday' => 'The birthday field is required',
//        ]);
//
//        if($validator->fails())
//        {
//            $errors = $validator->errors()->all();
//
//            return $this->_result($errors, 400, 'NOK');
//        }

        $users = User::whereId($id)->first();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->color = $data['color'];
        $users->avatar = $data['avatar'];
        $users->family_id = $data['family_id'];
        $users->birthday = $data['birthday'];
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
            return $this->_result('User doesn\'t exist', 404, 'NOK');
        }

        $users->delete();

        return $this->_result('User '.$id.' removed with sucess');
    }

    /**
     * Authenticate User
     *
     * Authenticate a user in the database
     *
     * @return array
     */

    public function authUser()
    {
        $users = Auth::user();

        return $this->_result($users);
    }

    /**
     * Lists of a User
     *
     * Returns the lists of a user
     *
     * @param int $id Id of the list
     *
     * @return array
     */

    public function getLists($id)
    {
        $lists = User::find($id)->lists()->orderBy('id')->get();

        if ($lists->isEmpty()){
            return $this->_result('User doesn\'t have lists', 404, "NOK");
        } else {
            return $this->_result($lists);
        }
    }

    /**
     * Events of a User
     *
     * Returns the lists of a user
     *
     * @param int $id Id of the list
     *
     * @return array
     */

    public function getEvents($id)
    {
        $events = User::find($id)->events()->get();

        $result = array();

        foreach ($events as $event){

            $event_id = $event->id;

            $users = Events::find($event_id)->users()->orderBy('name')->get();

            $result[$event_id]['event'] = $event;
            $result[$event_id]['event']['users'] = $users;
        }

        return $this->_result($result);


//        if ($events->isEmpty()){
//            return $this->_result('User doesn\'t have events', 404, "NOK");
//        } else {
//            return $this->_result($events);
//        }
    }

    /**
     * Family of a User
     *
     * Returns the users that belong to the family of a user
     *
     * @param int $id Id of the list
     *
     * @return array
     */

    public function getFamily($id)
    {
        $family = Families::find($id)->users()->orderBy('id')->get();

        // Filter the user
        $filtered = $family->except(['id' => $id]);

        if ($filtered->isEmpty()){
            return $this->_result('User doesn\'t have family members', 404, "NOK");
        } else {
            return $this->_result($filtered);
        }
    }


    /**
     *  User Invitations
     *
     * Shows the invitations of a user
     *
     * @param int $id
     *
     * @return array
     */

    public function getInvitations($id)
    {
        $invitation = Invitation::whereId($id)->first();

        if (empty($invitation)){
            return $this->_result('User doesn\'t have invitations', 404, "NOK");
        } else {
            return $this->_result($invitation);
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
