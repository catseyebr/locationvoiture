<?php

namespace Core;


use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class ErrorHandler extends \Exception
{
    public function __construct($msg = NULL, $code = 1, \Exception $previous = NULL)
    {
        parent::__construct($msg);
    }

    public static function captureError($errno, $errstr, $errfile, $errline, array $errcontext)
    {
        switch ($errno) {
            case E_USER_ERROR:
                $level = 'ERROR';
                break;
            case E_USER_WARNING:
                $level = 'WARNING';
                break;
            case E_USER_NOTICE:
                $level = 'NOTICE';
                break;
            case E_STRICT:
                $level = 'ALERT';
                break;
            case E_RECOVERABLE_ERROR:
                $level = 'ERROR';
                break;
            case E_DEPRECATED:
                $level = 'WARNING';
                break;
            case E_USER_DEPRECATED:
                $level = 'WARNING';
                break;
            case E_NOTICE:
                $level = 'NOTICE';
                break;
            case E_WARNING:
                $level = 'WARNING';
                break;
            default:
                $level = 'DEBUG';
        }
        $message = sprintf(
            '"%s | %s | %s | %s | %s | %s"',
            $errstr,
            $errfile,
            $errline,
            $_SERVER['REMOTE_ADDR'],
            $_SERVER['REQUEST_URI'],
            $_SERVER['REQUEST_METHOD']
        );
        $logger = new Logger('error');
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../../Log/error/error.log', 7));
        $logger->log($level,$message,$errcontext);
        echo $message;
        exit;
    }

    public function __toString(){
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public static function shutdownFunc()
    {
        $erro = error_get_last();
        if($erro['type']) {
            $message = sprintf(
                '"%s | %s | %s | %s | %s | %s"',
                $erro['message'],
                $erro['file'],
                $erro['line'],
                $_SERVER['REMOTE_ADDR'],
                $_SERVER['REQUEST_URI'],
                $_SERVER['REQUEST_METHOD']
            );
            $logger = new Logger('error');
            $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../../Log/error/error.log', 7));
            $logger->log(Logger::ERROR, $message);
            echo $message;
            die;
        }
    }
}