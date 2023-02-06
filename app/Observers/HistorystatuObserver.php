<?php

namespace App\Observers;

use App\Models\Historystatu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Http\Controllers\v1\_ControlCommon;

class HistorystatuObserver
{
    private $commons;

    public function __construct(_ControlCommon $commons)
    {
        $this->commons = $commons;
    }

    
	public function creating(Historystatu $model) {
		$model->uuid = Str::uuid();
	}
	public function created(Historystatu $model) {
		// Cache::forget('historystatus');
	}
	public function updating(Historystatu $model) {
	}
	public function updated(Historystatu $model) {
		// Cache::forget('historystatus');
	}
     
}
