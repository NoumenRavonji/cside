<?php
namespace Application\Model;

class PrefModel extends ModelBasic
{

    public $id;
    public $prefName;

    public function __construct($data = null){
        $this->myTable = $data['prefTable'];
    }
    
}