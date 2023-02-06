<?php

namespace App\Repositories\v1;

use App\Models\People;
use App\Interfaces\v1\PeopleInterface;
use App\Http\Controllers\v1\_ControlCommon;

class PeopleRepository implements PeopleInterface
{
    private $model, $commons;

    public function __construct(People $model, _ControlCommon $commons) {
        $this->model = $model;
		$this->commons = $commons;
    }
    
	public function index()
	{
		$dateFilter = $this->commons->dateFilters();
		$registersPerPage = $this->commons->registersPerPage();
		$fieldsToSelect = $this->commons->fieldsToSelect('id,uuid,name,document,phone,status,user,created_at');
		$sortByField = $this->commons->sortByField();
		$data = $this->model->select($fieldsToSelect)->whereBetween('created_at', [$dateFilter['dts'], $dateFilter['dtf']]);
		
		if(isset($_GET['q'])){
			$fieldsToSearch = isset($_GET['q']) ? $this->commons->keywordsToSearch('name,id') : '';
			$data->whereRaw("($fieldsToSearch)");
		}

		return $data->orderByRaw($sortByField)->paginate($registersPerPage);
	}

	public function show($uuid)
	{
		$model = $this->model->where('uuid', $uuid)->first();
		return $model;
	}
	public function store($request) {
		return $this->model->create($request->all());
	}

	public function update($uuid, $request) {
		$dataForm = $request->all();
		unset($dataForm['created_at'], $dataForm['updated_at'], $dataForm['deleted_at']);
		return $this->model->where('uuid', $uuid)->update($dataForm);
	}
}
