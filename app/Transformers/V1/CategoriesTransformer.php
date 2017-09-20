<?php
namespace BCS\Transformers\V1;

use BCS\Entities\Category;
use BCS\Helpers\StaticInstanceMaker;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Description of CategoriesTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class CategoriesTransformer extends TransformerAbstract
{
    use StaticInstanceMaker;

    /**
     *
     * @param Category[]|Collection $categories
     * @return array
     */
    public function transform(Collection $categories)
    {
        $data = [];
        $categoryTransformer = new CategoryTransformer(CategoryTransformer::TRANSFORM_WITH_CHILDREN);
        foreach ($categories as $category) {
            $data[] = $categoryTransformer->transform($category);
        }

        return $data;
    }
}
