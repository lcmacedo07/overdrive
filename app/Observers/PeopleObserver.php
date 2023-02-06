<?php

namespace App\Observers;

use App\Models\People;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PeopleObserver
{
    
	public function creating(People $model) {
		$model->uuid = Str::uuid();
	}
	public function created(People $model) {
		// Cache::forget('peoples');
	}
	public function updating(People $model) {
	}
	public function updated(People $model) {
		// Cache::forget('peoples');
	}
}
