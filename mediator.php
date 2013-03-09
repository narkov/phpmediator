<?php

/*
mediator pattern implementation for plugins management
*/

interface Plugin
{
	public function execute($value);
}

class GooglePlugin implements Plugin
{
	public function execute($value) 
	{
		return "googling $value";
	}
}

class BingPlugin implements Plugin
{
	public function execute($value)
	{
		return "binging $value";
	}
}

class PluginManager
{
	protected $_plugins;
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
$pm->addPlugin(new GooglePlugin())
   ->addPlugin(new BingPlugin());
$pm->setValue("porn");
echo $pm->getValue();