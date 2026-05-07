<?php 

require "./db/Database.php";
$messRunner = new Database;

if (!empty($_GET["id"])) {

   // Get message id submitted from index.php
   $id = trim($_GET["id"]);

   // TODO: Type your code here
   $messRunner->deleteMessage($id);

}

// Redirect the browser to index.php
header("Location: index.php");

?>