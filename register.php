<?php
    $name=$_POST['name'];
    $mailid=$_POST['email'];
    $password=$_POST['password'];
    $phnumber=$_POST['phnumber'];
    $db="profile.details";
    try{
        $connection=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        if($connection){
            $bulk=new MongoDB\Driver\BulkWrite;
            $bulk->insert([ 'name' => $name, '_id' => $mailid, 'password' => $password, 'phnumber' => $phnumber]);
            $connection->executeBulkWrite($db,$bulk);
        }
    }
    catch(Exception $e){
        echo "Mailid already exists... Try using someother ids";
        exit;
    }
    $servername="localhost";
    $username="root";
    $dbpassword="";
    $connection = mysqli_connect($servername,$username,$dbpassword);
    if($connection){
       $query="CREATE DATABASE IF NOT EXISTS logininfo";
       mysqli_query($connection,$query);
       mysqli_query($connection,"use logininfo");
       $query="CREATE TABLE IF NOT EXISTS credentials(
        mailid varchar(30) primary key,
        password varchar(20));";
        if(!mysqli_query($connection,$query)){
            echo mysqli_connect_error();
        }
    }
    $prepstats = $connection->prepare("INSERT INTO credentials VALUES(?,?);");
    $mailid=$_POST["email"];
    $password=$_POST["password"];
    $prepstats->bind_param("ss",$mailid,$password);
    $prepstats->execute();
    $prepstats->close();
    $connection->close();
?>
