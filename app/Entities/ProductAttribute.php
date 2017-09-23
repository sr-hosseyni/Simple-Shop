<?php

namespace BCS\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * BCS\Entities\ProductAttribute
 *
 * @mixin \Eloquent
 * @property-read \BCS\Entities\Product $product
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereAttributeId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereProductId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\ProductAttributeInt whereValue($value)
 * @property-read \BCS\Entities\CategoryAttribute $attribute
 */
class ProductAttribute extends Model
{
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('BCS\Entities\Product');
    }

    public function attribute()
    {
        return $this->belongsTo('BCS\Entities\CategoryAttribute');
    }
}
