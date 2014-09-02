<?php
/**
 * ShowVotes
 * by Stanislav Nevolin, stanislav@nevolin.info
 */

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}
class PluginShowvotes extends Plugin {
	/**
	 * Plugin Activation
	 */
	public function Activate() {
		return true;
	}
	/**
	 * Plugin Initialization
	 */
	public function Init() {
		return true;
	}
}
?>