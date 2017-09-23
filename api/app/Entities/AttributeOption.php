<?php

namespace BCS\Entities;

use BCS\Helpers\StaticInstanceMaker;
use Illuminate\Database\Eloquent\Model;

/**
 * BCS\Entities\AttributeOption
 *
 * @mixin \Eloquent
 * @property-read CategoryAttribute $attribute
 * @property int $id
 * @property string $title
 * @property int $attribute_id
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\AttributeOption whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\AttributeOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\AttributeOption whereTitle($value)
 */
class AttributeOption extends Model
{
    use StaticInstanceMaker;

    protected $table = 'attribute_option';
    protected $fillable = ['title'];
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo('BCS\Entities\CategoryAttribute');
    }
}
