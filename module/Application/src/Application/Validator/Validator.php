<?php

namespace Application\Validator;

class Validator
{
    /**
     * emptyのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function notEmptyValidator()
    {
        return array(
            'name'                   =>'NotEmpty',
            'break_chain_on_failure' => true,
            'options'                => array(
                'messages' => array(
                    \Zend\Validator\NotEmpty::IS_EMPTY => '項目は必須です',
                )
            )
        );
    }

    /**
     * 半角数字のバリデータ
     *
     * @return array バリデータのspec
     */
    public static function digitsValidator()
    {
        return array(
            'name'                   =>'Digits',
            'break_chain_on_failure' => true,
            'options'                => array(
                'messages' => array(
                    \Zend\Validator\Digits::NOT_DIGITS => '半角数字のみを入力して下さい',
                )
            )
        );
    }

    /**
     * 範囲のバリデータ
     *
     * @param string $fromField 範囲開始フィールド名
     * @param string $toField 範囲終了フィールド名
     * @return array バリデータのspec
     */
    public static function rangeValidator($fromField, $toField)
    {
        return array(
            'name' => 'Callback',
            'break_chain_on_failure' => true,
            'options' => array(
                'messages' => array(
                    \Zend\Validator\Callback::INVALID_VALUE => '範囲を正しく指定して下さい',
                ),
                'callback' => function($value, $context=array()) use ($fromField, $toField) {
                    $from = $context[$fromField];
                    $to = $context[$toField];
                    if ($from && $to) {
                        return $from <= $to;
                    } else {
                        return true;
                    }
                },
            ),
        );
    }

    /**
     * 時刻のバリデータ
     *
     * @return array バリデータのspec
     */
    public static function timeValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^(([0-1]+[0-9])|(2[0-3])):([0-5]+[0-9])$/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => '時刻を「HH:MM」の形式で入力して下さい'
                )
            )
        );
    }

    /**
     * 全角カナのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function zenKanaValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern'  => '/^[ァ-ヾ]+$/u',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => '全角カナを入力して下さい'
                )
            )
        );
    }

    /**
     * 日付のバリデータ
     *
     * @return array バリデータのspec
     */
    public static function dateValidator()
    {
        $msg = '日付を「yyyy/mm/dd」の形式で入力して下さい';
        return array(
            'name'                   => 'Date',
            'break_chain_on_failure' => true,
            'options'                => array(
                'format'  => 'Y/m/d',
                'messages' => array(
                    \Zend\Validator\Date::INVALID =>  $msg,
                    \Zend\Validator\Date::INVALID_DATE => $msg,
                    \Zend\Validator\Date::FALSEFORMAT => $msg,
                )
            )
        );
    }

    /**
     * StringのLengthのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function stringLengthValidator($min = 1, $max = 100)
    {
        return array(
            'name'    => 'StringLength',
            'break_chain_on_failure' => true,
            'options' => array(
                'encoding' => 'UTF-8',
                'min'      => $min,
                'max'      => $max,
                'messages' => array(
                    \Zend\Validator\StringLength::TOO_SHORT => "$min 文字以上で入力してください",
                    \Zend\Validator\StringLength::TOO_LONG => "$max 文字以下で入力してください",
                ),
            ),
        );
    }

    /**
     * 電話番号のバリデータ
     *
     * @return array バリデータのspec
     */
    public static function telValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^0([0-9]{1,4})-([0-9]{4})-([0-9]{4})$/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => 'XX-XXXX-XXXXの形式で入力して下さい'
                )
            )
        );
    }

    /**
     * FAXのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function faxValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^0([0-9]{1,4})-([0-9]{4})-([0-9]{4})$/',
                //'pattern'  => '0\d{1,4}-\d{1,4}-\d{4}',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => 'XX-XXXX-XXXXの形式で入力して下さい'
                )
            )
        );
    }

    /**
     * 郵便番号のバリデータ
     *
     * @return array バリデータのspec
     */
    public static function postcodeValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^([0-9]{3})-([0-9]{4})$/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => 'XXX-XXXXの形式で入力して下さい'
                )
            )
        );
    }

    /**
     * メールアドレスのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function mailaddressValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => 'メールアドレスの形式が間違いました'
                )
            )
        );
    }

    /**
     * パスワードのバリデータ
     *
     * @return array バリデータのspec
     */
    public static function passwordValidator()
    {
        return array(
            'name'                   => 'Regex',
            'break_chain_on_failure' => true,
            'options'                => array(
                'pattern' => '/^[A-Za-z0-9]{8,16}\z/',
                'messages' => array(
                    \Zend\Validator\Regex::NOT_MATCH => '半角英数8~16文字で入力してください'
                )
            )
        );
    }

}