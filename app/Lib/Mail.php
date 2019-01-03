<?php
namespace App\Lib;

class Mail
{

    public static function msg($subject, $from, $to, $body)
    {
        $message = new \Swift_Message($subject);
        $message->setFrom($from)
                ->setTo($to)
                ->setBody($body);
        return $message;
    }

}