<?php
namespace BCS\Transformers\V1;

use BCS\Helpers\StaticInstanceMaker;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;

/**
 * Description of AttributesTransformer
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 */
class AttributesTransformer extends TransformerAbstract
{
    use StaticInstanceMaker;

    /**
     *
     * @param Attribute[]|Collection $attributes
     * @return array
     */
    public function transform(Collection $attributes)
    {
        $data = [];
        $attributeTransformer = new AttributeTransformer();
        foreach ($attributes as $attribute) {
            $data[] = $attributeTransformer->transform($attribute);
        }

        return $data;
    }
}
