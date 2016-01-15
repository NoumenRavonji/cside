<?php

namespace Application\Model\Data;

use Application\Model\ComCatModel;
use Application\Model\AuthModel;

class MstComCatTable extends TableModel
{
	protected $name = 'mst_com_cat';

	public function searchRecord($pageNo,ComCatModel $comCat)
	{
		$data = array(
			'id' => $comCat->id,
            'com_cat_cd' => $comCat->comCatCd,
            'com_cat_name' => $comCat->comCatName,
            'parent_com_cat_id' => $comCat->parentComCatId,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(ComCatModel $comCat, AuthModel $auth)
	{

		$data = array(
            'com_cat_cd' => $comCat->comCatCd,
            'com_cat_name' => $comCat->comCatName,
            'parent_com_cat_id' => $comCat->parentComCatId,
        );

        return $this->saveRecordByData($comCat->id, $data, $auth);

	}

}