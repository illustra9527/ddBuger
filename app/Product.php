<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_id
 * @property string $type_name
 * @property string $title
 * @property string $img
 * @property string $description
 * @property string $price
 * @property string $sort
 * @property string $created_at
 * @property string $updated_at
 * @property ProductType $productType
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['type_id', 'title', 'img', 'description', 'price', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo('App\ProductType', 'type_id');
    }
}
