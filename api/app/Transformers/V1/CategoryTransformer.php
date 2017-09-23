<?php
namespace BCS\Transformers\V1;

use BCS\Entities\Category;
use BCS\Helpers\StaticInstanceMaker;
use League\Fractal\TransformerAbstract;

/**
 * Description of CategoryTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class CategoryTransformer extends TransformerAbstract
{
    use StaticInstanceMaker;

    const TRANSFORM_SIMPLE = 0;
    const TRANSFORM_WITH_ATTRIBUTES = 1;
    const TRANSFORM_WITH_CHILDREN = 2;
    const TRANSFORM_WITH_PARENT = 4;

    private $mode;

    /**
     * You can choose transform mode by mixing of constants like :
     * new CategoryTransformer(CategoryTransformer::TRANSFORM_WITH_ATTRIBUTES | CategoryTransformer::TRANSFORM_WITH_CHILDREN)
     *
     * @param int $mode
     */
    public function __construct($mode = self::TRANSFORM_SIMPLE)
    {
        $this->mode = $mode;
    }

    /**
     *
     * @param Category $category
     * @return array
     */
    public function transform(Category $category)
    {
        $data = [
            'id' => $category->id,
            'title' => $category->title,
            'desc' => $category->desc,
            'parent_id' => $category->parent_id
        ];

        if ($this->mode & self::TRANSFORM_WITH_ATTRIBUTES) {
            $data['attributes'] = $this->getAttributes($category);
        }

        if ($this->mode & self::TRANSFORM_WITH_CHILDREN) {
            $data['children'] = $this->getChildren($category);
        }

        if ($this->mode & self::TRANSFORM_WITH_PARENT) {
            $data['parent'] = $this->getParent($category);
        }

        return $data;
    }

    private function getAttributes(Category $category)
    {
        if ($category->attributes) {
            return AttributesTransformer::getInstance()->transform($category->attributes);
        }

        return [];
    }

    private function getChildren(Category $category)
    {
        if ($category->children) {
            return CategoriesTransformer::getInstance()->transform($category->children);
        }

        return [];
    }

    private function getParent(Category $category)
    {
        if ($category->parent) {
            return CategoryTransformer::getInstance()->transform($category->parent);
        }

        return null;
    }
}
