<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        parent::__construct();
        $this->model = new Product();
        $this->data = $this->model->paginate($this->perPage);
        $this->type = [
            'momo'
        ];
        $this->view = 'admin.screen.product.';
        $this->dataForeign = new ProductImage();
    }
    public function index()
    {
        // return $this->data[0]->productImage;
        return view($this->view.'home')->with(['data' => $this->data, 'table' => 'product']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'edit')->with(['dataForeign' => $this->dataForeign, 'type' => $this->type, 'table' => 'product']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $data = addWithParams('products', [
            'name' => $request->name,
            'price' => $request->price,
            'total' => $request->total,
            'total_sold' => $request->total_sold,
            'type' => $request->type,
            'provider' => $request->provider,
            'author' => $request->author,
            'description' => $request->description,
        ]);
        if ($data) {
            return redirect()->route('product.index');
        }
        return back()->withErrors(['msg' => 'Thêm thất bại']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ProductImage::where('product_id', $id)->paginate($this->perPage);
        return view($this->view . 'detail')->with(['id' => $id, 'data' => $data, 'dataForeign' => $this->dataForeign, 'table' => 'product', 'type' => $this->type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        return view($this->view . 'edit')->with(['id' => $id, 'data' => $data, 'dataForeign' => $this->dataForeign, 'table' => 'product', 'type' => $this->type]);
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
        $data = editByWhere('products', [
            'name' => $request->name,
            'price' => $request->price,
            'total' => $request->total,
            'total_sold' => $request->total_sold,
            'type' => $request->type,
            'provider' => $request->provider,
            'author' => $request->author,
            'description' => $request->description,
        ], ['id' => $id]);
        if ($data) {
            return redirect()->route('product.index');
        }
        return back()->withErrors(['msg' => 'Sửa thất bại']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model->find($id);
        $data = $data->delete();
        return redirect()->route('product.index');
    }
}
