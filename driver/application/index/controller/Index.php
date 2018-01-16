<?php
namespace app\index\controller;
use think\Controller;
class Index extends Common
{
    public function index()
    {
        //广告
        $aderh=db('ader')->where('type','eq',0)->find();
        $aderf=db('ader')->where('type','eq',1)->find();
        $this->assign('aderh',$aderh);
        $this->assign('aderf',$aderf);
        //公司介绍
        $suggest=db('suggest')->find();
        $this->assign('s',$suggest);
        //三大保障
        $ensure=db('ensure')->select();
        $this->assign('e',$ensure);
        //七大优势
        $goodness=db('goodness')->select();
        $this->assign('g',$goodness);
        //班型
        $carclass=db('carclass')->select();
        $this->assign('car',$carclass);
        //学员评价
        $assess=db('assess')->select();
        $this->assign('as',$assess);
        //媒体声音
        $medium=db('medium')->select();
        $this->assign('ms',$medium);
        return $this->fetch();
    }
    public function aboutme(){
        $am=db('aboutme')->find();
        $this->assign('am',$am);
        //媒体声音
        $medium=db('medium')->select();
        $this->assign('ms',$medium);
        //领导视察
        $leader=db('leader')->where('type','eq',0)->order('sort','desc')->select();
        $leaderr=db('leader')->where('type','eq',1)->order('sort','desc')->select();
        $this->assign('ll',$leader);
        $this->assign('lr',$leaderr);
        return $this->fetch();
    }
    public function applynotice(){
        $res=db('apply')->find();
        $f=db('flow')->select();
        $this->assign('f',$f);
        $this->assign('apply',$res);
        return $this->fetch();
    }
    public function joinme(){
        $res=db('joinme')->find();
        $this->assign('j',$res);
        return $this->fetch();
    }
    public function yard(){
        return $this->fetch();
    }
}
