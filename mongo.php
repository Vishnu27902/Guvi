<?php
    $db="profile.details";
    $connection=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    if($connection){
        $bulk=new MongoDB\Driver\BulkWrite;
        
    }
?>