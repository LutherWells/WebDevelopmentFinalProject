<?php 

require_once "./db/Message.php";


class Database {
   private $mysqli;  
 
   function __construct() {
      $dbHost = "127.0.0.1";
      $dbName = "zybooksdb";
      $dbUsername = "root";
      $dbPassword = "";
      $this->mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
   }

   function addMessage($text, $name) {
      // TODO: Your code goes here
      echo '<p>What</p>';
      $prep = $this->mysqli->prepare("INSERT INTO message (text, name, posted) VALUES (?, ?, NOW())");
      $prep->bind_param("ss", $text, $name);
      $prep->execute();
      //$result = $prep->get_result();
      //return $result;
   }

   function deleteMessage($messageId) {
      // TODO: Your code goes here
      $prep = $this->mysqli->prepare("DELETE FROM message WHERE id = ?");
      $prep->bind_param("i", $messageId);
      $prep->execute();
   }

   function testing(){
      return ("<p>HELLO</p>");
   }

   function getMessages() {
      $messages = [];
      $mess = $this->mysqli->query("SELECT * FROM message ORDER BY posted DESC");
      // TODO: Your code goes here
      

      while ($row = $mess->fetch_row()) {
         //echo "<script>console.log('PHP Message: ' + $row);</script>";
         $messages[] = new Message($row[0], $row[1], $row[2], $row[3]);
         
      }
      
      


      return $messages;
   }
}

?>