<?php
/********************************************************************************************
* Purpose  :Write a program Calendar.java that takes the month and year as command-line arguments 
            and prints the Calendar of the month. 
            Store the Calendar in an 2D Array, the first dimension the week of the month and 
            the second dimension stores the day of the week. Print the result as following
* File Name: Calender.php
* Author   : @Hamid Iqbal Khan
* Version  : 1.0
* Since    : 16/01/2019
********************************************************************************************/
require("Utility.php");
/**
 * Function to Run the Program
 */
function calender()
{
    //Taking Month And Year
    echo "Enter Month : ";
    $month = Utility::getInt();
    //validating
    while ($month > 12) {
        echo "enter correct month : ";
        $month = Utility::getInt();
    }
    echo "Enter Year : ";
    $year = Utility::getInt();
    //validating
    while ($year < 1000) {
        echo "enter correct year : ";
        $year = Utility::getInt();
    }
    //initializing 2D aray
    $cal = initArray();
    //Calculating the starting day of the month
    $start = Utility::dayOfWeek(1, $month, $year);
    //Calculating the ending day of the month
    $end = calculateEnd($month, $year);
    //calling the custom function to fill 2d array with appropriate day
    $cal = arrayFill($start, $cal, $end);
   // var_dump($cal);
   //printing the calender
    printCal($cal);
}
/**
 * Function to calculate the end of the month or no of days in the month
 * @param month Month in a year 1-12
 * @param year Year to which thw month is
 * 
 * @return days No of days in the month
 */
function calculateEnd($month, $year)
{
    if ($month < 12) {
        if ($month % 2 == 0) {
            if ($month == 2) {
                if (Utility::isLeapYear($year)) {
                    return 29;
                }
                return 28;
            }
            return 30;
        } else 
        {
            return 31;
        }
    } 
    
}

function printCal($arr)
{
    echo "Sun   Mon   Tue   Wed   Thu   Fri   Sat\n";
    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 7; $j++) {
            if ($arr[$i][$j] == -10 || $arr[$i][$j] > 31) {
                echo "      ";
            } else {
                if ($arr[$i][$j] < 10) {
                    echo $arr[$i][$j] . "     ";
                } else {
                    echo $arr[$i][$j] . "    ";
                }
            }
        }
        echo "\n";
    }
}
/**
 * Function to initialize the array with values of calender
 */
function arrayFill($start, $arr, $end)
{
    $count = 1;
    for ($i = $start; $i < 7; $i++) {
        $arr[0][$i] = $count++;
    }
    for ($i = 1; $i < 6; $i++) {
        for ($j = 0; $j < 7 && $count <= $end; $j++) {
            $arr[$i][$j] = $count++;
        }
    }
    return $arr;
}
/**
 * initialing the 2d arra with default values
 */
function initArray()
{
    $arr = [];
    for ($i = 0; $i < 6; $i++) {
        $aa = array();
        for ($j = 0; $j < 7; $j++) {
            $aa[$j] = -10;
        }
        array_push($arr, $aa);
    }
    return $arr;
}
calender();
?>