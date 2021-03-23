<?php

namespace Baojunev\Model\Merchant;


class StatusVo extends \Baojunev\Model\Base
{
	//id 对象 Id,可以为空，但不可以与请求修改的对象 ID 不匹配
	public $id = null;
	//status 状态,N:正常(默认) C:删除 E:异常
	public $status = null;

	public function buildParams()
	{
		$params = array();

		//id 对象 Id,可以为空，但不可以与请求修改的对象 ID 不匹配
		if ($this->isNotNull($this->id)) {
			$params['id'] = $this->id;
		}
		//status 状态,N:正常(默认) C:删除 E:异常
		if ($this->isNotNull($this->status)) {
			$params['status'] = $this->status;
		}
		return $params;
	}
}
