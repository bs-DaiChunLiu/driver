<?php
namespace app\cner\controller;
class Ensure extends Common{
    public function index(){
        $res=db('ensure')->select();
        $this->assign('en',$res);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addEnsure')->check($input)){
                $res=db('ensure')->where('id',$id)->update($input);
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
            $res=db('ensure')->where('id',$id)->find();
            $this->assign('e',$res);
            return $this->fetch();
        }
    }
}