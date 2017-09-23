<?php

namespace BCS\Entities;

/**
 * BCS\Entities\ProductAttributeDtm
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $value
 * @property int $product_id
 * @property int $attribute_id
 * @property-read \BCS\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeDtm whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeDtm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeDtm whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeDtm whereValue($value)
 */
class ProductAttributeDtm extends ProductAttribute
{
    protected $table = 'product_attribute_dtm';
}
