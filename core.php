<?php

/* all plugins must implements this interface */
interface Plugin
{
	public function execute($value);
}

?>