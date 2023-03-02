<?php

/**
 * 디시콘 관리 모듈
 * 
 * Copyright (c) Lastorder-DC
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class DcconController extends Dccon
{
	public function dispDcconCreateList()
	{
		$target_mid = Context::get('target_mid');
		header("Content-Type: text/javascript; charset=utf-8");
		echo "alert('$target_mid')";
		\Context::close();
	}
}
