<?php
namespace Application\Model;

class PostModel extends ModelBasic
{

    public $id;
    public $postCd;
    public $postName;
 


    public function __construct($data = null){
        $this->myTable = $data['postTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->postCd = (!empty($data['post_cd'])) ? $data['post_cd'] : null;
        $this->postName = (!empty($data['post_name'])) ? $data['post_name'] : null;
     
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->postCd = (!empty($data['post_cd'])) ? $data['post_cd'] : null;
        $this->postName = (!empty($data['post_name'])) ? $data['post_name'] : null;
    }
    
}