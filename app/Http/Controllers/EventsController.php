<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Events;
use App\User;
use App\Tools;
use Illuminate\Http\Request;
use Validator;

/**
 * @resource Events
 *
 * Controller for event related operations
 */

class EventsController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index','show', 'getusers', 'getproducts']]);
    }

    /**
     * List all Events
     *
     * Lists all events in the database
     *
     * @return array
     */

    public function index()
    {
        $events = Events::get();

        if ($events->isEmpty()){
            return $this->_result('No events on the database', 404);
        } else {
            return $this->_result($events);
        }
    }

    /**
     * Event Insert
     *
     * Inserts an event in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|max:20',
            'date' => 'required',
            'location' => 'required',
            'users' => 'required',
            'created_by' => 'required'
        ],
        [
            'title' => 'The title field is required',
            'date' => 'The date field is required',
            'location' => 'The location field is required',
            'users' => 'The users field is required',
            'created_by' => 'The created_by field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $events = Events::create([
            'title' => $data['title'],
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'location' => $data['location'],
            'created_by' => $data['created_by'],
        ]);

        $eventID = Events::find($events['id']);

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users to the event
        foreach ($array as $value) {
            $eventID->users()->attach($value);
        }

        return $this->_result($events);
    }

    /**
     * Event Detail
     *
     * Gives the details of a event
     *
     * @param int $id Id of the event
     *
     * @return array
     */

    public function show($id)
    {
        $events = Events::whereId($id)->first();

        if (empty($events)){
            return $this->_result('Event doesn\'t exist', 404, "NOK");
        } else {
            return $this->_result($events);
        }
    }

    /**
     * Event Update
     *
     * Update an event in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|max:20',
            'date' => 'required',
            'location' => 'required',
        ],
            [
                'title' => 'The title field is required',
                'date' => 'The date field is required',
                'location' => 'The location field is required',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $events = Events::whereId($id)->first();
        $events->title = $data['title'];
        $events->date = $data['date'];
        $events->start_time = $data['start_time'];
        $events->end_time = $data['end_time'];
        $events->location = $data['location'];
        $events->save();

        return $this->_result($events);
    }

    /**
     * Delete Event
     *
     * Deletes an event in the database
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {
        $events = Events::whereId($id)->first();

        // Check if event exists
        if (empty($events)){
            return $this->_result('Event doesn\'t exist', 404, "NOK");
        }

        // Detach users of the event
        $eventID = Events::find($events['id']);
        $users = $events['users'];

        foreach ($users as $value) {
            $eventID->users()->detach($value);
        }

        $events->delete();

        return $this->_result('Event '.$id.' successfully removed');
    }

    /**
     * Users of a Event
     *
     * Returns the users linked to an event
     *
     * @param int $id Id of the event
     *
     * @return array
     */

    public function getUsers($id)
    {
        $users = Events::find($id)->users()->orderBy('name')->get();

        if ($users->isEmpty()){
            return $this->_result('Event doesn\'t have users', 404, "NOK");
        } else {
            return $this->_result($users);
        }
    }
    /**
     * Add User
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

        $events = Events::find($id);

        // Check if event exists
        if (empty($events)){
            return $this->_result('Event doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];
        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already on the event
        $hasUser = $events->users()->where('id', $userID)->exists();

        if($hasUser != 1){
            // Attach new user to the event
            $events->users()->attach($userID);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly added');
        } else {
            return $this->_result('User is already in this list', 400, "NOK");
        }
    }

    /**
     * Remove User
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

        $events = Events::whereId($id)->first();

        // Check if event exists
        if (empty($events)){
            return $this->_result('Event doesn\'t exist', 404, "NOK");
        }

        $userID = $data['users'];

        $user = User::find($userID);

        // Check if user exists
        if (empty($user)){
            return $this->_result('User doesn\'t exist', 404, "NOK");
        }

        // Verify if the user is already on the event
        $hasUser = $events->users()->where('id', $userID)->exists();

        if($hasUser == 1){
            // Detach user of the list
            $events->users()->detach($user);

            // Notify the user
            //$user = User::whereId($userID)->first();
            //$user->notify(new AddedToList($listID));

            return $this->_result('User successfuly removed');
        } else {
            return $this->_result('User was not on the event', 400, "NOK");
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
