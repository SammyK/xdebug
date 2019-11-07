--TEST--
Test for xdebug.force_error_reporting (log_errors) [1]
--INI--
xdebug.default_enable=1
display_errors=0
log_errors=1
error_log=
xdebug.force_display_errors=0
xdebug.force_error_reporting=E_USER_WARNING
xdebug.collect_params=0
--FILE--
<?php
ini_set('error_reporting', 0);

trigger_error('two', E_USER_WARNING);
trigger_error('three');
strlen();
?>
--EXPECTF--
PHP Warning:  two in %sforce_error_reporting-log_errors-001.php on line 4
PHP Stack trace:
PHP   1. {main}() %sforce_error_reporting-log_errors-001.php:0
PHP   2. trigger_error() %sforce_error_reporting-log_errors-001.php:4
