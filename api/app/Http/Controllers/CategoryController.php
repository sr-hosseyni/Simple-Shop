<?php

namespace BCS\Http\Controllers;

use BCS\Entities\Category;
use BCS\Entities\Repositories\CategoryRepository;
use BCS\Entities\Repositories\Criteria\Category\MainCategories;
use BCS\Transformers\V1\CategoriesTransformer;
use BCS\Transformers\V1\CategoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = $this->categoryRepository
            ->pushCriteria(new MainCategories())
            ->with(['children'])
            ->all();

        $transformer = new CategoriesTransformer();
        return $this->apiResponseSucces($data, $transformer);
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
    public function store(Request $request)
    {
        $category = new Category($request->all());
        $category->save();

        $transformer = new CategoryTransformer(CategoryTransformer::TRANSFORM_WITH_CHILDREN);
        return $this->apiResponseSucces($category, $transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function show(Category $category)
    {
        $transformer = new CategoryTransformer(CategoryTransformer::TRANSFORM_WITH_ATTRIBUTES);

        /**
         * @todo options must retrieve in one query
         * Its handling separated for each attribute now
         */

        return $this->apiResponseSucces($category, $transformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Category  $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->desc = $request->desc;
        $category->parent_id = $request->parent_id;
        if ($category->save()) {
            return $this->apiResponseSucces($category, new CategoryTransformer());
        }

        return $this->apiResponseError();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return $this->apiResponseSucces(['id' => $category->id]);
        }

        return $this->apiResponseError();
    }
}
