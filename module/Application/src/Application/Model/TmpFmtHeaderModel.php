<?php
namespace Application\Model;

class TmpFmtHeaderModel extends ModelBasic
{

    public $id;
    public $tmpFmtHdCd;
    public $tmpFmtHdName;
    public $tmpFmtHdCatId;
    public $tmpFmtHdMemo;


    public function __construct($data = null){
        $this->myTable = $data['tmpFmtHeaderTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtHdCd = (!empty($data['tmp_fmt_hd_cd'])) ? $data['tmp_fmt_hd_cd'] : null;
        $this->tmpFmtHdName = (!empty($data['tmp_fmt_hd_name'])) ? $data['tmp_fmt_hd_name'] : null;
        $this->tmpFmtHdCatId = (!empty($data['tmp_fmt_hd_cat_id'])) ? $data['tmp_fmt_hd_cat_id'] : null;
        $this->tmpFmtHdMemo = (!empty($data['tmp_fmt_hd_memo'])) ? $data['tmp_fmt_hd_memo'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->tmpFmtHdCd = (!empty($data['tmp_fmt_hd_cd'])) ? $data['tmp_fmt_hd_cd'] : null;
        $this->tmpFmtHdName = (!empty($data['tmp_fmt_hd_name'])) ? $data['tmp_fmt_hd_name'] : null;
        $this->tmpFmtHdCatId = (!empty($data['tmp_fmt_hd_cat_id'])) ? $data['tmp_fmt_hd_cat_id'] : null;
        $this->tmpFmtHdMemo = (!empty($data['tmp_fmt_hd_memo'])) ? $data['tmp_fmt_hd_memo'] : null;
    }
    
}
