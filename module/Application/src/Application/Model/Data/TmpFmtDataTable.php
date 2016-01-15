<?php

namespace Application\Model\Data;

use Application\Model\TmpFmtDataModel;
use Application\Model\AuthModel;

class TmpFmtDataTable extends TableModel
{
	protected $name = 'tmp_fmt_datas';

	public function searchRecord($pageNo,TmpFmtDataModel $TmpFmtData)
	{
		$data = array(
			'id' => $TmpFmtData->id,
            'tmp_fmt_id' => $TmpFmtData->tmpFmtId,
            'tmp_fmt_data_cd' => $TmpFmtData->tmpFmtDataCd,
            'tmp_fmt_data_name' => $TmpFmtData->tmpFmtDataName,
            'input_type_id' => $TmpFmtData->inputTypeId,
            'tmp_imput_id' => $TmpFmtData->tmpImputId,
            'disp_num' => $TmpFmtData->dispNum,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(TmpFmtDataModel $TmpFmtData, AuthModel $auth)
	{

		$data = array(
            'tmp_fmt_id' => $TmpFmtData->tmpFmtId,
            'tmp_fmt_data_cd' => $TmpFmtData->tmpFmtDataCd,
            'tmp_fmt_data_name' => $TmpFmtData->tmpFmtDataName,
            'input_type_id' => $TmpFmtData->inputTypeId,
            'tmp_imput_id' => $TmpFmtData->tmpImputId,
            'disp_num' => $TmpFmtData->dispNum,
        );

        return $this->saveRecordByData($TmpFmtData->id, $data ,$auth);

	}

}
