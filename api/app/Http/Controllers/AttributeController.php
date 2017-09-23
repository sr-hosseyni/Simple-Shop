<?php

namespace BCS\Http\Controllers;

use BCS\Entities\CategoryAttribute;
use BCS\Entities\Repositories\AttributeRepository;
use BCS\Http\Requests\PostAttributeRequest;
use BCS\Transformers\V1\AttributeTransformer;
use BCS\Transformers\V1\CategoriesTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttributeController extends Controller
{
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->categoryRepository
            ->pushCriteria(new OfCategory($request))
            ->all();

        return $this->apiResponseSucces($data, new CategoriesTransformer());
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
    public function store(PostAttributeRequest $request)
    {
        $attribute = new CategoryAttribute($request->all());
        if ($attribute->save()) {
            if ($attribute->ableToHaveOption()) {
                $options = [];
                foreach (explode(',', $request->get('optionsStr')) as $title) {
                    $options[] = new \BCS\Entities\AttributeOption(['title' => $title]);
                }

                $attribute->options()->saveMany($options);
            }
            return $this->apiResponseSucces($attribute, AttributeTransformer::getInstance());
        }

        /**
         * @todo Needs proper response with siutable status code
         */
        return $this->apiResponseError();
    }

    /**
     * Display the specified resource.
     *
     * @param  CategoryAttribute  $categoryAttribute
     * @return Response
     */
    public function show(CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoryAttribute  $categoryAttribute
     * @return Response
     */
    public function edit(CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  CategoryAttribute  $categoryAttribute
     * @return Response
     */
    public function update(Request $request, CategoryAttribute $categoryAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CategoryAttribute  $categoryAttribute
     * @return Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        //
    }
}
