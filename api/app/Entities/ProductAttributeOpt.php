<?php

namespace BCS\Entities;

/**
 * BCS\Entities\ProductAttributeOpt
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $option_id
 * @property int $product_id
 * @property int $attribute_id
 * @property-read \BCS\Entities\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeOpt whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeOpt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeOpt whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeOpt whereProductId($value)
 */
class ProductAttributeOpt extends ProductAttribute
{
    protected $table = 'product_attribute_opt';
}
