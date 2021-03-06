<?php
/********************************************************************************************
* Purpose  :Write a program Calendar.java that takes the month and year as command-line arguments 
            and prints the Calendar of the month. 
            Store the Calendar in an 2D Array, the first dimension the week of the month and 
            the second dimension stores the day of the week. Print the result as following
* File Name: SWeekDay.php
* Author   : @Hamid Iqbal Khan
* Version  : 1.0
* Since    : 16/01/2019
********************************************************************************************/
require("Utility.php");
require("Stack.php");
class WeekDay
{
    /** Constructor for class WeekDay */
    function __construct($day, $date)
    {
        $this->date = $date;
        $this->day = $day;
    }
    public $day;
    public $date;
}
/**
 * Function to Run the calender Usind Queue
 */
function calStack()
{
    $stack = new Stack();
    //taking input with validation
    echo "Enter Month : ";
    $month = Utility::getInt();
    while ($month > 12) {
        echo "Enter correct month : ";
        $month = Utility::getInt();
    }
    echo "Enter Year ";
    $year = Utility::getInt();
    while ($year < 1000) {
        echo "Enter correct year : ";
        $year = Utility::getInt();
    }
    $totalDays = calTotal($month, $year);
    //checking the day at which month start and storin it in var start
    $start = Utility::dayOfWeek(1, $month, $year);
    $count = 1;
    $days = explode(" ","Sun   Mon   Tue   Wed   Thu   Fri   Sat");
    //storing blank
    for ($i = 0; $i <= $start; $i++) {
        $stack->push(new WeekDay($days[$i]," "));
    }
    //storing proper days from $var start
    for ($i = 0; $i < $totalDays; $i++) {
        $stack->push(new WeekDay($days[$start % 7], $count++));
        //incrementing start for next day
        $start++;
    }
    //echo $stack->size() . "\n";
    $stack2 = new Stack();
    while (!$stack->isEmpty()) {
        $stack2->push($stack->pop());
    }
    printCalStack($stack2);
    echo  "\n";
}
/**
 * Function to print the queue in form of calender
 */
function printCalStack($stack)
{
    echo "Sun   Mon   Tue   Wed   Thu   Fri   Sat\n";
    for ($i = 0; !$stack->isEmpty(); $i++) {
        $w = $stack->pop();
        if ($w->date < 10) {
            echo "$w->date" . "     ";
        } else {
            echo "$w->date" . "    ";
        }
        if ($i % 7 == 6) {
            echo "\n";
        }
    }
}
/**
 * Function to calculate the total days in a month
 */
function calTotal($month, $year)
{
    if ($month < 13) {
        if ($month % 2 == 0) {
            if ($month == 2) {
                if (Utility::isLeapYear($year)) {
                    return 29;
                }
                return 28;
            }
            return 30;
        } else {
            return 31;
        }
     } //else {
    //     if ($month % 2 == 0) {
    //         return 31;
    //     }
    //     return 30;
    
}
/**
 * calling the function to test
 */
calStack();
?>