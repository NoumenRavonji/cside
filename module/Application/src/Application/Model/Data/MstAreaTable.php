<?php

namespace Application\Model\Data;

use Application\Model\AreaModel;
use Application\Model\AuthModel;

class MstAreaTable extends TableModel
{
	protected $name = 'mst_area';

	public function searchRecord($pageNo,AreaModel $area)
	{
		$data = array(
			'id' => $area->id,
            'area_cd' => $area->areaCd,
            'area_name' => $area->areaName,
            'area_kana' => $area->areaKana,
            'pref_id' => $area->prefId,
            'disp_flag' => $area->dispFlag,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(AreaModel $area, AuthModel $auth)
	{

		$data = array(
            'area_cd' => $area->areaCd,
            'area_name' => $area->areaName,
            'area_kana' => $area->areaKana,
            'pref_id' => $area->prefId,
            'disp_flag' => $area->dispFlag,
        );

        return $this->saveRecordByData($area->id, $data ,$auth);

	}

}