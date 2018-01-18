<?php
namespace app\index\controller;
class Index extends Common
{
    public function index()
    {
        //广告
        $aderh=db('ader')->where('type','eq',0)->find();
        $aderf=db('ader')->where('type','eq',1)->find();
        $this->assign('aderh',$aderh);
        $this->assign('aderf',$aderf);
        //班型
        $carclass=db('carclass')->select();
        $this->assign('car',$carclass);
        //媒体声音
        $medium=db('medium')->select();
        $this->assign('ms',$medium);
        //学车场地
        $res=db('yard')->select();
        for($i=0;$i<count($res);$i++){
            $data[$i]['title']=$res[$i]['title'];
            $data[$i]['tel']=$res[$i]['tel'];
            $data[$i]['point']=$res[$i]['point'];
            $data[$i]['address']=$res[$i]['address'];
        }
        $this->assign('point',json_encode($data));
        return $this->fetch();
    }
    //关于我们
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
    //报名须知
    public function applynotice(){
        $res=db('apply')->find();
        $f=db('flow')->select();
        $this->assign('f',$f);
        $this->assign('apply',$res);
        return $this->fetch();
    }
    //加入我们
    public function joinme(){
        $res=db('joinme')->find();
        $this->assign('j',$res);
        return $this->fetch();
    }
    //学车场地
    public function yard(){
        $res=db('yard')->select();
        for($i=0;$i<count($res);$i++){
            $data[$i]['title']=$res[$i]['title'];
            $data[$i]['tel']=$res[$i]['tel'];
            $data[$i]['point']=$res[$i]['point'];
            $data[$i]['address']=$res[$i]['address'];
        }
        $this->assign('point',json_encode($data));
        return $this->fetch();
    }
    //咨询
    public function postman(){
        $data=input('post.');
        $data['create_time']=time();
        $res=db('callme')->insert($data);
        if($res){
            return show(1,'请耐心等候，稍后会有客服与你联系！');
        }else{
            return show(0,'咨询失败');
        }
    }
    public function getYardByDistrict(){
        $data=input('post.');
        if($data['district']=='null'){
            $res=db('yard')->select();
        }else{
            $res=db('yard')->where('district',$data['district'])->select();
        }
        if(!$res){
            $res['err']=0;
        }
        return json_encode($res);
    }
}
