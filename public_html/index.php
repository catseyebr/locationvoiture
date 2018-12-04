<?php
require_once __DIR__."/../vendor/autoload.php";
register_shutdown_function(array('\Core\ErrorHandler', 'shutdownFunc'));
set_error_handler(array('\Core\ErrorHandler', 'captureError'));
new \Core\Route();