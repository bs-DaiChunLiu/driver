<?php
namespace app\cner\controller;
use think\Controller;
class Login extends Controller{
    public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $account=$input['account'];
            $pass=$input['pass'];
            $res=db('admin')->where('account',$account)->find();
            $validate=validate('Validates');
            if($validate->scene('login')->check($input)){
                if($res){
                    if($res['password']!=md5($pass)){
                        return show(0,'密码错误');
                    }else{
                        session('user',$res);
                        return show(1,'登录成功');
                    }
                }else{
                    return show(0,'管理员不存在');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            return $this->fetch();
        }
    }
}