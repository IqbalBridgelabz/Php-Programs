<?php 
/********************************************************************************************
 * Purpose  : Write a Stopwatch Program for measuring the time that elapses between the start and end clicks
 * File Name: StopWatch.php
 * Author   : @Hamid Iqbal Khan
 * Version  : 1.0
 * Since    : 2/01/2019
 **********************************************************************************************/
require ("Utility.php");
$start  = round(microtime(true)*1000);
echo $start."\n";
sleep(7);
$stop = round(microtime(true)*1000);
echo $stop."\n";              
$result = Utility::stopWatch($start,$stop);
echo "Elapsed Time Between Start and End is : ".$result."\n";
?>