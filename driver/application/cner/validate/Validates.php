<?php
namespace app\cner\validate;
use think\Validate;
class Validates extends Validate {
    protected $rule=[
        ['account','require','账号不能为空'],
        ['pass','require','密码不能为空'],
        ['code','require|captcha','验证码不能为空|验证码错误'],
        ['name','require','名称不能为空'],
        ['img','require','缩略图不能为空'],
        ['title','require','标题不能为空'],
        ['content','require','内容不能为空'],
        ['imgs','require','图片不能为空'],
        ['des','require','简介不能为空'],
        ['enname','require|unique:conf','英文名称不能为空|英文名称不能重复'],
        ['cnname','require|unique:conf','中文名称不能为空|中文名称不能重复'],
        ['enname1','require','英文名称不能为空'],
        ['cnname1','require','中文名称不能为空'],
        ['type','require','类型不能为空'],
        ['longitude','require','经度不能为空'],
        ['latitude','require','纬度不能为空'],
        ['o_password','require','原密码不能为空'],
        ['n_password','require','新密码不能为空'],
        ['password','require|confirm:n_password','请确认密码|确认密码与新密码不一致'],
        ['copyright','require','版权信息不能为空'],
        ['desc','require','网站简介不能为空'],
        ['keyword','require','网站关键词不能为空'],
        ['value','require','配置信息不能为空'],
    ];
    protected $scene=[
        'login'=>['account','pass','code'],
        'addCate'=>['name'],
        'addAder'=>['img'],
        'addArt'=>['content','des'],
        'addsWord'=>['content'],
        'addImg'=>['title','imgs'],
        'addConf'=>['cname','keyword','desc','copyright'],
        'editConf'=>['value',],
        'addCall'=>['bai_url','bai_urls','content'],
        'checkpass'=>['o_password','n_password','password'],
        'addcarclass'=>['name','des'],
    ];
}