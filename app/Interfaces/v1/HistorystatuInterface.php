<?php

namespace App\Interfaces\v1;

use App\Http\Requests\HistorystatuRequest;

interface HistorystatuInterface {
    
	public function indexStatus();
	public function showStatus($uuid);
     
}
