<?php

namespace Baojunev\Model\Order;


class BuyerInfoDto extends \Baojunev\Model\Base
{
	//idCard 身份证号
	public $idCard = null;
	//mobile 用户手机号
	public $mobile = null;
	//name 用户姓名
	public $name = null;
	//userId userId
	public $userId = null;
	//userIdTdc userIdTdc
	public $userIdTdc = null;

	public function buildParams()
	{
		$params = array();

		//idCard 身份证号
		if ($this->isNotNull($this->idCard)) {
			$params['idCard'] = $this->idCard;
		}
		//mobile 用户手机号
		if ($this->isNotNull($this->mobile)) {
			$params['mobile'] = $this->mobile;
		}
		//name 用户姓名
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		//userId userId
		if ($this->isNotNull($this->userId)) {
			$params['userId'] = $this->userId;
		}
		//userIdTdc userIdTdc
		if ($this->isNotNull($this->userIdTdc)) {
			$params['userIdTdc'] = $this->userIdTdc;
		}

		return $params;
	}
}
