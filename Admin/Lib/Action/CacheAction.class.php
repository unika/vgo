<?php
class CacheAction extends BaseAction {
	public function _initialize() {
		parent::_initialize();
		$this -> mod = D('Cache');
	}

	function index() {
		$this -> display();
	}

	function clearCache() {
		set_time_limit(0);
		$i = intval($_REQUEST['id']);
		if (!$i) {
			$this -> error('操作失败');
		} else {
			import("ORG.Io.Dir");
			$dir = new Dir;
			switch ($i) {
				case 1 :
					//更新全站缓存
					is_dir(CACHE_PATH) && $dir -> del(CACHE_PATH);
					is_dir(DATA_PATH . '_fields/') && $dir -> del(DATA_PATH . '_fields/');
					is_dir(TEMP_PATH) && $dir -> del(TEMP_PATH);
					if (is_dir("./Home/Runtime")) {
						deleteCacheData("./Home/Runtime");
					}
					if (is_dir("./admin/Runtime")) {
						deleteCacheData("./admin/Runtime");
					}
					//Api缓存
					is_dir('./Apicache/') && delCache('./Apicache/');
					break;
				case 2 :
					//后台模版缓存
					is_dir(CACHE_PATH) && $dir -> del(CACHE_PATH);
					break;
				case 3 :
					//前台模版缓存
					is_dir("./Home/Runtime/Cache/") && $dir -> del("./Home/Runtime/Cache/");
					is_dir("./Home/Html/") && $dir -> del("./Home/Html/");
					break;
				case 4 :
					//数据库缓存
					is_dir(DATA_PATH . '_fields/') && $dir -> del(DATA_PATH . '_fields/');
					is_dir("./Home/Runtime/Data/_fields/") && $dir -> del("./Home/Runtime/Data/_fields/");
					break;
				case 5 :
					//Api缓存
					is_dir('./Apicache/') && delCache('./Apicache/');
					break;
				default :
					break;
			}
			$runtime = defined('MODE_NAME') ? '~' . strtolower(MODE_NAME) . '_runtime.php' : '~runtime.php';
			$runtime_file_admin = RUNTIME_PATH . $runtime;
			$runtime_file_front = ROOT_PATH . '/Home/Runtime/' . $runtime;
			is_file($runtime_file_admin) && @unlink($runtime_file_admin);
			is_file($runtime_file_front) && @unlink($runtime_file_front);
			$this -> success('更新完成', U('Cache/index'));
		}
	}

}
?>