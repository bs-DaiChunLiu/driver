<?php
namespace app\cner\model;
use think\Model;
class Category extends Model{
    protected $deleteTime = 'delete_time';
    public function getchilrenid($cateid){
        $cateres=self::select();
        return $this->_getchilrenid($cateres,$cateid);
    }

    public function _getchilrenid($cateres,$cateid){
        static $arr=array();
        foreach ($cateres as $k => $v) {
            if($v['pid'] == $cateid){
                $arr[]=$v['id'];
                $this->_getchilrenid($cateres,$v['id']);
            }
        }
        return $arr;
    }
}