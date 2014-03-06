<?php
function autoloader($class) {
    include 'classes/'.$class.'.php';
}
spl_autoload_register('autoloader');