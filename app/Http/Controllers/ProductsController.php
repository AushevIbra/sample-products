<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductPost;
use App\Models\Product;

class ProductsController extends Controller
{
    private static $product;

    public function __construct(Product $product)
    {
        self::$product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = self::$product::paginate(10);

        return view("products.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProductPost $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $data = $request->post();
        $product = self::$product->create([
            'name' => $data['name'],
            'art' => $data['art'],
        ]);

        return redirect(route('products.show', ['id' => $product->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("products.show", ['product' => self::$product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("products.edit", ['product' => self::$product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->post();
        $product = self::$product->find($id);
        $product->find($id)->update([
            'name' => $data['name'],
            'art' => isset($data['art']) ? $data['art'] : $product->art,
        ]);

        return redirect(route('products.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (app('current_user_type') == 'admin') {
            self::$product->find($id)->delete();
        }

        return redirect(route('products.index'));
    }
}
