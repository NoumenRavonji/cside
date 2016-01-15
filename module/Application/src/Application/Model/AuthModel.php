<?php

namespace Application\Model;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;


class AuthModel extends AuthBasic
{

    public $staffEmail;
    public $password;
    public $staffModel;
    public $passwordModel;
    public $branchModel;
    public $shopModel;
    public $vcModel;
    public $vendorModel;
    public $tmpFmtHeaderModel;
    public $tmpInputDataModel;
    public $inputSetListModel;

    public function setStaffModel(StaffModel $staffModel)
    {
        $this->staffModel = $staffModel;
    }

    public function getStaffModel()
    {
        return $this->staffModel;
    }

    public function setPasswordModel(PasswordModel $passwordModel)
    {
        $this->passwordModel = $passwordModel;
    }

    public function getPasswordModel()
    {
        return $this->passwordModel;
    }

    public function setBranchModel(BranchModel $branchModel)
    {
        $this->branchModel = $branchModel;
    }

    public function getBranchModel()
    {
        return $this->branchModel;
    }

    public function setInputSetListModel(InputSetListModel $inputSetListModel)
    {
        $this->inputSetListModel = $inputSetListModel;
    }

    public function getInputSetListModel()
    {
        return $this->branchModel;
    }


    public function setTmpInputDataModel(TmpInputDataModel $tmpInputDataModel)
    {
        $this->tmpInputDataModel = $tmpInputDataModel;
    }

    public function getTmpInputDataModel()
    {
        return $this->tmpInputDataModel;
    }

    public function setTmpFmtHeaderModel(TmpFmtHeaderModel $tmpFmtHeaderModel)
    {
        $this->tmpFmtHeaderModel = $tmpFmtHeaderModel;
    }

    public function getTmpFmtHeaderModel()
    {
        return $this->tmpFmtHeaderModel;
    }

    public function setTmpInputHeaderModel(TmpInputHeaderModel $tmpInputHeaderModel)
    {
        $this->tmpInputHeaderModel = $tmpInputHeaderModel;
    }

    public function getTmpInputHeaderModel()
    {
        return $this->tmpInputHeaderModel;
    }

    public function setTmpFmtDataModel(TmpFmtDataModel $tmpFmtDataModel)
    {
        $this->tmpFmtDataModel = $tmpFmtDataModel;
    }

    public function getTmpFmtDataModel()
    {
        return $this->tmpFmtDataModel;
    }

    public function setVendorModel(VendorModel $vendorModel)
    {
        $this->vendorModel = $vendorModel;
    }

    public function getVendorModel()
    {
        return $this->vendorModel;
    }

    public function setShopModel(ShopModel $shopModel)
    {
        $this->shopModel = $shopModel;
    }

    public function getShopModel()
    {
        return $this->shopModel;
    }

    public function setVcModel(VcModel $vcModel)
    {
        $this->vcModel = $vcModel;
    }

    public function getVcModel()
    {
        return $this->vcModel;
    }

    public function exchangeArray($data)
    {
        $this->staffEmail     = (!empty($data['staff_email'])) ? $data['staff_email'] : null;
        $this->password = (!empty($data['password'])) ? $data['password'] : null;
    }

    public function login($data)
    {
        //TODO: repair this authentication after all

        $row = null;

        $this->exchangeArray($data);

        //search staffId by staffEmail passed from front
        $this->staffModel->staffEmail = $data['staff_email'];
        $row = $this->staffModel->searchWithWhere();
        if(!$row){
            throw new \Exception('該当するEメールがみつかりませんでした。');
        }
        $this->staffModel->exchangeArrayFromTable($row);

        //search salt by staffId
        $this->passwordModel->staffId = $this->staffModel->id;
        $row = $this->passwordModel->searchWithWhere();
        if(!$row){
            throw new \Exception('該当するEメールが登録されていません。');
        }
        $this->passwordModel->exchangeArrayFromTable($row);

        $salt = $this->passwordModel->salt;

        $realPassword = md5($this->password.$salt);

        $this->passwordModel->password = $realPassword;

        parent::login($this->passwordModel, GlobalAdapterFeature::getStaticAdapter());
    }

    public function logout()
    {
        $this->auth->getStorage()->clear();
        $this->auth->clearIdentity();
    }

    public function getLoginUser(){
        //TODO: repair this authentication after all
        return array(
            'staff_id' => '1',
            'staff_cd' => 'STAFF001',
            'staff_name' => 'TESTSTAFF',
            'branch_name' => 'TESTBRANCH', 
        );

        $data = array();

        if($this->auth->hasIdentity()){
            $this->passwordModel = $this->auth->getIdentity();
            
            $arr = $this->staffModel->get($this->passwordModel->staff_id);

            $this->staffModel->exchangeArrayFromTable($arr);
            
            $data['staff_id'] = $this->passwordModel->staff_id;
            $data['staff_cd'] = $this->staffModel->staffCd;
            $data['staff_name'] = $this->staffModel->staffName;

            $arr = $this->branchModel->get($this->staffModel->branchId);
            $this->branchModel->exchangeArrayFromTable($arr);

            $data['branch_name'] = $this->branchModel->branchName;

        }

        return $data;

    }

    public function isLogin()
    {
        //TODO: repair this authentication after all
        // return true;
        return $this->auth->hasIdentity();
    }

}
