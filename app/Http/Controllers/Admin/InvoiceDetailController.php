<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceDetailController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        parent::__construct();
        $this->model = new InvoiceDetail();
        $this->data = $this->model->paginate($this->perPage);
        $this->type = [
            'momo'
        ];
        $this->view = 'admin.screen.invoice.';
        $product = new Product();
        $this->dataForeign = $product->all();
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $this->dataForeign;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = addWithParams('invoice_details', [
                'product_id' => $request->product_id,
                'product_total' => $request->product_total,
                'status' => $request->status == "on" ? 1 : 0,
                'invoice_id' => $request->invoice_id,
            ]);
            if ($data) {
                return redirect()->route('invoice.show', $request->invoice_id);
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
        return view($this->view . 'editDetail')->with(['dataForeign' => $this->dataForeign, 'type' => $this->type, 'table' => 'invoice', 'invoice_id' => $id]);
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
        return view($this->view . 'editDetail')->with(['id' => $id, 'data' => $data, 'dataForeign' => $this->dataForeign, 'table' => 'invoice', 'type' => $this->type]);
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
        $invoice = $this->model->find($id);
        $data = editByWhere('invoice_details', [
            'product_id' => $request->product_id,
            'product_total' => $request->product_total,
            'status' => $request->status == "on" ? 1 : 0,
        ], ['id' => $id]);
        if ($data) {
            return redirect()->route('invoice.show',  $invoice->invoice_id);
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
        return redirect()->route('invoice.show',  $data->invoice_id);
    }
}
