<?php
namespace app\cner\controller;
class Carclass extends Common{
    public function index(){
        $res=db('carclass')->select();
        $this->assign('car',$res);
        return $this->fetch();
    }
    /*
     * 展示班型内容
     * */
    public function classhow(){
        $id=input('get.id');
        $res=db('classcont')->where('class_id',$id)->select();
        $this->assign('cid',$id);
        $this->assign('car',$res);
        return $this->fetch();
    }
    /*
     * 添加班型内容
     * */
    public function classcontadd(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addcarclass')->check($input)){
                $res=db('carclass')->insert($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else {
            $id = input('get.id');
            $this->assign('c', $id);
            return $this->fetch();
        }
    }
    public function add(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addcarclass')->check($input)){
                $res=db('carclass')->insert($input);
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
            if($validate->scene('addcarclass')->check($input)){
                $res=db('carclass')->where('id',$id)->update($input);
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
            $res=db('carclass')->find($id);
            $this->assign('c',$res);
            return $this->fetch();
        }
    }
}