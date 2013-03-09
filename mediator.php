<?php

/*
mediator pattern implementation 
*/

interface Search
{
	public function search($value);
}

class GoogleSearch implements Search
{
	public function search($value) 
	{
		return "googling $value";
	}
}

class BingSearch implements Search
{
	public function search($value)
	{
		return "binging $value";
	}
}

class SearchMachine
{
	protected $_machines;
	protected $_value;

	public function addMachine(Search $search)
	{
		$this->_machines[] = $search;
		return $this;
	}

	public function setValue($value)
	{
		$this->_value = $this->_search($value);
	}

	protected function _search($value)
	{
		foreach ($this->_machines as $machine) {
			$value = $machine->search($value);
		}
		return $value;
	}

	public function getValue()
	{
		return $this->_value;
	}
}

$machine = new SearchMachine();
$machine->addMachine(new GoogleSearch())
		->addMachine(new BingSearch());
$machine->setValue("porn");
echo $machine->getValue();