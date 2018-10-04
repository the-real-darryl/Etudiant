<?php
require_once('/Constant.php');
class Time
{
    public static function getDate_($time_zone,$format) {
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($time_zone)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
        return $dt->format($format);
    }
    public static function getDifference($tab)
    {
        $timestamp = time();
        $now = new DateTime("now", new DateTimeZone(Constant::TIMEZONE));
        $now->setTimestamp($timestamp); 
        $now->format('m/d/Y');

        $born = new DateTime($tab, new DateTimeZone(Constant::TIMEZONE));
        $age_ = $now->diff($born);
        return $age_->y;
    }
}