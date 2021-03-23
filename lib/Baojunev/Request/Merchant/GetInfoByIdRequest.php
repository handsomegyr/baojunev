<?php

namespace Baojunev\Request\Merchant;

/**
 * 查询商户详情接口地址:{base-path}/api/v1/merchant/{id}
 * 请求方式：GET
 * consumes:
 * produces:["application/json;charset=UTF-8"]
 */
class GetInfoByIdRequest extends \Baojunev\Request\Base
{
	// 请求参数
	public $id = NULL;

	// API名
	protected $request_method = "GET";

	protected $urlType = 1;

	protected function getUrl()
	{
		return "api/v1/merchant/{$this->id}";
	}
}
