<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        parent::__construct();
        $this->model = new ProductImage();
        $this->data = $this->model->paginate($this->perPage);
        $this->type = [
            'momo'
        ];
        $this->view = 'admin.screen.product.';
    }
    public function index()
    {
        //
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
        // upload avatar
        if($request->avatar){
            $name = uploadImage($request, 'avatar');
            if(!$name){
                return back()->withInput();
            }
        }
        $data = addWithParams('product_images',[
            'product_id' => $request->product_id,
            'link_image' => $name ?? "",
            'created_at' => now(),
        ]);
        if ($data) {
            return redirect()->route('product.show', $request->product_id);
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
        return view($this->view . 'editDetail')->with(['type' => $this->type, 'table' => 'product', 'product_id' => $id]);
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
        return view($this->view . 'editDetail')->with(['id' => $id, 'data' => $data, 'table' => 'product', 'type' => $this->type]);
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
        // upload avatar
        if($request->avatar){
            $name = uploadImage($request, 'avatar');
            if(!$name){
                return back()->withInput();
            }
        }
        $product = $this->model->find($id);
        $data = editByWhere('product_images', [
            'link_image' => $name ?? "",
        ], ['id' => $id]);
        if ($data) {
            return redirect()->route('product.show',  $product->product_id);
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
        $data1 = $data->delete();
        return redirect()->route('product.show',  $data->product_id);
    }
}
