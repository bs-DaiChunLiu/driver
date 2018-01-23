<?php
namespace app\index\validate;
use think\Validate;
class Validates extends Validate
{
    protected $rule = [
         ['phone','require|isMobile','手机号不能为空|手机号格式错误']
    ];
    protected $scene=[
    	'mobile'=>['phone'],
    ];
    protected function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
}