<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $subtitle
 * @property string $description
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property NewsType $newsType
 */
class News extends Model
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
    protected $fillable = ['type_id', 'title', 'subtitle', 'description', 'img','sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function newsType()
    {
        return $this->belongsTo('App\NewsType', 'type_id');
    }
}
