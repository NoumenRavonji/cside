<?php

namespace Application\Model\Data;

use Application\Model\CompanyScaleModel;
use Application\Model\AuthModel;

class MstComGrdTable extends TableModel
{
	protected $name = 'mst_com_grd';

	public function searchRecord($pageNo,CompanyScaleModel $companyScale)
	{
		$data = array(
			'id' => $companyScale->id,
            'com_grd_cd' => $companyScale->comGrdCd,
            'com_grd_name' => $companyScale->comGrdName,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(CompanyScaleModel $companyScale, AuthModel $auth)
	{

		$data = array(
            'com_grd_cd' => $companyScale->comGrdCd,
            'com_grd_name' => $companyScale->comGrdName,
        );

        return $this->saveRecordByData($companyScale->id, $data ,$auth);

	}

}