<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = [
        'shop_name', 'shop_img','brand','on_time','fengniao','bao','piao','zhun',
        'start_send','send_cost','notice','discount','p_id',
    ];
    public function plople(){
        return $this->belongsTo(Plople::class,'id');//User::class  'App\User'
    }
}
