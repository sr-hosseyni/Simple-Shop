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
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $attributesDtm
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $attributesInt
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $attributesOpt
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $attributesStr
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $attributesTxt
 */
class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;

    const STATUS_AVAILABE = 'available';
    const STATUS_NOT_AVAILABE = 'not_available';
    const STATUS_COOMING_SOON = 'comming_soon';

    /**
     * @var string[]
     */
    public static $availableStatus = [
        self::STATUS_AVAILABE,
        self::STATUS_COOMING_SOON,
        self::STATUS_NOT_AVAILABE
    ];

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

    public function attributesStr()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    public function attributesInt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    public function attributesDtm()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    public function attributesOpt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    public function attributesTxt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    public function __get($name)
    {
        if ($name == 'attributes') {
            return array_merge(
                $this->attributesStr->toArray(),
                $this->attributesInt->toArray(),
                $this->attributesDtm->toArray(),
                $this->attributesOpt->toArray(),
                $this->attributesTxt->toArray()
            );
        }

        return parent::__get($name);
    }
}
