<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lists;
use App\User;
use App\Tools;
use Illuminate\Http\Request;
use Validator;


class ListsApiController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show', 'getusers', 'getproducts']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lists = Lists::get();

        return $lists;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lists = Lists::whereId($id)->first();

        return $lists;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function addusers($id)
    {

        $validator = Validator::make($data, [
            'list_id' => 'required',
            'user_id' => 'required'
        ],
            [
                'list_id' => 'O id da lista é obrigatório',
                'user_id' => 'O id do utilizador é obrigatório',
            ]);
        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }


        $newusers = News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $path,
        ]);
    }


}
