<?php

use BCS\Entities\Category;
use BCS\Entities\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::whereTitle('T-Shirt')->first();

        $product = new Product([
            'title' => 'Adidas T-Shirt',
            'model' => 'Manchester United',
            'price' => 20000,
            'imgUrl' => 'https://www.goalinn.com/f/132/1325104/adidas-t-shirt-manchester-united-boys.jpg',
            'desc' => 'The Shirt of Manchester United Club',
            'status' => Product::STATUS_AVAILABE,
            'quantity' => 100,
            'category_id' => $category->id
        ]);

        $product->save();

        foreach ($product->attributes as $attribute) {
            var_dump($attribute->ti);
        }
    }
}
