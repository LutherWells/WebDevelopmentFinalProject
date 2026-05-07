<?php 

//include_once "./db/Database.php";

require "./db/Database.php";
$messRunner = new Database;

if (!empty($_POST["text"]) && !empty($_POST["name"])) {

   // Get values submitted from form in index.php
   $text = trim($_POST["text"]);
   $name = trim($_POST["name"]);

   // Truncate strings that are too long
   $text = mb_strimwidth($text, 0, 100, "...");
   $name = mb_strimwidth($name, 0, 30);

   // TODO: Type your code here
   

   //Database->testing();
   
   $messRunner->addMessage($text, $name);
   
}

// Redirect the browser to index.php
header("Location: index.php");

?>