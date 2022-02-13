<?php

function splitStringToArray($string, $separator)
{
    $array = [];
    if (str_contains($string, $separator)) {
        $array = explode(',', $string);
    } else {
        $array[] = $string;
    }
    return $array;
}

function isValidTimeStamp($timestamp)
{
    return ((string) (int) $timestamp === $timestamp)
        && ($timestamp <= PHP_INT_MAX)
        && ($timestamp >= ~PHP_INT_MAX);
}

function setResponseLocale($locale)
{
    app()->setLocale($locale);
}
