<?php

namespace BCS\Entities;

/**
 * BCS\Entities\ProductAttributeStr
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $value
 * @property int $product_id
 * @property int $attribute_id
 * @property-read \BCS\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeStr whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeStr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeStr whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeStr whereValue($value)
 */
class ProductAttributeStr extends ProductAttribute
{
    protected $table = 'product_attribute_str';
}
