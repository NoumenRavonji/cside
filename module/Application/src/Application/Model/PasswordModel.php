<?php
namespace Application\Model;

class PasswordModel extends ModelBasic
{

    public $id;
    public $staffId;
    public $password;
    public $salt;


    public function __construct($data = null){
        $this->myTable = $data['passwordTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->staffId = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
        $this->salt = (!empty($data['salt'])) ? $data['salt'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->staffId = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
        $this->salt = (!empty($data['salt'])) ? $data['salt'] : null;
    }
    
}