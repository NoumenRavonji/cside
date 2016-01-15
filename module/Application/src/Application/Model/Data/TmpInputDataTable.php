<?php

namespace Application\Model\Data;

use Application\Model\TmpInputDataModel;
use Application\Model\AuthModel;

class TmpInputDataTable extends TableModel
{
	protected $name = 'tmp_input_datas';

	public function searchRecord($pageNo,TmpInputDataModel $TmpInputData)
	{
		$data = array(
			'id' => $TmpInputData->id,
            'tmp_input_id' => $TmpInputData->tmpInputId,
            'tmp_input_datas_name' => $TmpInputData->tmpInputDatasName,
            'tmp_input_datas_disp' => $TmpInputData->tmpInputDatasDisp,
            'tmp_input_datas_img' => $TmpInputData->tmpInputDatasImg,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(TmpInputDataModel $TmpInputData, AuthModel $auth)
	{

		$data = array(
            'tmp_input_id' => $TmpInputData->tmpInputId,
            'tmp_input_datas_name' => $TmpInputData->tmpInputDatasName,
            'tmp_input_datas_disp' => $TmpInputData->tmpInputDatasDisp,
            'tmp_input_datas_img' => $TmpInputData->tmpInputDatasImg,
        );

        return $this->saveRecordByData($TmpInputData->id, $data ,$auth);

	}

}
