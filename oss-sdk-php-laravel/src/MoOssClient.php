<?php namespace Tzuhsiulin\Laravel;

require_once __DIR__ . '/../../oss-php-sdk_v2/aliyun.php';
use \Aliyun\OSS\OSSClient;

class MoOssClient {
	
	protected $ossClient;

	public function __construct($config) {
		// for oss sdk v1.1 
		// if (isset($config['ali_access_id'])) {
        //	define('OSS_ACCESS_ID', $config['ali_access_id']);
        //	}
		// if (isset($config['ali_access_key'])) {
		// 	define('OSS_ACCESS_KEY', $config['ali_access_key']);
		// }
		// if (isset($config['ali_log'])) {
		// 	define('ALI_LOG', $config['ali_log']);
		// }
		// if (isset($config['ali_display_log'])) {
		// 	define('ALI_DISPLAY_LOG', $config['ali_display_log']);
		// }
		// if (isset($config['ali_lan'])) {
		// 	define('ALI_LANG', $config['ali_lan']);
		// }
		// if (isset($config['oss_end_point'])) {
		// 	define('OSS_END_POINT', $config['oss_end_point']);
		// }
		//
		//
		// require_once __DIR__ . '/../../oss_php_sdk/sdk.class.php';
		//
		// $this->ossClient = new \ALIOSS();
		// $this->ossClient->set_debug_mode(FALSE);

		// for oss sdk v2.0
		$this->ossClient = OSSClient::factory([
			'AccessKeyId' => $config['ali_access_id'],
			'AccessKeySecret' => $config['ali_access_key'],
			'Endpoint' => $config['oss_end_point']
		]);
	}

	public function getInstance() {
		return $this->ossClient;
	}

}