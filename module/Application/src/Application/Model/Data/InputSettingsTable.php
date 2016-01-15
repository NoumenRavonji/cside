<?php

namespace Application\Model\Data;

use Application\Model\InputSettingsModel;
use Application\Model\AuthModel;

class InputSettingsTable extends TableModel
{
	protected $name = 'input_settings';

	public function searchRecord($pageNo,InputSettingsModel $InputSettings)
	{
		$data = array(
			'id' => $InputSettings->id,
            'tmp_fmt_id' => $InputSettings->tmpFmtId,
            'input_set_id' => $InputSettings->inputSetId,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(InputSettingsModel $InputSettings, AuthModel $auth)
	{

		$data = array(
            'tmp_fmt_id' => $InputSettings->tmpFmtId,
            'input_set_id' => $InputSettings->inputSetId,
        );

        return $this->saveRecordByData($InputSettings->id, $data ,$auth);

	}

}
