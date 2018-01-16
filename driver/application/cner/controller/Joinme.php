<?php
namespace app\cner\controller;
class Joinme extends Common{
	public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addJoinme')->check($input)){
                $res=db('joinme')->where('id',$id)->update($input);
                if($res){
                    return show(1,'修改成功');
                }else{
                    return show(0,'修改失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $res=db('joinme')->find();
            $this->assign('j',$res);
            return $this->fetch();
        }
	}
}