<?php

namespace App\Repositories\v1;

use App\Models\Historystatu;
use App\Interfaces\v1\HistorystatuInterface;
use App\Http\Controllers\v1\_ControlCommon;

class HistorystatuRepository implements HistorystatuInterface
{
    private $model , $commons;

    public function __construct(Historystatu $model, _ControlCommon $commons) {
        $this->model = $model;
        $this->commons = $commons;
    }
    
	public function indexStatus()
	{
		$dateFilter = $this->commons->dateFilters();
		$registersPerPage = $this->commons->registersPerPage();
		$fieldsToSelect = $this->commons->fieldsToSelect('historystatus.id,historystatus.uuid,historystatus.people_id,peoples.status,peoples.user,historystatus.created_at');
		$sortByField = $this->commons->sortByField();
		$data = $this->model->select($fieldsToSelect)
							->leftJoin('peoples', 'peoples.id','historystatus.people_id')
							->whereBetween('historystatus.created_at', [$dateFilter['dts'], $dateFilter['dtf']]);

		if(isset($_GET['q'])){
			$fieldsToSearch = isset($_GET['q']) ? $this->commons->keywordsToSearch('historystatus.people_id,peoples.user') : '';
			$data->whereRaw("($fieldsToSearch)");
		}

		return $data->orderByRaw($sortByField)->paginate($registersPerPage);
	}

	public function showStatus($uuid)
	{
		$model = $this->model->where('uuid', $uuid)->first();
		return $model;
	}
}
