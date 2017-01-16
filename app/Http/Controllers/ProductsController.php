<?php


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Products;
use App\Tools;
use Illuminate\Http\Request;
use Validator;

/**
 * @resource Produtos
 *
 * Método geral para controla produtos
 */

class ProductsController extends Controller
{

    public function __construct()
    {
//        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show']]);
    }


    /**
     * List All Products
     *
     * Lists all products in the database
     *
     * @return array
     */

    public function index()
    {
        $products = Products::get();

        if (empty($products)){
            return $this->_result('Product doesn\'t exist');
        } else {
            return $this->_result($products);
        }
    }

    /**
     * Products Detail
     *
     * Shows the details of a product
     *
     * @param int $id Id of a product in the database
     *
     * @return array
     */

    public function show($id)
    {
        $products = Products::whereId($id)->first();

        return $this->_result($products);
    }

     /**
     * Product Insert
     *
     * Inserts a product in the database
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
                'description' => 'max:100',
                'quant' => 'required',
                'image' => 'image',
                'list_id' => 'required',
            ],
            [
                'title' => 'O campo de título é obrigatório',
                'description' => 'O campo de descrição é obrigatório',
                'image' => 'O campo de imagem é obrigatório',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }

        if ( !empty($data['image']))
        {
            // generate filename from random string
            $path = $request->file('image')->hashName();
            // upload process
            $request->file('image')->move(public_path('images'), $path);
            // adds to database
            $products = Products::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'quant' => $data['quant'],
                'list_id' => $data['list_id'],
                'image' => $path,
            ]);

            return $this->_result($products);

        } else {
            // adds to database
            $products = Products::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'quant' => $data['quant'],
                'list_id' => $data['list_id'],
            ]);

            return $this->_result($products);
        }

    }

//    public function upload(Request $request)
//    {
//        $data = $request->all();
//
//        $validator = Validator::make($data, [
//            'image' => 'required|image'
//        ],
//            [
//                'image.required' => 'O campo de imagem é obrigatório',
//                'image.image' => 'O campo de imagem é tem de ser do tipo imagem',
//            ]);
//
//        if($validator->fails())
//        {
//            $errors = $validator->errors()->all();
//
//            return $this->_result($errors, 1, 'NOK');
//        }
//
//        $path = $request->file('image')->hashName();
//        $request->file('image')->move(public_path('images'), $path);
//
//        return $this->_result($data);
//    }

    /**
     * Product Delete
     *
     * Deletes a product in the database
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {
//        header("Access-Control-Allow-Credentials: true");
//        header('Access-Control-Max-Age: 1000');
//        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


        $product = Products::whereId($id)->first();

        if (empty($product)){
            return $this->_result('Product doesn\'t exist');

        } else {
            $product->delete();

            return $this->_result('Product '.$id.' sucessfuly removed');
        }
    }

    /**
     * Product Update
     *
     * Updates a product in the database
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $products = Products::whereId($id)->first();
        $products->title = $data['title'];
        $products->description = $data['description'];
        $products->quant = $data['quant'];
        $products->list_id = $data['list_id'];
        $products->save();

        return $products;
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
