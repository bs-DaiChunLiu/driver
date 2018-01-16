<?php
namespace app\cner\controller;
class Ader extends Common{
    public function index(){
        $res=db('ader')->select();
        $this->assign('ader',$res);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addAder')->check($input)){
                $res=db('ader')->where('id',$id)->update($input);
                if($res){
                    return show(1,'修改成功');
                }else{
                    return show(0,'修改失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $id=input('get.id');
            $res=db('ader')->where('id',$id)->find();
            $this->assign('ader',$res);
            return $this->fetch();
        }
    }
}