<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\User;
use App\Auto;
use App\Servicio;
class Orden extends Model
{
    protected $table='orden';


    public function ser()
    {
    	return $this->belongsToMany(Servicio::class, 'item','orden_id','servicio_id');
    }

    public function empleado()
	{
	    return $this->belongsTo(User::class, 'user_id');
	}

    public function auto()
    {
        return $this->belongsTo(Auto::class,'auto_id');
    }
}
