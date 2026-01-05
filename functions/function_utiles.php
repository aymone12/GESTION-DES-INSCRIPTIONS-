<?php 
//connecter bd
function connecter_db()
{

    //gestion des exceptions
       try {

        $pdo = new PDO("mysql:host=localhost;dbname=db_cours_inscription", "root", "");

        // Set PDO to throw exceptions on errors, which is recommended for error handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
        // echo "Connected to $dbname successfully!";
    } catch (PDOException $e) {
        // Handle connection errors
        echo "Connection failed: " . $e->getMessage();
       
    }
}