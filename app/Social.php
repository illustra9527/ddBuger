<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $post
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Social extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'social';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'post', 'sort', 'created_at', 'updated_at'];

}
