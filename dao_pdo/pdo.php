<?php
function pdo_get_connection()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO("mysql:host=$host;dbname=duan1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Failed" . $e->getMessage();
    }
    
}
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $sme = $conn->prepare($sql);
        $sme->execute($sql_args);
        return $conn;
    }
    catch(PDOException $e){
       throw $e;
    }
    finally{
        unset($conn);
    }
}
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $sme = $conn->prepare($sql);
        $sme->execute($sql_args);
        $rows = $sme->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
       throw $e;
    }
    finally{
        unset($conn);
    }
}
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $sme = $conn->prepare($sql);
        $sme->execute($sql_args);
        $row = $sme->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    catch(PDOException $e){
       throw $e;
    }
    finally{
        unset($conn);
    }
}

?>