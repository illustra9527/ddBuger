<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type_name
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 * @property News[] $news
 */
class NewsType extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'news_type';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['type_name', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\News', 'type_id');
    }
}
