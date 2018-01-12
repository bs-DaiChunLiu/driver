<?php
namespace app\cner\controller;
use app\cner\model\Category as CateModel;
class Category extends Common{
    protected $beforeActionList = [
        'delsoncate'  =>  ['only'=>'delete'],
    ];
    public function index(){
        $cate=db('category')->where('delete_time','eq',0)->order('sort desc')->select();
        $cateres=getTree($cate);
        $this->assign('cateres',$cateres);
        return $this->fetch();
    }
    public function add(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addCate')->check($input)){
                $res=db('category')->insert($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $cate=db('category')->order('sort desc')->select();
            $cateres=getTree($cate);
            $this->assign('cateres',$cateres);
            return $this->fetch();
        }
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addCate')->check($input)){
                $res=db('category')->where('id',$id)->update($input);
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
            $res=db('category')->where('id',$id)->find();
            $cate=db('category')->order('sort desc')->select();
            $cateres=getTree($cate);
            $this->assign('cateres',$cateres);
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
    public function delsoncate(){
        $cateid=input('get.id'); //要删除的当前栏目的id
        $cate=new CateModel();
        $sonids=$cate->getchilrenid($cateid);
        $allcateid=$sonids;
        $allcateid[]=$cateid;
        foreach ($allcateid as $k=>$v) {
            //$art=db('article')->where(array('cid'=>$v))->delete();
        }
        if($sonids) {
            db('category')->delete($sonids);
        }
    }
    public function delete(){
        $id=input('get.id');
        $res=model('Category')::destroy($id);
        if($res){
            return true;
        }else{
            return show(0,'删除失败');
        }
    }
}