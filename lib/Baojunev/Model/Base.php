<?php

namespace Baojunev\Model;

/**
 * 基础类
 */
abstract class Base
{

	public function buildParams()
	{
	}

	public function checkParams()
	{
		return true;
	}

	protected function isNotNull($var)
	{
		return !is_null($var);
	}
}
