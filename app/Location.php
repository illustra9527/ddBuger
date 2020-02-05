<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city_id
 * @property string $title
 * @property string $img
 * @property string $address
 * @property string $phone
 * @property string $opening
 * @property string $holiday
 * @property string $fbLink
 * @property string $mapLink
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 * @property LocationCity $locationCity
 */
class Location extends Model
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
    protected $fillable = ['city_id', 'title', 'img', 'address', 'phone', 'opening', 'holiday', 'fbLink', 'mapLink', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locationCity()
    {
        return $this->belongsTo('App\LocationCity', 'city_id');
    }
}
