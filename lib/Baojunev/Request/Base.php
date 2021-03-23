<?php

namespace Baojunev\Request;

/**
 * 基础类
 */
abstract class Base
{
	// API名
	protected $request_method = "POST";

	// 参数
	protected $param_json = array();

	protected $urlType = 0;

	protected function getUrl()
	{
		return "";
	}

	protected function getHost($urlType, $is_product)
	{
		$url = "";
		if ($is_product) {
			if ($urlType == 1) {
				//商户
				$url = 'https://kgw.baojunev.com';
			} elseif ($urlType == 2) {
				//订单
				$url = 'https://kgw.baojunev.com';
			} elseif ($urlType == 3) {
				//支付
				$url = 'https://kgw.baojunev.com';
			}
		} else {
			if ($urlType == 1) {
				//商户
				$url = 'https://kgw.baojunev.com';
			} elseif ($urlType == 2) {
				//订单
				$url = 'https://paytest.baojunev.com';
			} elseif ($urlType == 3) {
				//支付
				$url = 'https://paytest.baojunev.com';
			}
		}
		return $url;
	}

	protected function getBasePath($urlType, $is_product)
	{
		$url = "";
		if ($is_product) {
			if ($urlType == 1) {
				//商户
				$url = '/account_service/';
			} elseif ($urlType == 2) {
				//订单
				$url = '/order-service/';
			} elseif ($urlType == 3) {
				//支付
				$url = '/payplugin/';
			}
		} else {
			if ($urlType == 1) {
				//商户
				$url = '/merchant/';
			} elseif ($urlType == 2) {
				//订单
				$url = '/order/';
			} elseif ($urlType == 3) {
				//支付
				$url = '/payplugin/';
			}
		}
		return $url;
	}

	public function getRequestMethod()
	{
		return $this->request_method;
	}

	public function getRequestUrl($is_product)
	{
		return $this->getBasePath($this->urlType, $is_product) . $this->getUrl();
	}

	public function getApiUrl($is_product)
	{
		return $this->getHost($this->urlType, $is_product) . $this->getBasePath($this->urlType, $is_product) . $this->getUrl();
	}

	public function buildParams()
	{
		return array();
	}

	// public function getParams()
	// {
	// 	$this->buildParams();

	// 	// if (!empty($this->param_json)) {
	// 	// 	// 确保key和值都是字符串
	// 	// 	foreach ($this->param_json as $key => $value) {
	// 	// 		$this->param_json[strval(trim($key))] = strval(trim($value));
	// 	// 	}
	// 	// 	// // 排序
	// 	// 	// ksort($this->param_json);
	// 	// }
	// 	return $this->param_json;
	// }

	public function checkParams()
	{
		return true;
	}

	protected function isNotNull($var)
	{
		return !is_null($var);
	}
}
