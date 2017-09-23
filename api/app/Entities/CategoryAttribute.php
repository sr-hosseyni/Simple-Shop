<?php

namespace BCS\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * BCS\Entities\CategoryAttribute
 *
 * @author sr_hosseini <rassoul.hosseini at gmail.com>
 * @mixin \Eloquent
 * @property-read Category $category
 * @property int $id
 * @property string $title
 * @property string $desr
 * @property int $category_id
 * @property string $type
 * @property-read Collection|AttributeOption[] $options
 * @method Builder|CategoryAttribute whereCategoryId($value)
 * @method Builder|CategoryAttribute whereDesr($value)
 * @method Builder|CategoryAttribute whereId($value)
 * @method Builder|CategoryAttribute whereTitle($value)
 * @method Builder|CategoryAttribute whereType($value)
 * @property string|null $desc
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\CategoryAttribute whereDesc($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $productAttributesDtm
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $productAttributesInt
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $productAttributesOpt
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $productAttributesStr
 * @property-read \Illuminate\Database\Eloquent\Collection|\BCS\Entities\ProductAttributeOpt[] $productAttributesTxt
 */
class CategoryAttribute extends Model
{
    public $timestamps = false;

    const TYPE_STRING = 'str';
    const TYPE_INTEGER = 'int';
    const TYPE_DATETIME = 'dtm';
    const TYPE_OPTION = 'opt';
    const TYPE_TEXT = 'txt';

    /**
     *
     * @var string[]
     */
    public static $availableTypes = [
        self::TYPE_STRING,
        self::TYPE_INTEGER,
        self::TYPE_DATETIME,
        self::TYPE_OPTION,
        self::TYPE_TEXT
    ];

    protected $table = 'category_attribute';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'desc', 'type', 'category_id'];

    public function category()
    {
        return $this->belongsTo('BCS\Entities\Category');
    }

    public function options()
    {
        return $this->hasMany('BCS\Entities\AttributeOption', 'attribute_id', 'id');
    }

    public function productAttributesStr()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }
    public function productAttributesInt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }
    public function productAttributesDtm()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }
    public function productAttributesOpt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }
    public function productAttributesTxt()
    {
        return $this->hasMany('BCS\Entities\ProductAttributeOpt');
    }

    /**
     *
     * @param string $title
     * @return boolean|AttributeOption
     */
    public function addOption($title)
    {
        // Attribute just can has option if its type is OPT
        if (!$this->ableToHaveOption()) {
            throw new \Exception(sprintf('The %s(%s) attribute could not have option', $this->title, $this->type));
        }

        $attribute = new AttributeOption();
        $attribute->title = $title;
        $attribute->attribute_id = $this->id;
        if ($attribute->save()) {
            return $attribute;
        }

        return false;
    }

    public function __get($key)
    {
        // preventing waste query
        if ($key == 'options' && !$this->ableToHaveOption()) {
            return [];
        }

        return parent::__get($key);
    }

    /**
     * return true if type is OPT (So can have )
     * @return boolean
     */
    public function ableToHaveOption()
    {
        return $this->type == self::TYPE_OPTION;
    }
}
