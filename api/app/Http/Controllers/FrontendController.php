<?php

namespace BCS\Http\Controllers;

use BCS\Entities\Category;
use BCS\Entities\CategoryAttribute;
use BCS\Entities\Product;
use BCS\Entities\Repositories\AttributeRepository;
use BCS\Entities\Repositories\CategoryRepository;
use BCS\Entities\Repositories\Criteria\Category\MainCategories;
use BCS\Entities\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use View;

class FrontendController extends Controller
{
    private $categoryRepository;
    private $productRepository;
    private $attributeRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository, AttributeRepository $attributeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function allProducts()
    {
        $products = Cache::remember('products', 10, function() {
            return $this->productRepository->get();
        });

        /**
         * @todo change cache duration to 10 min
         */
        $categories = Cache::remember('categories', 0.1, function() {
            return $this->categoryRepository
                ->pushCriteria(new MainCategories())
                ->with(['children'])
                ->all();
        });

        $attributes = Cache::remember('attributes', 10, function() {
            return $this->attributeRepository->all();
        });

        return View::make('frontend.all-products')
            ->with('products', $products)
            ->with('categories', $categories)
            ->with('attributes', $attributes);
    }
}
