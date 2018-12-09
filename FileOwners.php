<?php 
/*********
== File Owners == 

Implement a groupByOwners function that:

Accepts an associative array containing the file owner name for each file name.
Returns an associative array containing an array of file names for each owner name, in any order.
For example, for associative array ["Input.txt" => "Randy", "Code.py" => "Stan", "Output.txt" => "Randy"] the groupByOwners function should return ["Randy" => ["Input.txt", "Output.txt"], "Stan" => ["Code.py"]].

PHP 7.1.9
********/

class FileOwners
{
    public static function groupByOwners($files)
    {
        $output = array();
        if(@count($files) > 0){
            foreach($files as $file_name => $owner_name){
                $output[$owner_name][] = $file_name;
            }
        }
        return $output;
    }
}

$files = array
(
    "Input.txt" => "Randy",
    "Code.py" => "Stan",
    "Output.txt" => "Randy"
);
var_dump(FileOwners::groupByOwners($files));