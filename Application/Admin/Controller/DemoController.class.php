<?php
namespace Admin\Controller;
use Think\Controller;

class DemoController extends Controller {
    public function index(){
		$this->show("<a href='./add'>add</a><br /><a href='./read'>read</a>");
    }
	
	public function insert(){//添加数据
		$Form = M('demo');
		$Form->create();
		$result = $Form->add();
		if($result) {
			$this->success('操作成功！');
		}else{
			$this->error('写入错误！');
		}
	}
	
	public function read($id = 1){//读取数据，同select
		$Form = M('demo');
		//读取数据
		$data = $Form->find($id);
		//$Form->where('id=1')->getField('title');//直接获取
		if($data) {
			$this->data = $data;// 模板变量赋值
		}else{
			$this->error('没找到');
		}
		$this->display();
	}
}