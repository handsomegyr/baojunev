<?php

/**
 * 服务端 API
 * 新能源SDK接口。
 * 
 * @author guoyongrong <handsomegyr@126.com>
 *
 */

namespace Baojunev;

class Client
{
	// 接口地址
	private $_appKey = null;
	private $_appSecret = null;
	private $_request = null;
	private $_is_product = true;

	public function __construct($appKey, $appSecret)
	{
		$this->_appKey = $appKey;
		$this->_appSecret = $appSecret;
	}

	public function getAppKey()
	{
		if (empty($this->_appKey)) {
			throw new \Exception("请设定appKey");
		}
		return $this->_appKey;
	}

	public function getAppSecret()
	{
		if (empty($this->_appSecret)) {
			throw new \Exception("请设定appSecret");
		}
		return $this->_appSecret;
	}

	/**
	 * 设定是否正式环境
	 *
	 * @param boolean $is_product        	
	 */
	public function setIsProduct($is_product)
	{
		$this->_is_product = boolval($is_product);
		return $this;
	}

	/**
	 * 初始化认证的http请求对象
	 */
	private function initRequest()
	{
		$this->_request = new \Baojunev\Http\Request();
	}

	/**
	 * 获取请求对象
	 *
	 * @return \Baojunev\Http\Request
	 */
	private function getRequest()
	{
		if (empty($this->_request)) {
			$this->initRequest();
		}
		return $this->_request;
	}

	/**
	 * 发送请求
	 */
	public function sendRequest(\Baojunev\Request\Base $request, array $options = array())
	{
		$req_uri = $request->getRequestUrl($this->_is_product);
		$url = $request->getApiUrl($this->_is_product);
		$requestMethod = $request->getRequestMethod();
		// 参数
		$params = $request->buildParams();

		$options = array();
		if ($requestMethod == 'GET') {
			$headers = $this->getAuthorization4Get($req_uri, $params);
			$options['headers'] = $headers;
			$rst = $this->getRequest()->get($url, $params, $options);
		} else {
			$headers = $this->getAuthorization4Post($req_uri, array(), $params);
			$options['headers'] = $headers;
			$rst = $this->getRequest()->post($url, $params, $options);
		}

		return $this->rst($rst);
	}

