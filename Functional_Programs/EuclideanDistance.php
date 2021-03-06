<?php
/********************************************************************************************
 * Purpose  : Write a program Distance.java that takes two integer command-line arguments x and y 
 *            and prints the Euclidean distance from the point (x, y) to the origin (0, 0). 
 *            The formulae to calculate distance = sqrt(x*x + y*y). Use Math.power function    
 * File Name: EuclideanDistance.php
 * Author   : @Hamid Iqbal Khan
 * Version  : 1.0
 * Since    : 2/01/2019
 **********************************************************************************************/
require ("Utility.php");
echo "Enter first Value : ";
$first = Utility::getInt();
echo "Enter second Value : ";
$second = Utility::getInt();
$result = Utility::euclidean($first,$second);
echo "Distanc from(".$first.",".$second.") to (0,0) = ".$result."\n";
?>