<?php

if(!empty($_GET['f'])){
    $file = $_GET['f'];

    require_once('view.php');

}else{
    require_once('browse.php');
    //Include ici
}
