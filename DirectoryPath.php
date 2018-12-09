<?php 
/*********
== Path == 

Write a function that provides change directory (cd) function for an abstract file system.

Notes:
Root path is '/'.
Path separator is '/'.
Parent directory is addressable as '..'.
Directory names consist only of English alphabet letters (A-Z and a-z).
The function should support both relative and absolute paths.
The function will not be passed any invalid paths.
Do not use built-in path-related functions.

PHP 7.1.9
*********/

class Path
{
    public $currentPath;
    function __construct($path){
        $this->currentPath = $path;
    }
    public function cd($newPath){
        $paths = explode('/',trim($this->currentPath,'/'));
		$newPaths = explode('/',$newPath);
        $count_paths = count($paths);
        $count_newPaths = count($newPaths);
          $new_parent_path = array();
          $new_child_path = array();
          $new_current_path = '';
        
        foreach($newPaths as $cd_path){
            if($cd_path == '..')
            {
                $count_paths--;
            }else{
                $new_child_path[] = $cd_path; 
            }
        }
        for($i=0; $i<$count_paths; $i++){
             $new_parent_path[] .= $paths[$i]; 
        } 
        $new_current_path = '/';
        $new_current_path .= (@count($new_parent_path)>0) ? @implode('/',$new_parent_path) : '';
        $new_current_path .= (@count($new_child_path)>0) ? '/'.implode('/',$new_child_path) : '';
        $this->currentPath = $new_current_path;
    }
}
$path = new Path('/a/b/c/d');
$path->cd('../x')
echo $path->currentPath;  //should display '/a/b/c/x'.
