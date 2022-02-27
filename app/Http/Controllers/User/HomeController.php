<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    protected $type;
    protected $data;
    function __construct()
    {
        $this->model = [
            'invoice' => new Invoice(),
            'product' => new Product(),
            'invoice_detail' => new InvoiceDetail(),
            'cart' => new Cart(),
        ];
        $this->data = [
            'invoice' => $this->model['invoice']->all(),
            'product' => $this->model['product']->paginate(16),
        ];
        $this->type = config('table.invoice_type');
    }
    public function getProductData($status)
    {
        $user = Auth::user();
        $invoice = $this->model['invoice']->where([
            ['status', '=', $status],
            ['user_id', '=', $user->id]
        ])->get();
        $invoice_detail = [];
        $i = 0;
        foreach ($invoice as $id) {
            $invoice_detail = $id->invoiceDetail;
        }
        return $invoice_detail;
    }
    public function love_index()
    {
        $user_id = Auth::id();
        $list_love = $this->model['cart']->where([
            ['user_id', '=', $user_id],
            ['status', '=', '1']
        ])->paginate(10);
        return view('user.love')->with([
            'slide_show' => $this->model['product']->orderby('created_at')->paginate(6),
            'type' => $this->type,
            'active' => 'trang',
            'data' => $this->model['product']->orderby('created_at')->paginate(12),
            'list_love' => $list_love,
        ]);
    }
    public function love_delete($id)
    {
        $data = $this->model['cart']->find($id);
        $data->delete();
        return redirect()->route('love.index');
    }
    public function cart_delete($id)
    {
        $data = $this->model['cart']->find($id);
        $data->delete();
        return redirect()->route('cart.index');
    }
    public function index(Request $request)
    {
        return view('user.index')->with([
            'data' => $this->data,
            'type' => $this->type,
            'active' => explode('.', $request->route()->getName())[0]
        ]);
    }
    public function list_index(Request $request)
    {
        return view('user.product')->with([
            'slide_show' => $this->model['product']->orderby('created_at')->paginate(6),
            'type' => $this->type,
            'active' => explode('.', $request->route()->getName())[0],
            'data' => $this->model['product']->orderby('created_at')->paginate(12)
        ]);
    }

    public function cart_index(Request $request)
    {
        $user_id = Auth::id();
        $list_cart = $this->model['cart']->where([
            ['user_id', '=', $user_id],
            ['status', '=', '0']
        ])->paginate(10);
        return view('user.cart')->with([
            'slide_show' => $this->model['product']->orderby('created_at')->paginate(6),
            'type' => $this->type,
            'active' => explode('.', $request->route()->getName())[0],
            'data' => $this->model['product']->orderby('created_at')->paginate(12),
            'list_cart' => $list_cart,
        ]);
    }
    public function love_add(Request $request, $id)
    {
        $product_id = $id;
        $user_id = Auth::id();
        $exists = $this->model['cart']->where([
            ['user_id', '=', $user_id],
            ['status', '=', 1],
            ['product_id', '=', $product_id]
        ])->get();
        if(!isset($exists[0]->id)){
            $data = addWithParams('carts', [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'status' => 1,
            ]);
        }
        return redirect()->route('love.index');
    }
    public function cart_add(Request $request, $id)
    {
        $product_id = $id;
        $user_id = Auth::id();
        $exists = $this->model['cart']->where([
            ['user_id', '=', $user_id],
            ['status', '=', '0'],
            ['product_id', '=', $product_id]
        ])->get();

        if(isset($exists[0]->id)){
            $data = editByWhere('carts', [
                'total' => $exists[0]->total+1
            ], ['id' => $exists[0]->id]);
        }else{
            $data = addWithParams('carts', [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'total' => 1,
                'status' => 0,
            ]);
        }
        return redirect()->route('cart.index');
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
    public function show(Request $request, $id)
    {
        $user_id = Auth::id() ?? "0";
        $data = $this->model['product']->find($id);
        $exists = $this->model['cart']->where([
            ['user_id', '=', $user_id],
            ['status', '=', '1'],
            ['product_id', '=', $id]
        ])->get();
        // return $data->productImage[0]->link_image;
        return view('user.product_detail')->with([
            'data' => $data,
            'id' => $id,
            'type' => $this->type,
            'active' => explode('.', $request->route()->getName())[0],
            'khac' => $this->model['product']->orderby('created_at')->paginate(4),
            'love' => isset($exists[0]->id),
        ]);
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
}
