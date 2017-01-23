<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Events;
use App\Tools;
use Illuminate\Http\Request;
use Validator;

/**
 * @resource Lists
 *
 * Controller for shopping lists related operations
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
            'time' => 'required',
            'location' => 'required',
            'users' => 'required',
        ],
        [
            'title' => 'The title field is required',
            'date' => 'The date field is required',
            'time' => 'The time field is required',
            'location' => 'The location field is required',
            'users' => 'The users field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $events = Events::create([
            'title' => $data['title'],
            'date' => $data['date'],
            'time' => $data['time'],
            'location' => $data['location'],
            'description' => $data['description'],
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
     * @param int $id Id of the list
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
            'time' => 'required',
            'location' => 'required',
            'users' => 'required',
        ],
        [
            'title' => 'The title field is required',
            'date' => 'The date field is required',
            'time' => 'The time field is required',
            'location' => 'The location field is required',
            'users' => 'The users field is required',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 400, 'NOK');
        }

        $events = Events::whereId($id)->first();
        $events->title = $data['title'];
        $events->date = $data['date'];
        $events->time = $data['time'];
        $events->location = $data['location'];
        $events->description = $data['description'];
        $events->save();

        // Detach old users of the list
        $eventID = Events::find($events['id']);
        $eventID->users()->detach();

        // Split users into an array
        $users = $data['users'];
        $array = explode(',', $users);

        // Attach new users of the list
        foreach ($array as $value) {
            $eventID->users()->attach($value);
        }

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

        // Check if list exists
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
     * @param int $id Id of the list
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
