<?php
namespace app\cner\controller;
class Suggest extends Common{
    public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('suggest')->check($input)){
                $res=db('suggest')->where('id',$id)->update($input);
                if($res){
                    return show(1,'修改成功');
                }else{
                    return show(0,'修改失败');
                }
            }
        }else{
            $res=db('suggest')->find();
            $this->assign('s',$res);
            return $this->fetch();
        }
    }
}