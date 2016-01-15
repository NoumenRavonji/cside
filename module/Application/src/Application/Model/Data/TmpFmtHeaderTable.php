<?php

namespace Application\Model\Data;

use Application\Model\TmpFmtHeaderModel;
use Application\Model\AuthModel;

class TmpFmtHeaderTable extends TableModel
{
	protected $name = 'tmp_fmt_header';

	public function searchRecord($pageNo,TmpFmtHeaderModel $TmpFmtHeader)
	{
		$data = array(
			'id' => $TmpFmtHeader->id,
            'tmp_fmt_hd_cd' => $TmpFmtHeader->tmpFmtHdCd,
            'tmp_fmt_hd_name' => $TmpFmtHeader->tmpFmtHdName,
            'tmp_fmt_hd_cat_id' => $TmpFmtHeader->tmpFmtHdCatId,
            'tmp_fmt_hd_memo' => $TmpFmtHeader->tmpFmtHdMemo,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(TmpFmtHeaderModel $TmpFmtHeader, AuthModel $auth)
	{

		$data = array(
            'tmp_fmt_hd_cd' => $TmpFmtHeader->tmpFmtHdCd,
            'tmp_fmt_hd_name' => $TmpFmtHeader->tmpFmtHdName,
            'tmp_fmt_hd_cat_id' => $TmpFmtHeader->tmpFmtHdCatId,
            'tmp_fmt_hd_memo' => $TmpFmtHeader->tmpFmtHdMemo,
        );

        return $this->saveRecordByData($TmpFmtHeader->id, $data ,$auth);

	}

}
