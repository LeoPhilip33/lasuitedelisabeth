<?php

        /* 
        
        $hostBD = "lasuiteddhadmin.mysql.db";
        $nomBD = "lasuiteddhadmin";
        $userBD = "lasuiteddhadmin";
        $passBD = "ElisabethSuite33ADMIN";

        */
        
        $hostBD = "localhost";
        $nomBD = "lasuiteddhadmin";
        $userBD = "root";
        $passBD = "";


        try{
                $bdPdo = new PDO("mysql:dbname=$nomBD;host=$hostBD;charset=utf8", $userBD, $passBD) ;
        }
        catch (PDOException $error)
        {
                die('Erreur : ' . $error->getMessage());
        }

?>