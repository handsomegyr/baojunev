<?php

namespace Baojunev\Model\Merchant;


class StatusVo extends \Baojunev\Model\Base
{
	//channel_code 支付渠道
	public $channel_code = null;
	//channelmarketid 渠道使用的市场 ID
	public $channelmarketid = null;
	//merchant_id 商户 ID
	public $merchant_id = null;

	public function buildParams()
	{
		$params = array();

		//channel_code 支付渠道
		if ($this->isNotNull($this->channel_code)) {
			$params['channel_code'] = $this->channel_code;
		}
		//channelmarketid 渠道使用的市场 ID
		if ($this->isNotNull($this->channelmarketid)) {
			$params['channelmarketid'] = $this->channelmarketid;
		}
		//merchant_id 商户 ID
		if ($this->isNotNull($this->merchant_id)) {
			$params['merchant_id'] = $this->merchant_id;
		}
		return $params;
	}
}
