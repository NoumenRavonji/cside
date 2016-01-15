<?php

namespace Application\Model\Data;

use Application\Model\ShopModel;
use Application\Model\AuthModel;

class MstShopTable extends TableModel
{
	protected $name = 'mst_shop';

	public function searchRecord($pageNo,ShopModel $shop)
	{
		$data = array(
			'id' => $shop->id,
            'shop_cl_id' => $shop->shopClId,
            'shop_cl_child_num' => $shop->shopClChildNum,
            'shop_cd' => $shop->shopCd,
            'shop_name' => $shop->shopName,
            'shop_kana' => $shop->shopKana,
            'shop_postcode' => $shop->shopPostcode,
            'shop_add1' => $shop->shopAdd1,
            'shop_add2' => $shop->shopAdd2,
            'shop_tel' => $shop->shopTel,
            'shop_open_time1' => $shop->shopOpenTime1,
            'shop_close_time1' => $shop->shopCloseTime1,
            'shop_open_time2' => $shop->shopOpenTime2,
            'shop_close_time2' => $shop->shopCloseTime2,
            'shop_open_comment' => $shop->shopOpenComment,
            'regular_holiday' => $shop->regularHoliday,
            'shop_map' => $shop->shopMap,
            'shop_gps' => $shop->shopGps,
            'parking_comment' => $shop->parkingComment,
            'shop_main_img' => $shop->shopMainImg,
            'shop_cat' => $shop->shopCat,
            'shop_comment' => $shop->shopComment,
            'sales_memo' => $shop->salesMemo,
            'branch_id' => $shop->branchId,
            'staff_id' => $shop->staffId,
            'shop_cat_sub' => $shop->shopCatSub,
            'shop_cat2' => $shop->shopCat2,
            'shop_cat3' => $shop->shopCat3,
        );

		return $this->searchRecordByData($pageNo, $data);

	}

	public function saveRecord(ShopModel $shop, AuthModel $auth)
	{

		$data = array(
			'id' => $shop->id,
            'shop_cl_id' => $shop->shopClId,
            'shop_cl_child_num' => $shop->shopClChildNum,
            'shop_cd' => $shop->shopCd,
            'shop_name' => $shop->shopName,
            'shop_kana' => $shop->shopKana,
            'shop_postcode' => $shop->shopPostcode,
            'shop_add1' => $shop->shopAdd1,
            'shop_add2' => $shop->shopAdd2,
            'shop_tel' => $shop->shopTel,
            'shop_open_time1' => $shop->shopOpenTime1,
            'shop_close_time1' => $shop->shopCloseTime1,
            'shop_open_time2' => $shop->shopOpenTime2,
            'shop_close_time2' => $shop->shopCloseTime2,
            'shop_open_comment' => $shop->shopOpenComment,
            'regular_holiday' => $shop->regularHoliday,
            'shop_map' => $shop->shopMap,
            'shop_gps' => $shop->shopGps,
            'parking_comment' => $shop->parkingComment,
            'shop_main_img' => $shop->shopMainImg,
            'shop_cat' => $shop->shopCat,
            'shop_comment' => $shop->shopComment,
            'sales_memo' => $shop->salesMemo,
            'branch_id' => $shop->branchId,
            'staff_id' => $shop->staffId,
            'shop_cat_sub' => $shop->shopCatSub,
            'shop_cat2' => $shop->shopCat2,
            'shop_cat3' => $shop->shopCat3,
        );

        return $this->saveRecordByData($shop->id, $data ,$auth);

	}

}