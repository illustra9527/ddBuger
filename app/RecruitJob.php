<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $city_id
 * @property string $shop_id
 * @property string $contact_name
 * @property string $remark
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 * @property LocationCity $locationCity
 */
class RecruitJob extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recruit_job';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['city_id', 'shop_id', 'contact_name', 'remark', 'sort', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locationCity()
    {
        return $this->belongsTo('App\LocationCity', 'city_id');
    }
}
