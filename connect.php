<?php

    try {
      $myPDO = new PDO("mysql:host=localhost;dbname=dbweb;charset=utf8", "root", "");
    } catch (PDOException $e) {
      echo "Connection Terminated " . $e->getMessage();
    }
?>