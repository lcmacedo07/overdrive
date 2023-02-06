<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    
    use SoftDeletes, HasFactory, Notifiable;

    protected $table = 'peoples';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        
		 'name',
		 'document',
		 'phone',
		 'status',
		 'user',
         
    ];
    

	public function historystatus()
	{
		return $this->hasMany(Historystatu::class);
	}
	
	protected static function boot(){
		parent::boot();
		static::created(function($model){
			$model->historystatus()->create([
				'uuid' => $model->uuid,
				'status' => $model->status,
				'user' => $model->user,
			]);
		});
		static::updated(function($model){
			$model->historystatus()->create([
				'uuid' => $model->uuid,
				'status' => $model->status,
				'user' => $model->user,
			]);
		});
	}
     
}
