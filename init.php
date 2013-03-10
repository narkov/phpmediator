<?php

// auload files *.plugin.php from CLASS_DIR folder

define('CLASS_DIR', 'plugins/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_extensions('.plugin.php');
spl_autoload_register();

?>