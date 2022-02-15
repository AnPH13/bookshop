<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $invoice;
    function __construct()
    {
        parent::__construct();
        $this->model = new Invoice();
        $this->data = $this->model->paginate($this->perPage);
        $this->type = [
            'momo'
        ];
        $this->view = 'admin.screen.invoice.';
        $user = new User();
        $this->dataForeign = $user->all();
    }
    public function index()
    {
        return view($this->view . 'home')->with(['data' => $this->data, 'table' => 'invoice']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $this->dataForeign['user'];
        return view($this->view . 'edit')->with(['dataForeign' => $this->dataForeign, 'type' => $this->type, 'table' => 'invoice']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = addWithParams('invoices', [
            'user_id' => $request->user_id,
            'payment_methods' => $request->payment_methods,
            'status' => $request->status,
        ]);
        if ($data) {
            return redirect()->route('invoice.index');
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
        $data = InvoiceDetail::where('invoice_id', $id)->paginate($this->perPage);
        return view($this->view . 'detail')->with(['id' => $id, 'data' => $data, 'dataForeign' => $this->dataForeign, 'table' => 'invoice', 'type' => $this->type]);
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
        return view($this->view . 'edit')->with(['id' => $id, 'data' => $data, 'dataForeign' => $this->dataForeign, 'table' => 'invoice', 'type' => $this->type]);
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
        $data = editByWhere('invoices', [
            'user_id' => $request->email,
            'payment_methods' => $request->payment_methods,
            'status' => $request->status,
        ], ['id' => $id]);
        if ($data) {
            return redirect()->route('invoice.index');
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
        return redirect()->route('invoice.index');
    }
}
