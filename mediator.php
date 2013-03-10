<?php

/*
mediator pattern implementation for plugins management
*/

// load interfaces / types
require_once('core.php');

// autoload plugins
require_once('init.php');

/* mediator class for plugins */
class PluginManager
{
	protected $_plugins; // all plugins objects are stored here
	protected $_value;

	public function addPlugin(Plugin $Plugin)
	{
		$this->_plugins[] = $Plugin;
		return $this;
	}

	public function setValue($value)
	{
		$this->_value = $this->_execute($value);
	}

	protected function _execute($value)
	{
		foreach ($this->_plugins as $plugin) {
			$value = $plugin->execute($value);
		}
		return $value;
	}

	public function getValue()
	{
		return $this->_value;
	}
}

$pm = new PluginManager();
$pm->addPlugin(new Google())
   ->addPlugin(new Bing());
$pm->setValue("porn");
echo $pm->getValue();