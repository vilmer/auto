<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orden;
class Item extends Model
{
    protected $table='item';

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
