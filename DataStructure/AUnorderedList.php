<?php
//require function in below files to work
require("Utility.php");
require("UnOrderedList.php");
class AUnorderedList
{
    /**
     * function to read ,search, add to the list 
     */
    function search()
    {
        //name of the file
        $filen = "word.txt";
        //reading the file
        $contents = Utility::readFile($filen);
        //echo "contents ".$contents;
        //creating the array of the no
        $contents = explode(" ", $contents);
        $list = new UnOrderedList();
        //adding to the list
        for ($i = 0; $i < count($contents); $i++) {
            $list->append($contents[$i]);
        }
        //showing the list
        echo "contents in the list are \n" . $list;
        $file = fopen($filen, "w") or die("Unable to open file ");
        echo "\nenter to search in the list ";
        $element = Utility::getString();
        //searching the elemnt in the list
        if ($list->search($element) === true) {
            echo "Element found \n removing element \n";
            $list->remove($element);
            echo $list;
        } else {
            echo "Element not found \n Adding element \n";
            $list->append($element);
            echo $list;
        }
        //writing back to the file
        fwrite($file, $list->getString());
    }
}
//calling the method    
AUnorderedList::search();
?>