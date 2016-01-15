<?php

namespace Application\Model\Data;

use Application\Model\TmpInputHeaderModel;
use Application\Model\AuthModel;

class TmpInputHeaderTable extends TableModel
{
	protected $name = 'tmp_input_header';

	public function searchRecord($pageNo,TmpInputHeaderModel $TmpInputHeader)
	{
		$data = array(
			'id' => $TmpInputHeader->id,
            'tmp_input_hd_cd' => $TmpInputHeader->tmpInputHdCd,
            'tmp_input_hd_name' => $TmpInputHeader->tmpInputHdName,
            'input_type_id' => $TmpInputHeader->inputTypeId,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(TmpInputHeaderModel $TmpInputHeader, AuthModel $auth)
	{

		$data = array(
            'tmp_input_hd_cd' => $TmpInputHeader->tmpInputHdCd,
            'tmp_input_hd_name' => $TmpInputHeader->tmpInputHdName,
            'input_type_id' => $TmpInputHeader->inputTypeId,
        );

        return $this->saveRecordByData($TmpInputHeader->id, $data ,$auth);

	}

}
