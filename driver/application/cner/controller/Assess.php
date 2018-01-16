<?php
namespace app\cner\controller;
class Assess extends Common{
    public function index(){
        $res=db('assess')->paginate(10);
        $this->assign('as',$res);
        return $this->fetch();
    }
    public function add(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addAssess')->check($input)){
                $res=db('assess')->insert($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            return $this->fetch();
        }
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addAssess')->check($input)){
                $res=db('assess')->where('id',$id)->update($input);
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
            $res=db('assess')->where('id',$id)->find();
            $this->assign('a',$res);
            return $this->fetch();
        }
    }
    public function delete(){
        $id=input('get.id');
        $res=db('assess')->where('id',$id)->delete();
        if($res){
            return true;
        }else{
            return show(0,'删除失败');
        }
    }
}