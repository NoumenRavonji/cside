<?php
namespace Application\Model;

class ComCatModel extends ModelBasic
{

    public $id;
    public $comCatCd;
    public $comCatName;
    public $parentComCatId;

    public function __construct($data = null)
    {
        $this->myTable = $data['comCatTable'];
    }

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->comCatCd = (!empty($data['com_cat_cd'])) ? $data['com_cat_cd'] : null;
        $this->comCatName = (!empty($data['com_cat_name'])) ? $data['com_cat_name'] : null;
        $this->parentComCatId = (!empty($data['parent_com_cat_id'])) ? $data['parent_com_cat_id'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->comCatCd = (!empty($data['com_cat_cd'])) ? $data['com_cat_cd'] : null;
        $this->comCatName = (!empty($data['com_cat_name'])) ? $data['com_cat_name'] : null;
        $this->parentComCatId = (!empty($data['parent_com_cat_id'])) ? $data['parent_com_cat_id'] : null;
    }
    
}