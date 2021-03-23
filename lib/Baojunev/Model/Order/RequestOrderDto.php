<?php

namespace Baojunev\Model\Order;


class RequestOrderDto extends \Baojunev\Model\Base
{
	/**
	 * buyerInfo
	 *@var \Baojunev\Model\Order\BuyerInfoDto
	 */
	public $buyerInfo = null;
	//orderDevice 下单设备 1:IOS 2:安卓 3:PC 4:公众号 5:小程序
	public $orderDevice = null;
	//orderNo 主订单号
	public $orderNo = null;
	//orderScene 订单场景 0: 线上 1 线下
	public $orderScene = null;
	//orderSource 订单来源 A1:丰车 A2:酷屏 A3:工会小程序 A4:TDC A5:体验小程序A6:云漾
	public $orderSource = null;
	//orderStoreCode 商品门店 code
	public $orderStoreCode = null;
	//orderStoreName 商品门店名称
	public $orderStoreName = null;
	//payAmount 待支付金额
	public $payAmount = null;
	/**
	 * receiverInfo
	 *@var \Baojunev\Model\Order\ReceiverInfoDto
	 */
	public $receiverInfo = null;
	/**
	 * subOrders array
	 */
	public $subOrders = null;
	public function buildParams()
	{
		$params = array();

		//buyerInfo
		if ($this->isNotNull($this->buyerInfo)) {
			$params['buyerInfo'] = $this->buyerInfo->buildParams();
		}
		//orderDevice 下单设备 1:IOS 2:安卓 3:PC 4:公众号 5:小程序
		if ($this->isNotNull($this->orderDevice)) {
			$params['orderDevice'] = $this->orderDevice;
		}
		//orderNo 主订单号
		if ($this->isNotNull($this->orderNo)) {
			$params['orderNo'] = $this->orderNo;
		}
		//orderScene 订单场景 0: 线上 1 线下
		if ($this->isNotNull($this->orderScene)) {
			$params['orderScene'] = $this->orderScene;
		}
		//orderSource 订单来源 A1:丰车 A2:酷屏 A3:工会小程序 A4:TDC A5:体验小程序A6:云漾
		if ($this->isNotNull($this->orderSource)) {
			$params['orderSource'] = $this->orderSource;
		}
		//orderStoreCode 商品门店 code
		if ($this->isNotNull($this->orderStoreCode)) {
			$params['orderStoreCode'] = $this->orderStoreCode;
		}
		//orderStoreName 商品门店名称
		if ($this->isNotNull($this->orderStoreName)) {
			$params['orderStoreName'] = $this->orderStoreName;
		}
		//payAmount 待支付金额
		if ($this->isNotNull($this->payAmount)) {
			$params['payAmount'] = $this->payAmount;
		}
		//receiverInfo
		if ($this->isNotNull($this->receiverInfo)) {
			$params['receiverInfo'] = $this->receiverInfo->buildParams();
		}
		//subOrders
		if ($this->isNotNull($this->subOrders)) {
			//\Baojunev\Model\Order\SubOrderDto
			foreach ($this->subOrders as $subOrder) {
				$params['subOrders'][] = $subOrder->buildParams();
			}
		}

		return $params;
	}
}
