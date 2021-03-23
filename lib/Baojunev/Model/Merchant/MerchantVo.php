<?php

namespace Baojunev\Model\Merchant;


class MerchantVo extends \Baojunev\Model\Base
{
	//cert_id 证件号
	public $cert_id = null;
	//cert_type 证件类型,营业执照-01 税务登记证-02 组织机构代码证-03 统一社会信用代码-04 人个身份证-05
	public $cert_type = null;
	//contact_mobile 联系人手机号
	public $contact_mobile = null;
	//contact_name 联系人
	public $contact_name = null;
	//name 商户名称
	public $name = null;
	//role 用户角色,01-企业商户 02-个体工商户 03-个人用户 04-中间账户
	public $role = null;
	//guarantee_deposit 保证金
	public $guarantee_deposit = null;

	public function buildParams()
	{
		$params = array();

		//cert_id 证件号
		if ($this->isNotNull($this->cert_id)) {
			$params['cert_id'] = $this->cert_id;
		}
		//cert_type 证件类型,营业执照-01 税务登记证-02 组织机构代码证-03 统一社会信用代码-04 人个身份证-05
		if ($this->isNotNull($this->cert_type)) {
			$params['cert_type'] = $this->cert_type;
		}
		//contact_mobile 联系人手机号
		if ($this->isNotNull($this->contact_mobile)) {
			$params['contact_mobile'] = $this->contact_mobile;
		}
		//contact_name 联系人
		if ($this->isNotNull($this->contact_name)) {
			$params['contact_name'] = $this->contact_name;
		}
		//name 商户名称
		if ($this->isNotNull($this->name)) {
			$params['name'] = $this->name;
		}
		//role 用户角色,01-企业商户 02-个体工商户 03-个人用户 04-中间账户
		if ($this->isNotNull($this->role)) {
			$params['role'] = $this->role;
		}
		//guarantee_deposit 保证金
		if ($this->isNotNull($this->guarantee_deposit)) {
			$params['guarantee_deposit'] = $this->guarantee_deposit;
		}

		return $params;
	}
}
