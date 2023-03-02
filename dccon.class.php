<?php

/**
 * 디시콘 관리 모듈
 * 
 * Copyright (c) Lastorder-DC
 * 
 * Generated with https://www.poesis.org/tools/modulegen/
 */
class Dccon extends ModuleObject
{
	/**
	 * 모듈 설정 캐시를 위한 변수.
	 */
	protected static $_config_cache = null;
	
	/**
	 * 모듈 설정을 가져오는 함수.
	 * 
	 * 캐시 처리되기 때문에 ModuleModel을 직접 호출하는 것보다 효율적이다.
	 * 모듈 내에서 설정을 불러올 때는 반드시 이 함수를 사용하도록 한다. 
	 * 
	 * @return object
	 */
	public function getConfig()
	{
		if (self::$_config_cache === null)
		{
			self::$_config_cache = ModuleModel::getModuleConfig($this->module) ?: new stdClass;
		}
		return self::$_config_cache;
	}
	
	/**
	 * 모듈 설정을 저장하는 함수.
	 * 
	 * 설정을 변경할 필요가 있을 때 ModuleController를 직접 호출하지 말고 이 함수를 사용한다.
	 * getConfig()으로 가져온 설정을 적절히 변경하여 setConfig()으로 다시 저장하는 것이 정석.
	 * 
	 * @param object $config
	 * @return object
	 */
	public function setConfig($config)
	{
		$oModuleController = ModuleController::getInstance();
		$result = $oModuleController->insertModuleConfig($this->module, $config);
		if ($result->toBool())
		{
			self::$_config_cache = $config;
		}
		return $result;
	}
	
	/**
	 * 오브젝트 캐시에서 값을 가져오는 함수.
	 * 
	 * 그룹 키를 지정하지 않으면 자동으로 현재 모듈 이름이 그룹 키로 사용되므로
	 * 필요시 그룹 키를 비움으로써 신속하게 캐시를 갱신할 수 있다.
	 * 
	 * @param string $key
	 * @param int $ttl
	 * @param string $group_key (optional)
	 * @return mixed
	 */
	public function getCache($key, $ttl = 86400, $group_key = null)
	{
		return Rhymix\Framework\Cache::get(($group_key ?: $this->module) . ':' . $key);
	}
	
	/**
	 * 오브젝트 캐시에 값을 저장하는 함수.
	 * 
	 * 그룹 키를 지정하지 않으면 자동으로 현재 모듈 이름이 그룹 키로 사용되므로
	 * 필요시 그룹 키를 비움으로써 신속하게 캐시를 갱신할 수 있다.
	 * 
	 * @param string $key
	 * @param mixed $value
	 * @param int $ttl
	 * @param string $group_key (optional)
	 * @return bool
	 */
	public function setCache($key, $value, $ttl = 86400, $group_key = null)
	{
		return Rhymix\Framework\Cache::set(($group_key ?: $this->module) . ':' . $key, $value, $ttl);
	}
	
	/**
	 * 오브젝트 캐시에서 개별 키를 삭제하는 함수.
	 * 
	 * @param string $key
	 * @param string $group_key (optional)
	 * @return bool
	 */
	public function deleteCache($key, $group_key = null)
	{
		return Rhymix\Framework\Cache::delete(($group_key ?: $this->module) . ':' . $key);
	}
	
	/**
	 * 오브젝트 캐시를 비우는 함수.
	 * 
	 * 지정된 그룹 키에 소속된 데이터만 삭제한다.
	 * 현재 모듈에서 저장한 데이터만 삭제하는 것이 기본값이다.
	 * 
	 * @param string $group_key (optional)
	 * @return bool
	 */
	public function clearCache($group_key = null)
	{
		return Rhymix\Framework\Cache::clearGroup($group_key ?: $this->module);
	}
	
	/**
	 * 모듈 설치 콜백 함수.
	 * 
	 * 트리거 등록 외에 따로 할 일이 없다면 수정할 필요 없다.
	 * 
	 * @return object
	 */
	public function moduleInstall()
	{
		
	}
	
	/**
	 * 모듈 업데이트 확인 콜백 함수.
	 * 
	 * 트리거 등록 외에 따로 할 일이 없다면 수정할 필요 없다.
	 * 
	 * @return bool
	 */
	public function checkUpdate()
	{
		
	}
	
	/**
	 * 모듈 업데이트 콜백 함수.
	 * 
	 * 트리거 등록 외에 따로 할 일이 없다면 수정할 필요 없다.
	 * 
	 * @return object
	 */
	public function moduleUpdate()
	{
		
	}
	
	/**
	 * 캐시파일 재생성 콜백 함수.
	 * 
	 * @return void
	 */
	public function recompileCache()
	{
		
	}
}
