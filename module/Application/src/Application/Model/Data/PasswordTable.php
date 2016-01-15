<?php

namespace Application\Model\Data;

use Application\Model\PasswordModel;

class PasswordTable extends TableModel
{
	protected $name = 'password';

    public function searchRecord($pageNo,PasswordModel $password)
    {
        $data = array(
            'id' => $password->id,
            'staff_id' => $password->staffId,
            'password' => $password->password,
            'salt' => $password->salt,
        );

        return $this->searchRecordByData($pageNo, $data);

    }

    public function saveRecord(PasswordModel $password)
    {

        $data = array(
            'staff_id' => $password->staffId,
            'password' => $password->password,
            'salt' => $password->salt,
            'modified'  => time(),
            'updated_by'  => 'me',
        );

        return $this->saveRecordByData($password->id, $data);

    }

    public function searchRecordWithWhere(PasswordModel $password)
    {
        $row = null;

        $where = array(
            'staff_id' => $password->staffId,
        );

        $rowset = $this->select($where);

        $row = $rowset->current();

        if(!$row){
            throw new \Exception("該当レコードが見つかりませんでした。");
        }
        
        return $row;

    }

	

}