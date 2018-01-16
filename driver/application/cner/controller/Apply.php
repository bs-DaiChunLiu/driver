<?php
namespace app\cner\controller;
class Apply extends Common{
    public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addApply')->check($input)){
                $res=db('apply')->where('id',$id)->update($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $res=db('apply')->find();
            $this->assign('a',$res);
            return $this->fetch();
        }
    }
    public function flow(){
        $res=db('flow')->select();
        $this->assign('as',$res);
        return $this->fetch();
    }
    public function flowedit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addFlow')->check($input)){
                $res=db('flow')->where('id',$id)->update($input);
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
            $res=db('flow')->where('id',$id)->find();
            $this->assign('f',$res);
            return $this->fetch();
        }
    }
}