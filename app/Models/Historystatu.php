<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Historystatu extends Model
{
    
    use  HasFactory, Notifiable;

    protected $table = 'historystatus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
		'people_id',
		//  'status',
         
    ];
    

	public function people()
	{
		return $this->belongsTo(People::class);
	}
     
}
