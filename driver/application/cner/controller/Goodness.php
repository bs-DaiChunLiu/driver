<?php
namespace app\cner\controller;
class Goodness extends Common{
    public function index(){
        $res=db('goodness')->select();
        $this->assign('gn',$res);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addEnsure')->check($input)){
                $res=db('goodness')->where('id',$id)->update($input);
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
            $res=db('goodness')->where('id',$id)->find();
            $this->assign('g',$res);
            return $this->fetch();
        }
    }
}