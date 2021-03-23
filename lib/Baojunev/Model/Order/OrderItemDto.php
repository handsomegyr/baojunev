<?php

namespace Baojunev\Model\Order;


class OrderItemDto extends \Baojunev\Model\Base
{
	//couponAmount 优惠金额
	public $couponAmount = null;
	//discountAmount 折扣金额
	public $discountAmount = null;
	//imgUrl 商品简图
	public $imgUrl = null;
	//itemDetail 订单详情
	public $itemDetail = null;
	//itemNo 订单详情编号
	public $itemNo = null;
	//payAmount 待支付金额
	public $payAmount = null;
	//pickUp 提货方式 1 邮寄 2 自提 3 邮寄+ 自提 4 非邮寄非自提
	public $pickUp = null;
	//platformFee 平台费用
	public $platformFee = null;
	//productCode 商品编码
	public $productCode = null;
	//productExtraAttr 商品扩展信息
	public $productExtraAttr = null;
	//productId 商品 ID
	public $productId = null;
	//productName 商品名称
	public $productName = null;
	//productOriginalUnitPrice 商品原价（单价）
	public $productOriginalUnitPrice = null;
	//productSellingUnitPrice 商品售价（单价）
	public $productSellingUnitPrice = null;
	//quantity 商品数量
	public $quantity = null;
	//storeCode 商品所在门店 code
	public $storeCode = null;
	//storeName 商品所在门店 name
	public $storeName = null;

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
		//imgUrl 商品简图
		if ($this->isNotNull($this->imgUrl)) {
			$params['imgUrl'] = $this->imgUrl;
		}
		//itemDetail 订单详情
		if ($this->isNotNull($this->itemDetail)) {
			$params['itemDetail'] = $this->itemDetail;
		}
		//itemNo 订单详情编号
		if ($this->isNotNull($this->itemNo)) {
			$params['itemNo'] = $this->itemNo;
		}
		//payAmount 待支付金额
		if ($this->isNotNull($this->payAmount)) {
			$params['payAmount'] = $this->payAmount;
		}
		//pickUp 提货方式 1 邮寄 2 自提 3 邮寄+ 自提 4 非邮寄非自提
		if ($this->isNotNull($this->pickUp)) {
			$params['pickUp'] = $this->pickUp;
		}
		//platformFee 平台费用
		if ($this->isNotNull($this->platformFee)) {
			$params['platformFee'] = $this->platformFee;
		}
		//productCode 商品编码
		if ($this->isNotNull($this->productCode)) {
			$params['productCode'] = $this->productCode;
		}
		//productExtraAttr 商品扩展信息
		if ($this->isNotNull($this->productExtraAttr)) {
			$params['productExtraAttr'] = $this->productExtraAttr;
		}
		//productId 商品 ID
		if ($this->isNotNull($this->productId)) {
			$params['productId'] = $this->productId;
		}
		//productName 商品名称
		if ($this->isNotNull($this->productName)) {
			$params['productName'] = $this->productName;
		}
		//productOriginalUnitPrice 商品原价（单价）
		if ($this->isNotNull($this->productOriginalUnitPrice)) {
			$params['productOriginalUnitPrice'] = $this->productOriginalUnitPrice;
		}
		//productSellingUnitPrice 商品售价（单价）
		if ($this->isNotNull($this->productSellingUnitPrice)) {
			$params['productSellingUnitPrice'] = $this->productSellingUnitPrice;
		}
		//quantity 商品数量
		if ($this->isNotNull($this->quantity)) {
			$params['quantity'] = $this->quantity;
		}
		//storeCode 商品所在门店 code
		if ($this->isNotNull($this->storeCode)) {
			$params['storeCode'] = $this->storeCode;
		}
		//storeName 商品所在门店 name
		if ($this->isNotNull($this->storeName)) {
			$params['storeName'] = $this->storeName;
		}



		return $params;
	}
}
