<?php
/**
 * Created by PhpStorm.
 * username: zhujunlong
 * Date: 2018/12/5
 * Time: 15:55
 */
try{
    $conn = new PDO("mysql:host='servername';dbname='dbname'",'username','password');
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $conn->exec('insert into tables (username,pass) VALUE ("username1","123")');
    $conn->exec('update tablename set username="username2" where username="username1"');
    $conn->exec('delete from tablename where username="username1"');
    $conn->commit();
    $conn->query('select * from tablename');
    $sql='insert into tablename (username,pass) values ("user2","321")';
    $conn->exec($sql);
    $sql='update tablename set username="user1" where username="user1"';
    $conn->exec($sql);
    $sql='delete from tablename where udername="user2"';
    $conn->exec($sql);
    $sql='select * FROM tablename';
    $conn->query($sql);
    $conn->beginTransaction();
    $conn->commit();
    $conn->prepare("insert into tablename (username,pass) VALUE (:username,:pass)");
    $conn->bindparam(':username',$username);
    $conn->bindparam(':pass',$pass);

    $username='user2';
    $pass='123';
    $conn->execute();

    $usernmae='user2';
    $pass='321';
    $conn->exectue();

}
catch (PDOException $e){
    $conn->rollBack();
    echo "error:".$e->getMessage();
}

$conn=null;