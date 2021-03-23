<?php

namespace Baojunev\Model\Order;


class ReceiverInfoDto extends \Baojunev\Model\Base
{
	//address 收件人地址
	public $address = null;
	//city city
	public $city = null;
	//mobile 用户手机号
	public $mobile = null;
	//name 收件人姓名
	public $name = null;
	//province province
	public $province = null;
	//sex 性别 1:男 2: 女 3: 保密
	public $sex = null;

	public function buildParams()
	{
		$params = array();

		//address 收件人地址
		if ($this->isNotNull($this->address)) {
			$params['address'] = $this->address;
		}
		//city city
		if ($this->isNotNull($this->city)) {
			$params['city'] = $this->city;
		}
		//mobile 用户手机号
		if ($this->isNotNull($this->mobile)) {
			$params['mobile'] = $this->mobile;
		}
		//name 收件人姓名
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		//province province
		if ($this->isNotNull($this->province)) {
			$params['province'] = $this->province;
		}
		//sex 性别 1:男 2: 女 3: 保密
		if ($this->isNotNull($this->sex)) {
			$params['sex'] = $this->sex;
		}

		return $params;
	}
}
