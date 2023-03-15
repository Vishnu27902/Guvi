<?php    
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
    else{
        die("Connection failed: ".mysqli_connect_error());
    }
    $prepstats = $connection->prepare("INSERT INTO credentials VALUES(?,?);");
    $mailid=$_POST["email"];
    $password=$_POST["password"];
    $prepstats->bind_param("ss",$mailid,$password);
    $prepstats->execute();
    // header('Access-Control-Allow-Origin: register.html');
    // echo "Login Successfull";

    $prepstats->close();
    $connection->close();
?>