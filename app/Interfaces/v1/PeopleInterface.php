<?php

namespace App\Interfaces\v1;

use App\Http\Requests\PeopleRequest;

interface PeopleInterface {
    
	public function index();
	public function show($uuid);
	public function store(PeopleRequest $request);
	public function update($uuid, PeopleRequest $request);
     
}
