<?php

namespace Baojunev\Model\Order;


class SubOrderDto extends \Baojunev\Model\Base
{
	//couponAmount 优惠金额
	public $couponAmount = null;
	//discountAmount 折扣金额
	public $discountAmount = null;
	//expressFee 运费
	public $expressFee = null;
	//extraDiscountAmount 额外优惠金额
	public $extraDiscountAmount = null;
	//extraDiscountReason 优惠原因
	public $extraDiscountReason = null;
	//merchantId 商家 ID(走平安渠道必输)
	public $merchantId = null;
	//merchantName 供应商名称(走平安渠道必输)
	public $merchantName = null;
	//orderAmount 订单金额
	public $orderAmount = null;
	//orderItems array
	public $orderItems = null;
	//orderNo 子订单号
	public $orderNo = null;
	//orderType 订单类型 6 : 体验车押金 7: 充电小程序 8 : 酷屏，13:新宝骏公帐支付 15 二手车服务费 20 二手车
	public $orderType = null;
	//payAmount 待支付金额
	public $payAmount = null;
	//payType 支付方式 0 全款 1 定金 2 分期
	public $payType = null;
	//thirdPartyMerchantId 第三方商家 ID（接入方的商家 ID）
	public $thirdPartyMerchantId = null;

	public function buildParams()
	{
		$params = array();

		//couponAmount 优惠金额
		if ($this->isNotNull($this->couponAmount)) {
			$params['couponAmount'] = $this->couponAmount;
		}
		//discountAmount 折扣金额
		if ($this->isNotNull($this->discountAmount)) {
			$params['discountAmount'] = $this->discountAmount;
		}
		//expressFee 运费
		if ($this->isNotNull($this->expressFee)) {
			$params['expressFee'] = $this->expressFee;
		}
		//extraDiscountAmount 额外优惠金额
		if ($this->isNotNull($this->extraDiscountAmount)) {
			$params['extraDiscountAmount'] = $this->extraDiscountAmount;
		}
		//extraDiscountReason 优惠原因
		if ($this->isNotNull($this->extraDiscountReason)) {
			$params['extraDiscountReason'] = $this->extraDiscountReason;
		}
		//merchantId 商家 ID(走平安渠道必输)
		if ($this->isNotNull($this->merchantId)) {
			$params['merchantId'] = $this->merchantId;
		}
		//merchantName 供应商名称(走平安渠道必输)
		if ($this->isNotNull($this->merchantName)) {
			$params['merchantName'] = $this->merchantName;
		}
		//orderAmount 订单金额
		if ($this->isNotNull($this->orderAmount)) {
			$params['orderAmount'] = $this->orderAmount;
		}
		//orderItems
		if ($this->isNotNull($this->orderItems)) {
			foreach ($this->orderItems as $orderItem) {
				$params['orderItems'][] = $orderItem->buildParams();
			}
		}
		//orderNo 子订单号
		if ($this->isNotNull($this->orderNo)) {
			$params['orderNo'] = $this->orderNo;
		}
		//orderType 订单类型 6 : 体验车押金 7: 充电小程序 8 : 酷屏，13:新宝骏公帐支付 15 二手车服务费 20 二手车
		if ($this->isNotNull($this->orderType)) {
			$params['orderType'] = $this->orderType;
		}
		//payAmount 待支付金额
		if ($this->isNotNull($this->payAmount)) {
			$params['payAmount'] = $this->payAmount;
		}
		//payType 支付方式 0 全款 1 定金 2 分期
		if ($this->isNotNull($this->payType)) {
			$params['payType'] = $this->payType;
		}
		//thirdPartyMerchantId 第三方商家 ID（接入方的商家 ID）
		if ($this->isNotNull($this->thirdPartyMerchantId)) {
			$params['thirdPartyMerchantId'] = $this->thirdPartyMerchantId;
		}

		return $params;
	}
}
