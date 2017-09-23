<?php
namespace BCS\Transformers\V1;

use BCS\Entities\CategoryAttribute;
use BCS\Helpers\StaticInstanceMaker;
use BCS\Http\Requests\PostAttributeRequest;
use Illuminate\Http\Request;
use League\Fractal\TransformerAbstract;

/**
 * Description of AttributeTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class AttributeTransformer extends TransformerAbstract
{
    use StaticInstanceMaker;

    /**
     *
     * @param CategoryAttribute $attribute
     * @return array
     */
    public function transform(CategoryAttribute $attribute)
    {
        return [
            'id' => $attribute->id,
            'title' => $attribute->title,
            'desc' => $attribute->desc,
            'type' => $attribute->type,
            'category_id' => $attribute->category_id,
            'options' => $attribute->options
        ];
    }
}