	/**
	 * php签名方法
	 */
	public function getAuthorization4Post($req_uri, $url_parameters, $post_parameters)
	{
		$username = $this->_appKey;
		$secret = $this->_appSecret;

		// 2.POST 和 PUT：
		// body="{...}"
		// digest=SHA-256([body])
		// base64_digest=base64([digest])
		// signing_string="Digest: SHA-256=[base64_digest]\nX-Date: [请求时间戳]\n[请求行]"
		// digest=HMAC-SHA256([signing_string], [secret])
		// base64_digest=base64([digest])
		// 【body 为请求的 JSON
		// signing_string 中，“Digest: SHA-256=”  与 “X-Date: "是必传字段BODY 为JSON，
		// signing_string  中带 Digest注意，以上信息，每个空格，参数顺序，都不能变
		// 请求时间戳与请求行概念同上】
		// 最终生成的带认证请求头的请求信息示意：
		// POST /outer/mallif/api/sample/test3?a=1&b=2 HTTP/1.1
		// X-Date：Thu, 14 Mar 2019 09:44:07 GMT
		// Digest: SHA-256=[base64_digest]
		// Authorization: hmac username="[用户名]", algorithm="hmac-sha256", headers="X-Date request-line", signature="[base64_digest]"
		// 【如上，最后生成的 鉴权参数有三个，一个是 X-Date，一个是 Digest，一个是Authorization 】
		// $X_Date = "Wed, 17 Mar 2021 06:32:26 GMT"; //date("Ymd"); //date(\DATE_RFC822);
		$X_Date = gmdate('D, d M Y H:i:s \G\M\T', time()); //date("Ymd"); //date(\DATE_RFC822);
		// die($X_Date);
		$urlparams = array();
		foreach ($url_parameters as $key => $value) {
			$urlparams[] = "{$key}={$value}";
		}
		$urlparams = implode('&', $urlparams);
		if (empty($urlparams)) {
			$request_line = "POST {$req_uri} HTTP/1.1";
		} else {
			$request_line = "POST {$req_uri}?{$urlparams} HTTP/1.1";
		}
		$body = \json_encode($post_parameters, JSON_UNESCAPED_UNICODE);

		$digest = hash('sha256', $body, true);
		$base64_digest = base64_encode($digest);
		// die($base64_digest);

		$signing_string = "Digest: SHA-256={$base64_digest}\nX-Date: {$X_Date}\n{$request_line}";
		// echo "$signing_string1\n";
		// $signing_string="Digest: SHA-256=yzrDixqFSs4+Rt66Elo3iwDAWrawDTjvc4QcMtj6QXk=\nX-Date: Wed, 17 Mar 2021 06:06:26 GMT\nPOST /order-service/api/mainOrder/save HTTP/1.1";
		// die($signing_string);

		$digest = hash_hmac('sha256', $signing_string, $secret, true);
		$signature = base64_encode($digest);
		// die($signature);

		$headers = array();
		$headers['Content-Type'] = "application/json;charset=UTF-8";
		$headers['Digest'] = "SHA-256={$base64_digest}";
		$headers['X-Date'] = $X_Date;
		$headers['Authorization'] = "hmac username=\"{$username}\", algorithm=\"hmac-sha256\", headers=\"Digest X-Date request-line\", signature=\"{$signature}\"";
		// print_r($headers);
		// die('xxxxxxxx');
		return $headers;
	}

	public function getAuthorization4Get($req_uri, $url_parameters)
	{
		$username = $this->_appKey;
		$secret = $this->_appSecret;

		//1.GET 和 PUT：
		//signing_string="[X-Date: 请求时间戳]\n[请求行]"
		//digest=HMAC-SHA256([signing_string],[secret])
		//base64_digest=base64([digest])
		//【请求时间戳 = 下文 X-Date请求行 = 下文  “POST /outer/mallif/api/sample/test3?a=1&b=2 HTTP/1.1”注意，请求行是包含查询参数的】
		//最终生成的带认证请求头的请求信息示意：
		//POST /outer/mallif/api/sample/test3?a=1&b=2 HTTP/1.1
		//X-Date：Thu, 14 Mar 2019 09:44:07 GMT
		//Authorization: hmac username="[用户名]", algorithm="hmac-sha256", headers="X-Date request-line", signature="[base64_digest]"
		//【如上，最后生成的 鉴权参数有两个，一个是 X-Date，一个是Authorization 注意，以上信息，每个空格，参数顺序，都不能变】
		$X_Date = gmdate('D, d M Y H:i:s \G\M\T');
		$urlparams = array();
		foreach ($url_parameters as $key => $value) {
			$urlparams[] = "{$key}={$value}";
		}
		$urlparams = implode('&', $urlparams);
		if (empty($urlparams)) {
			$request_line = "GET {$req_uri} HTTP/1.1";
		} else {
			$request_line = "GET {$req_uri}?{$urlparams} HTTP/1.1";
		}
		$signing_string = "X-Date: {$X_Date}\n{$request_line}";
		$digest = hash_hmac('sha256', $signing_string, $secret, true);
		$base64_digest = base64_encode($digest);

		$headers = array();
		$headers['Content-Type'] = "application/json;charset=UTF-8";
		$headers['X-Date'] = $X_Date;
		$headers['Authorization'] = "hmac username=\"{$username}\", algorithm=\"hmac-sha256\", headers=\"Digest X-Date request-line\", signature=\"{$base64_digest}\"";
		return $headers;
	}

	/**
	 * 标准化处理服务端API的返回结果
	 */
	public function rst($rst)
	{
		return $rst;
	}
}
