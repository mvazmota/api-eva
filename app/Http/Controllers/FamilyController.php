<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;
use Validator;
use App\Http\Requests;

/**
 * @resource Family
 *
 * Controller for family related operations
 */

class FamilyController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['index','show']]);
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
        $family = Family::get();
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
        ],
        [
            'name' => 'O campo de nome é obrigatório',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();
            return $this->_result($errors, 1, 'NOK');
        }

        $family = Family::create([
            'name' => $data['name'],
        ]);

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
        $family = Family::whereId($id)->first();

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
        $family = Family::whereId($id)->first();
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
        $family = Family::whereId($id)->first();

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
        $users = Family::find($id)->users()->get();

        return $this->_result($users);
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
