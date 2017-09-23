<?php

namespace BCS\Http\Controllers;

use BCS\Entities\Product;
use BCS\Entities\Repositories\ProductRepository;
use BCS\Http\Requests\PostProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Optimus\Bruno\EloquentBuilderTrait;

class ProductController extends Controller
{
    use EloquentBuilderTrait;

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resourceOptions = $this->parseResourceOptions();

//        var_dump($resourceOptions);die;

        $data = $this->productRepository->get($resourceOptions);
        $parsedData = $this->parseData($data, $resourceOptions, 'products');

        return $this->response($parsedData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(PostProductRequest $request)
    {
        $product = new Product($request->all());
        $product->save();

        return $this->apiResponseSucces($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product  $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
