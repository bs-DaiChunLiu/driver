<?php
namespace app\cner\validate;
use think\Validate;
class Validates extends Validate {
    protected $rule=[
        ['account','require','账号不能为空'],
        ['pass','require','密码不能为空'],
        ['code','require|captcha','验证码不能为空|验证码错误'],
        ['o_password','require','原密码不能为空'],
        ['n_password','require','新密码不能为空'],
        ['password','require|confirm:n_password','请确认密码|确认密码与新密码不一致'],
        ['img','require','图片不能为空'],
        ['type','require','广告类型不能为空']
    ];
    protected $scene=[
        'login'=>['account','pass','code'],
        'checkpass'=>['o_password','n_password','password'],
        'editAder'=>['img','type']
    ];
}