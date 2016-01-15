<?php
namespace Application\Model;

class ShopModel extends ModelBasic
{

    public $id;
    public $shopClId;
    public $shopClChildNum;
    public $shopCd;
    public $shopName;
    public $shopKana;
    public $shopPostcode;
    public $shopAdd1;
    public $shopAdd2;
    public $shopTel;
    public $shopOpenTime1;
    public $shopCloseTime1;
    public $shopOpenTime2;
    public $shopCloseTime2;
    public $shopOpenComment;
    public $regularHoliday;
    public $shopMap;
    public $shopGps;
    public $parkingComment;
    public $shopMainImg;
    public $shopCat;
    public $shopComment;
    public $salesMemo;
    public $staffId;
    public $branchId;
    public $shopCatSub;
    public $shopCat2;
    public $shopCat3;


    public function __construct($data = null){
        $this->myTable = $data['shopTable'];
    }


    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->shopClId     = (!empty($data['shop_cl_id'])) ? $data['shop_cl_id'] : null;
        $this->shopClChildNum     = (!empty($data['shop_cl_child_num'])) ? $data['shop_cl_child_num'] : null;
        $this->shopCd     = (!empty($data['shop_cd'])) ? $data['shop_cd'] : null;
        $this->shopName     = (!empty($data['shop_name'])) ? $data['shop_name'] : null;
        $this->shopKana     = (!empty($data['shop_kana'])) ? $data['shop_kana'] : null;
        $this->shopPostcode     = (!empty($data['shop_postcode'])) ? $data['shop_postcode'] : null;
        $this->shopAdd1     = (!empty($data['shop_add1'])) ? $data['shop_add1'] : null;
        $this->shopAdd2     = (!empty($data['shop_add2'])) ? $data['shop_add2'] : null;
        $this->shopTel     = (!empty($data['shop_tel'])) ? $data['shop_tel'] : null;
        $this->shopOpenTime1     = (!empty($data['shop_open_time1'])) ? $data['shop_open_time1'] : null;
        $this->shopCloseTime1     = (!empty($data['shop_close_time1'])) ? $data['shop_close_time1'] : null;
        $this->shopOpenTime2     = (!empty($data['shop_open_time2'])) ? $data['shop_open_time2'] : null;
        $this->shopCloseTime2     = (!empty($data['shop_close_time2'])) ? $data['shop_close_time2'] : null;
        $this->shopOpenComment     = (!empty($data['shop_open_comment'])) ? $data['shop_open_comment'] : null;
        $this->regularHoliday     = (!empty($data['regular_holiday'])) ? $data['regular_holiday'] : null;
        $this->shopMap     = (!empty($data['shop_map'])) ? $data['shop_map'] : null;
        $this->shopGps     = (!empty($data['shop_gps'])) ? $data['shop_gps'] : null;
        $this->parkingComment     = (!empty($data['parking_comment'])) ? $data['parking_comment'] : null;
        $this->shopMainImg     = (!empty($data['shop_main_img'])) ? $data['shop_main_img'] : null;
        $this->shopCat     = (!empty($data['shop_cat'])) ? $data['shop_cat'] : null;
        $this->shopComment     = (!empty($data['shop_comment'])) ? $data['shop_comment'] : null;
        $this->salesMemo     = (!empty($data['sales_memo'])) ? $data['sales_memo'] : null;
        $this->branchId     = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->staffId     = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->shopCatSub     = (!empty($data['shop_cat_sub'])) ? $data['shop_cat_sub'] : null;
        $this->shopCat2     = (!empty($data['shop_cat2'])) ? $data['shop_cat2'] : null;
        $this->shopCat3     = (!empty($data['shop_cat3'])) ? $data['shop_cat3'] : null;
    }

    public function exchangeArrayFromTable($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->shopClId     = (!empty($data['shop_cl_id'])) ? $data['shop_cl_id'] : null;
        $this->shopClChildNum     = (!empty($data['shop_cl_child_num'])) ? $data['shop_cl_child_num'] : null;
        $this->shopCd     = (!empty($data['shop_cd'])) ? $data['shop_cd'] : null;
        $this->shopName     = (!empty($data['shop_name'])) ? $data['shop_name'] : null;
        $this->shopKana     = (!empty($data['shop_kana'])) ? $data['shop_kana'] : null;
        $this->shopPostcode     = (!empty($data['shop_postcode'])) ? $data['shop_postcode'] : null;
        $this->shopAdd1     = (!empty($data['shop_add1'])) ? $data['shop_add1'] : null;
        $this->shopAdd2     = (!empty($data['shop_add2'])) ? $data['shop_add2'] : null;
        $this->shopTel     = (!empty($data['shop_tel'])) ? $data['shop_tel'] : null;
        $this->shopOpenTime1     = (!empty($data['shop_open_time1'])) ? $data['shop_open_time1'] : null;
        $this->shopCloseTime1     = (!empty($data['shop_close_time1'])) ? $data['shop_close_time1'] : null;
        $this->shopOpenTime2     = (!empty($data['shop_open_time2'])) ? $data['shop_open_time2'] : null;
        $this->shopCloseTime2     = (!empty($data['shop_close_time2'])) ? $data['shop_close_time2'] : null;
        $this->shopOpenComment     = (!empty($data['shop_open_comment'])) ? $data['shop_open_comment'] : null;
        $this->regularHoliday     = (!empty($data['regular_holiday'])) ? $data['regular_holiday'] : null;
        $this->shopMap     = (!empty($data['shop_map'])) ? $data['shop_map'] : null;
        $this->shopGps     = (!empty($data['shop_gps'])) ? $data['shop_gps'] : null;
        $this->parkingComment     = (!empty($data['parking_comment'])) ? $data['parking_comment'] : null;
        $this->shopMainImg     = (!empty($data['shop_main_img'])) ? $data['shop_main_img'] : null;
        $this->shopCat     = (!empty($data['shop_cat'])) ? $data['shop_cat'] : null;
        $this->shopComment     = (!empty($data['shop_comment'])) ? $data['shop_comment'] : null;
        $this->salesMemo     = (!empty($data['sales_memo'])) ? $data['sales_memo'] : null;
        $this->branchId     = (!empty($data['branch_id'])) ? $data['branch_id'] : null;
        $this->staffId     = (!empty($data['staff_id'])) ? $data['staff_id'] : null;
        $this->shopCatSub     = (!empty($data['shop_cat_sub'])) ? $data['shop_cat_sub'] : null;
        $this->shopCat2     = (!empty($data['shop_cat2'])) ? $data['shop_cat2'] : null;
        $this->shopCat3     = (!empty($data['shop_cat3'])) ? $data['shop_cat3'] : null;
    }
    
}