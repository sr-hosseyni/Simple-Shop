<?php

use BCS\Entities\Category;
use BCS\Entities\CategoryAttribute;
use Illuminate\Database\Seeder;

class CategoryAndAttributeTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catClothing = Category::firstOrCreate([
            'title' => 'Clothing',
            'desc' => 'Clothes collectively',
            'parent_id' => null
        ]);

        $catTshirt = Category::firstOrCreate([
            'title' => 'T-shirt',
            'desc' => 'A short-sleeved casual top',
            'parent_id' => $catClothing->id
        ]);

        $attr = new CategoryAttribute([
            'title' => 'Size',
            'desc' => 'Small, Medium, Large, X-Large or XX-Large',
            'type' => CategoryAttribute::TYPE_OPTION,
            'category_id' => $catTshirt->id
        ]);

        $attr->save();

        $options = ['Small', 'Medium', 'Large', 'X-Large', 'XX-Large'];
        foreach ($options as $option) {
            $attr->addOption($option);
        }

        $catPants = Category::firstOrCreate([
            'title' => 'Pants',
            'desc' => 'The clothing item',
            'parent_id' => $catClothing->id
        ]);

        $attr2 = new CategoryAttribute([
            'title' => 'Color',
            'desc' => 'The Color',
            'type' => CategoryAttribute::TYPE_STRING,
            'category_id' => $catPants->id
        ]);

        $attr2->save();
    }
}
