<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $order_no
 * @property string $total_price
 * @property string $recipient_name
 * @property string $recipient_phone
 * @property string $recipient_addresss
 * @property string $recipient_email
 * @property string $recipient_time
 * @property string $receipt
 * @property string $remark
 * @property string $status
 * @property string $delete_at
 * @property string $created_at
 * @property string $updated_at
 * @property OrderItem[] $orderItems
 */
class Order extends Model
{
    use SoftDeletes;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_no', 'total_price', 'recipient_name', 'recipient_phone', 'recipient_addresss', 'recipient_email', 'recipient_time', 'receipt', 'remark', 'status', 'delete_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}
