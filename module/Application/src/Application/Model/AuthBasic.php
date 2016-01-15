<?php

namespace Application\Model;

use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;

class AuthBasic extends ModelBasic
{

    protected $auth;

    public function __construct()
    {
        $this->auth = new AuthenticationService(
            new SessionStorage('user_auth'));
    }

    public function login( PasswordModel $password, $dbAdapter )
    {
        $authAdapter = new AuthAdapter($dbAdapter);

        $authAdapter
            ->setTableName('password')
            ->setIdentityColumn('staff_id')
            ->setCredentialColumn('password');

        $authAdapter
            ->setIdentity($password->staffId)
            ->setCredential($password->password);

        $result = $this->auth->authenticate($authAdapter);

        if($result->isValid()){
            $storage = $this->auth->getStorage();
            $storage->write($authAdapter->getResultRowObject());

        }else{
            throw new \Exception('パスワードが間違いました。');
        }
    }

    public function produceSalt($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }

        return $str;
    }
	

}