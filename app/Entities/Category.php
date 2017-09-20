<?php

namespace BCS\Entities;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * BCS\Entities\Category
 *
 * @mixin \Eloquent
 * @property-read Collection|Product[] $products
 * @property-read Collection|CategoryAttribute[] $attributes
 * @property-read Collection|Category[] $children
 * @property-read Category $parent
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property int $parent_id
 * @method Builder|Category whereDesr($value)
 * @method Builder|Category whereId($value)
 * @method Builder|Category whereParentId($value)
 * @method Builder|Category whereTitle($value)
 * @method Category firstOrCreate(array $properties)
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Category whereDesc($value)
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\BCS\Entities\Category onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\BCS\Entities\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\BCS\Entities\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\BCS\Entities\Category withoutTrashed()
 */
class Category extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['children'];

    /**
     * @todo
     */
//    protected $cascadeDeletes = ['attributes', 'products', 'children'];

    public $timestamps = false;

    protected $table = 'category';
    protected $fillable = ['title', 'desc', 'parent_id'];

    public function products()
    {
        return $this->hasMany('BCS\Entities\Product', 'category_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany('BCS\Entities\CategoryAttribute', 'category_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('BCS\Entities\Category', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('BCS\Entities\Category', 'parent_id', 'id');
    }
}
