<?php

namespace BCS\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * BCS\Entities\Product
 *
 * @property-read \BCS\Entities\Category $category
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $model
 * @property string $imgUrl
 * @property int $price
 * @property string $status
 * @property int $quantity
 * @property int $category_id
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereCategoryId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereDesr($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereId($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereImgUrl($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereModel($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product wherePrice($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereQuantity($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttribute[] $attributes
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereDesc($value)
 * @method \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Product whereTitle($value)
 */
class Product extends Model
{
    const STATUS_AVAILABE = 'available';
    const STATUS_NOT_AVAILABE = 'not_available';
    const STATUS_COOMING_SOON = 'comming_soon';

    /**
     *
     * @var string[]
     */
    public static $availableStatus = [
        self::STATUS_AVAILABE,
        self::STATUS_COOMING_SOON,
        self::STATUS_NOT_AVAILABE
    ];

    protected $table = 'product';
    public $timestamps = false;

    protected $fillable = [
        'model',
        'imgUrl',
        'desr',
        'price',
        'status',
        'quantity',
        'title',
        'desc',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('BCS\Entities\Category');
    }

    public function attributes()
    {
        return $this->hasMany('BCS\Entities\ProductAttribute', 'product_id', 'id');
    }
}
