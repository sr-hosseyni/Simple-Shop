<?php

namespace BCS\Entities;

/**
 * BCS\Entities\ProductAttributeInt
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $value
 * @property int $product_id
 * @property int $attribute_id
 * @property-read \BCS\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereValue($value)
 */
class ProductAttributeInt extends ProductAttribute
{
    protected $table = 'product_attribute_int';
}
