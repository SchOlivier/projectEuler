<?php

/*
You are given the following information, but you may prefer to do some research for yourself.

1 Jan 1900 was a Monday.
Thirty days has September,
April, June and November.
All the rest have thirty-one,
Saving February alone,
Which has twenty-eight, rain or shine.
And on leap years, twenty-nine.
A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.
How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
*/

$nbSundays = 0;

$day = $dayOfMonth = 1;
$month = 1;
$year = 1900;
$nbDaysInMonth = getNbDaysInMonth($month, $year);

while ($year < 2001) {
    $day++;
    $dayOfMonth++;
    if ($dayOfMonth > $nbDaysInMonth) {
        $dayOfMonth = 1;
        $month++;
        if ($month > 12) {
            $month = 1;
            $year++;
        }
        $nbDaysInMonth = getNbDaysInMonth($month, $year);
    }
    if ($dayOfMonth == 1 && $day % 7 == 0 && $year > 1900) {
        $nbSundays++;
    }
}

echo "Number of sundays on the 1st of the month : $nbSundays\n";


function getNbDaysInMonth(int $month, int $year): int
{
    $nbDays = [
        1 => 31,
        2 => isLeapyear($year) ? 29 : 28,
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    ];
    return $nbDays[$month];
}

function isLeapyear($year): bool
{
    if ($year % 4 != 0) return false;
    if ($year % 400 == 0) return true;
    if ($year % 100 == 0) return false;
    return true;
}
