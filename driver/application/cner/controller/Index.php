<?php
namespace app\cner\controller;
class Index extends Common{
    public function index(){
        return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
    public function loginout(){
        session(null);
        $this->redirect('Login/index');
    }
    public function checkpass(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('checkpass')->check($input)){
                $res=db('admin')->find();
                $pass=$res['password'];
                if(md5($input['o_password'])==$pass){
                    $passres=db('admin')->where('id',1)->update(['password'=>md5($input['password'])]);
                    if($passres){
                        return show(1,'修改成功');
                    }else{
                        return show(0,'修改失败');
                    }
                }else{
                    return show(0,'原密码错误');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            return $this->fetch();
        }
    }
    public function clearCache(){
        $res=$this->sss();
        if($res==1){
            return show(1,'请理成功');
        }else{
            return show(0,'清理失败');
        }
    }
    public function sss($path='./runtime/temp', $delDir = true) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }else {
            if (file_exists($path)) {
                return unlink($path);
            } else {
                return FALSE;
            }
        }
    }
}