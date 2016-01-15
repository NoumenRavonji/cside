<?php

namespace Application\Model\Data;

use Application\Model\InputSetListModel;
use Application\Model\AuthModel;

class InputSetListTable extends TableModel
{
	protected $name = 'input_set_list';

	public function searchRecord($pageNo,InputSetListModel $InputSetList)
	{
		$data = array(
			'id' => $InputSetList->id,
            'input_set_cd' => $InputSetList->inputSetCd,
            'input_set_name' => $InputSetList->inputSetName,
            'max_value' => $InputSetList->maxValue,
            'min_value' => $InputSetList->minValue,
            'imp_value' => $InputSetList->impValue,
            'imp_work' => $InputSetList->impWork,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(InputSetListModel $InputSetList, AuthModel $auth)
	{

		$data = array(
            'input_set_cd' => $InputSetList->inputSetCd,
            'input_set_name' => $InputSetList->inputSetName,
            'max_value' => $InputSetList->maxValue,
            'min_value' => $InputSetList->minValue,
            'imp_value' => $InputSetList->impValue,
            'imp_work' => $InputSetList->impWork,
        );

        return $this->saveRecordByData($InputSetList->id, $data ,$auth);

	}

}
