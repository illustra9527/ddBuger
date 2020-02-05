<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img
 * @property string $description
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Banner extends Model
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
    protected $fillable = ['title','img', 'description', 'sort', 'created_at', 'updated_at'];

}
