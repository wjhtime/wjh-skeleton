<?php
namespace App\Lib;

class Mail
{

    public static function msg($subject, $to, $body)
    {
        $message = new \Swift_Message($subject);
        $message->setFrom('from@163.com')
                ->setTo($to)
                ->setBody($body);
        return $message;
    }

}