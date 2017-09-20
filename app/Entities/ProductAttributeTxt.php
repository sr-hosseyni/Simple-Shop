<?php

namespace BCS\Entities;

/**
 * BCS\Entities\ProductAttributeTxt
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $value
 * @property int $product_id
 * @property int $attribute_id
 * @property-read \BCS\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeTxt whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeTxt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeTxt whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeTxt whereValue($value)
 */
class ProductAttributeTxt extends ProductAttribute
{
    protected $table = 'product_attribute_txt';
}
