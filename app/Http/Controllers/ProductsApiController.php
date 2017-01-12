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

class ProductsApiController extends Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
//        $this->middleware('auth:api', ['except' => ['index','show']]);
    }


    /**
     * List All Products
     *
     * Listagem de todas os produtos existentes em base de dados
     *
     * @return array
     */

    public function index()
    {

        $products = Products::get();

        return $products;
    }



    /**
     * News Detail
     *
     * Detalhe de uma notícia
     *
     * @param int $id Id da notícia em base de dados
     *
     * @return array
     */
    public function show($id)
    {
        $products = Products::whereId($id)->first();

        return $products;
    }

     /**
      * News Insert
     *
     * Inserir uma nova notícia em base de dados
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */
    public function store(Request $request)
    {
        header('Access-Control-Allow-Origin: *');

        $data = $request->all();

        $validator = Validator::make($data, [
                'title' => 'required|max:20',
                'description' => 'required|max:100',
                'quant' => 'required',
                'image' => 'required',
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

        // generate filename from random string
        $path = $request->file('image')->hashName();
        // upload process
        $request->file('image')->move(public_path('images'), $path);

        // adds to database
        $product = Products::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'quant' => $data['quant'],
            'list_id' => $data['list_id'],
            'image' => $path,
        ]);

        return $product;
    }

    public function upload(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'image' => 'required|image'
        ],
            [
                'image.required' => 'O campo de imagem é obrigatório',
                'image.image' => 'O campo de imagem é tem de ser do tipo imagem',
            ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->all();

            return $this->_result($errors, 1, 'NOK');
        }

        $path = $request->file('image')->hashName();
        $request->file('image')->move(public_path('images'), $path);

        return $data;
    }

    /**
     * News Delete
     *
     * Apagar uma notícia da base de dados
     *
     * @param int $id Post data
     *
     * @return array
     */

    public function destroy($id)
    {

        $product = Products::whereId($id)->first();
        $product->delete();

        return $this->_result('Produto removida com sucesso');

    }

    /**
     * News Update
     *
     * Atualizar uma notícia em base de dados
     *
     * @param \Illuminate\Http\Request $request Post data
     *
     * @return array
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $products = Products::whereId($id)->first();

//        print_r($products);
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

    public function create()
    {
//
    }

    public function edit()
    {
//
    }
}
