<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $city_name
 * @property string $img
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 * @property Location[] $locations
 */
class LocationCity extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'location_city';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['city_name', 'img', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany('App\Location', 'city_id');
    }
}
