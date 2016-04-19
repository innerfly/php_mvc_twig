<?php

spl_autoload_register('autoloadApp');

function autoloadApp($className) {
  $filename = "libs/" . $className . ".php";
  if (is_readable($filename)) {
    require $filename;
  }
}

$bootstrap = new Bootstrap();
$bootstrap->init();

?>
