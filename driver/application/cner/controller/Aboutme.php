<?php
namespace app\cner\controller;
class Aboutme extends Common{
    public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addAboutme')->check($input)){
                $res=db('aboutme')->where('id',$id)->update($input);
                if($res){
                    return show(1,'修改成功');
                }else{
                    return show(0,'修改失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $res=db('aboutme')->find();
            $this->assign('am',$res);
            return $this->fetch();
        }
    }
    public function leader(){
        $res=db('leader')->select();
        $this->assign('ls',$res);
        return $this->fetch();
    }
    public function ledit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addLeader')->check($input)){
                $res=db('leader')->where('id',$id)->update($input);
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
            $res=db('leader')->where('id',$id)->find();
            $this->assign('l',$res);
            return $this->fetch();
        }
    }
}