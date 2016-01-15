<?php
	
	$inputFilters = array(
        'post' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'post_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,10),
                ),
            ),

            array(
                'name'     => 'post_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),
        ),
		'branch' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'branch_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'branch_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'branch_kana',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::zenKanaValidator(),
                ),
            ),

            array(
                'name'     => 'branch_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'branch_postcode',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::postcodeValidator(),
                ),
            ),

            array(
                'name'     => 'branch_add1',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'branch_add2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),

                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'branch_fax',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::faxValidator(),
                ),
            ),

            // TODO: add validation for the select area_id

            array(
                'name'     => 'app_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'hotline_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'contact_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),


		),
		'tmpFmtHeader' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(

                'name'     => 'tmp_fmt_hd_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_hd_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_hd_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_hd_memo',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,200),
                ),
            ),


		),
		'tmpFmtData' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_data_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'tmp_fmt_data_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,50),
                ),

            ),

            array(
                'name'     => 'input_type_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_imput_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'set_mst_shop',
                'required' => true,

                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,30),

                ),
            ),

            array(
                'name'     => 'disp_num',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),


		),
		'tmpInputData' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_input_datas_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),

            ),

            array(
                'name'     => 'tmp_input_datas_disp',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),

            ),


		),
		'tmpInputHeader' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_input_hd_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'tmp_input_hd_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,50),
                ),

            ),

            array(
                'name'     => 'input_type_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

		),
		'tmpInputData' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'tmp_input_datas_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),

            ),

            array(
                'name'     => 'tmp_input_datas_disp',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),

            ),


		),
		'inputSetList' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'input_set_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'input_set_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                    Application\Validator\Validator::notEmptyValidator(),

                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),

            ),

            array(
                'name'     => 'max_value',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'min_value',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),


            array(
                'name'     => 'imp_value',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'imp_work',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),


		),
		'vendor' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'sup_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,10),
                ),
            ),

            array(
                'name'     => 'sup_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_abb',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'sup_postcode',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::postcodeValidator(),
                ),
            ),

            array(
                'name'     => 'sup_add1',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_add2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'sup_fax',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::faxValidator(),
                ),
            ),

            array(
                'name'     => 'sup_rep',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_crg',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_email',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),

            array(
                'name'     => 'sup_kana1',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_kana2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_kana3',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_kana4',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'sup_kana5',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'branch_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'staff_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'com_grade',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),
		), 
		'shop' => array(
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'shop_cl_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'shop_cl_child_num',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'shop_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_kana',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::zenKanaValidator(),
				),
			),
            array(
                'name'     => 'shop_postcode',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::postcodeValidator(),
                ),
            ),

            array(
                'name'     => 'shop_add1',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_add2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'shop_open_time1',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_close_time1',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_open_time2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_close_time2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'shop_open_comment',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_regular_holiday',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_map',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_gps',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'parking_comment',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_main_img',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'shop_comment',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                ),
            ),

            array(
                'name'     => 'sales_memo',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                ),
            ),

            array(
                'name'     => 'branch_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            // array(
                // 'name'     => 'shop_id',
                // 'required' => true,
                // 'filters'  => array(
                    // array('name' => 'Int'),
                // ),
            // ),

            array(
                'name'     => 'shop_cat',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'shop_cat2',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'shop_cat3',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),


		), 
		'staff' => array(
			
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'staff_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'staff_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'post_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'enroll_knd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),
            
            array(
                'name'     => 'staff_email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),


            array(
                'name'     => 'staff_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),
		), 

        'authentication' => array(
            array(
                'name'     => 'staff_email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),

            array(
                'name'     => 'password',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::passwordValidator(),
                ),
            ),

        ),

        'companyScale' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'com_grd_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,10),
                ),
            ),

            array(
                'name'     => 'com_grd_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),
        ), 

        'planCat' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'plan_cat_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'plan_cat_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: parent_plan_cat_id のselectのvalidationを実装
/*            array(
                'name'     => 'parent_plan_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: rank のselectのvalidationを実装
/*            array(
                'name'     => 'rank',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 

        'area' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'area_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'area_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'area_kana',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: pref_id のselectのvalidationを実装
/*            array(
                'name'     => 'pref_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: disp_flag のradioのvalidationを実装
/*            array(
                'name'     => 'disp_flag',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 

        'comCat' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'com_cat_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'com_cat_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: parent_com_cat_id のselectのvalidationを実装
/*            array(
                'name'     => 'parent_com_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 
		'vc' => array(
			array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'vc_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'vc_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_rep_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
			),
            array(
                'name'     => 'vc_postcode',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::postcodeValidator(),
                ),
            ),

            array(
                'name'     => 'vc_add1',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_add2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_add1',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_add2',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'vc_rep_email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),

            array(
                'name'     => 'vc_crg_name',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'vc_crg_email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),

            array(
                'name'     => 'vc_crg_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'vc_com_grd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'vc_anti_sotial',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'reg_staff',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'vc_busi_cat',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'contract_date',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                ),
            ),

            array(
                'name'     => 'expiration_date',
                'required' => false,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                ),
            ),

            array(
                'name'     => 'status',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'acount_cnt',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

		),

        'authentication' => array(
            array(
                'name'     => 'staff_email',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::mailaddressValidator(),
                ),
            ),

            array(
                'name'     => 'password',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::passwordValidator(),
                ),
            ),

        ),

        'companyScale' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'com_grd_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,10),
                ),
            ),

            array(
                'name'     => 'com_grd_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),
        ), 

        'planCat' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'plan_cat_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'plan_cat_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: parent_plan_cat_id のselectのvalidationを実装
/*            array(
                'name'     => 'parent_plan_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: rank のselectのvalidationを実装
/*            array(
                'name'     => 'rank',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 

        'area' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'area_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'area_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            array(
                'name'     => 'area_kana',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: pref_id のselectのvalidationを実装
/*            array(
                'name'     => 'pref_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: disp_flag のradioのvalidationを実装
/*            array(
                'name'     => 'disp_flag',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 

        'comCat' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'com_cat_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'com_cat_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: parent_com_cat_id のselectのvalidationを実装
/*            array(
                'name'     => 'parent_com_cat_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
        ), 

        'fm' => array(
            
            array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            ),

            array(
                'name'     => 'fm_cd',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'fm_child_num',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,20),
                ),
            ),

            array(
                'name'     => 'fm_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),

            //TODO: brand_id のselectのvalidationを実装
/*            array(
                'name'     => 'brand_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
            //TODO: brand_id のselectのvalidationを実装
/*            array(
                'name'     => 'area_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/



            array(
                'name'     => 'issue_amount',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::digitsValidator(),
                ),
            ),

            array(
                'name'     => 'app_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'hotline_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            array(
                'name'     => 'contact_tel',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::telValidator(),
                ),
            ),

            //TODO: base_issue_date のnumberのvalidationを実装
/*            array(
                'name'     => 'base_issue_date',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: proof_date のnumberのvalidationを実装
/*            array(
                'name'     => 'proof_date',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
            //TODO: datasend_date のnumberのvalidationを実装
/*            array(
                'name'     => 'datasend_date',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/
            //TODO: kampf_date のnumberのvalidationを実装
/*            array(
                'name'     => 'kampf_date',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

            //TODO: issue_base_sch_id のselectのvalidationを実装
/*            array(
                'name'     => 'issue_base_sch_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    Application\Validator\Validator::notEmptyValidator(),
                    Application\Validator\Validator::stringLengthValidator(1,100),
                ),
            ),*/

        ), 

	);



?>
