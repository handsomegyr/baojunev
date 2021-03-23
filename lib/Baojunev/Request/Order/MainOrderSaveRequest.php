<?php

namespace Baojunev\Request\Order;

/**
 * 订单下单
 * 接口说明:将订单信息传递给订单中心。
 * 订单中心的订单分三层结构，下单前需要做相应的适配。
 * 接口地址:{base-path}/api/mainOrder/save
 * 请求方式：POST
 * consumes:``
 * produces:["application/json;charset=UTF-8"]
 */
class MainOrderSaveRequest extends \Baojunev\Request\Base
{
	// API名
	protected $request_method = "POST";

	protected $urlType = 2;

	protected function getUrl()
	{
		return "api/mainOrder/save";
	}

	// 请求参数
	/**
	 * @var \Baojunev\Model\Order\RequestOrderDto
	 */
	public $requestOrder = null;

	public function buildParams()
	{
		$params = array();

		if ($this->isNotNull($this->requestOrder)) {
			$params = $this->requestOrder->buildParams();
		}
		return $params;
	}
}
