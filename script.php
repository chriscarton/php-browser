<?php

if(!empty($_GET['f'])){
    $file = $_GET['f'];

    $ext = pathinfo($file,PATHINFO_EXTENSION);

    $file_without_ext = str_replace($ext,'',$file);
    
    //Slash ou anti-slash en cas de windows...
    $explode = explode('\\',$file);
    $filename = end($explode);
    $folder = str_replace($filename,'',$file);

    $rii = new IteratorIterator(new DirectoryIterator($folder));

    $other_files = [];
    foreach($rii as $result){
        if($result->isFile()){

            $other_file = [];

            $other_file['ext'] = $result->getExtension();
            $other_file['filename'] = $result->getFilename();
            $other_file['path'] = $result->getPath();
            $other_file['fullpath'] = $result->getPath().'/'.$result->getFilename();

            $other_files[] = $other_file;
        }
    }
    require_once('view.php');

}else{
    require_once('browse.php');
}
