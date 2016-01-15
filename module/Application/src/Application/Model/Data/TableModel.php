<?php

namespace Application\Model\Data;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Db\Sql\Sql;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Authentication\AuthenticationService;
use Application\Model\AuthModel;

class TableModel extends TableGateway
{


	protected $name;

	public function __construct( $adapter = null )
	{

		if($adapter == null){
			$adapter = GlobalAdapterFeature::getStaticAdapter();
		}
		parent::__construct($this->name,$adapter);
	}

	public function fetchAll($pageNo){

		$result = null;

		$where = array(
				'delete_flag' => 0,
			);

		$result = $this->getPage($pageNo,$where);
		
		return $result;

	}

	public function searchRecordByData($pageNo, $data)
	{
		$result = null;

		$where = array(
				'delete_flag' => 0,
			);

		foreach ($data as $key => $value) {
			if($value){
				$where[$key.' LIKE ?'] = '%'.$value.'%'; 
			}
		}

		$result = $this->getPage($pageNo,$where);
		
		return $result;
	}

	public function getPage($pageNo, $where = null)
	{
		$sql = new Sql($this->adapter);

		$select = $sql->select();
		$select->from($this->name);

		$select->where($where);
		$select->order('id asc');

		$adapter = new DbSelect($select,$sql);

		$paginator = new Paginator($adapter);

		$paginator->setCurrentPageNumber($pageNo);

		$paginator->setItemCountPerPage(10);

		$paginator->setPageRange(5);

		return $paginator;
		
	}

	public function getRecord($id, $forUpdate = false)
	{
		$rowset = null;

		$where = array(
				'delete_flag' => 0,
				'id' => $id,
			);

		$row = null;

		if(!$forUpdate){
			$rowset = $this->select($where);
			$row = $rowset->current();
		}else{
			$select = $this->getSql()->select();
			$select->where($where);
			$row = $this->adapter->query($select->getSqlString().' FOR UPDATE');
		}
		

		

		if(!$row){
			throw new \Exception("該当レコードが見つかりませんでした。  $id");
		}
		
		return $row;
	}

	public function saveRecordByData($id, $data , AuthModel $auth)
	{

		$result = 0;

		$data['updated_at'] = time();
        $data['updated_by'] = $auth->getLoginUser()['staff_id'];

		if($id == null){
        	$data['created_at'] = time();
        	$data['created_by'] = $auth->getLoginUser()['staff_id'];

        	$result = $this->insert($data);

        }else{
        	$data['id'] = (int) $id;

        	if($this->getRecord($id, true)){
        		$where= array(
		            'id' => $id,
		        );

        		$result = $this->update($data,$where);
        	}else{
        		throw new \Exception("該当レコードが見つかりませんでした。  $id");
        	}

        }

        return $result;
	}

	public function deleteRecord($id, AuthModel $auth)
	{
		$result = 0;
		
		if($this->getRecord($id)){
        	$data = array(
	            'delete_flag' => 1,
	            'updated_at' => time(),
	            'updated_by' => $auth->getLoginUser()['staff_id'],
        	);
        	$where= array(
		        'id' => $id,
		    );
        	$result = $this->update($data, $where);

        }else{
        	throw new \Exception("該当レコードが見つかりませんでした。  $id");
        }

        return $result;
	}

//********************************************************************************

    public function provideReference($columName1, $columName2)
    {

    	$resultArray = array();

        $result = null;

        $select = $this->getSql()->select();

		// 取得する列指定
		$select->columns(array($columName1, $columName2));

		// WHERE
		$select->where(array('delete_flag' => 0));

		// GROUP BY
		$select->group(array($columName1));

		// ORDER BY
		$select->order(array($columName1));

		$result = $this->selectWith($select);

		foreach ($result->toArray() as $record) {
			$resultArray[$record[$columName1]] = $record[$columName2];
		}

/*		if(count($resultArray) == 0){
			$resultArray['0'] == 'null';
		}*/

        return $resultArray;
    }

//********************************************************************************


}