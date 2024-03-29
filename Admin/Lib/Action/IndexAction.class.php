<?php
class IndexAction extends BaseAction {
	/**
	 +----------------------------------------------------------
	 * 默认操作
	 +----------------------------------------------------------
	 */
	public function index() {
		$this -> display('index');
	}

	/*当前位置*/
	public function current_pos() {
		$group_id = intval($_REQUEST['tag']);
		$menuid = intval($_REQUEST['menuid']);

		$r = M('node') -> field('group_id,module_name,action_name') -> where('id=' . $menuid) -> find();
		if ($r) {
			$group_id = $r['group_id'];
		}

		$group = M('group') -> field('title') -> where('id=' . $group_id) -> find();
		if ($group) {
			echo $group['title'];
		}
		if ($r) {
			echo '->' . $r['module_name'] . '->' . $r['action_name'];
		}
		exit ;
	}

	/*
	 * 清除缓存
	 * */
	function clearCache() {
		import("ORG.Io.Dir");
		$dir = new Dir;

		if (is_dir(CACHE_PATH)) {
			$dir -> del(CACHE_PATH);
		}
		if (is_dir(TEMP_PATH)) {
			$dir -> del(TEMP_PATH);
		}
		if (is_dir(LOG_PATH)) {
			$dir -> del(LOG_PATH);
		}
		if (is_dir(DATA_PATH . '_fields/')) {
			$dir -> del(DATA_PATH . '_fields/');
		}

		if (is_dir("./index/Runtime/Cache/")) {
			$dir -> del("./index/Runtime/Cache/");
		}

		if (is_dir("./index/Runtime/Temp/")) {
			$dir -> del("./index/Runtime/Temp/");
		}

		if (is_dir("./index/Runtime/Logs/")) {
			$dir -> del("./index/Runtime/Logs/");
		}

		if (is_dir("./index/Runtime/Data/_fields/")) {
			$dir -> del("./index/Runtime/Data/_fields/");
		}
		$this -> display('index');
	}

}
?>