<!DOCTYPE html>
<html lang="en">
<head>
   <title>Message Board</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
   <h1>Message Board</h1>
   <form method="post" action="add_message.php">
      <p>
         <label for="text">Message?</label>
         <textarea id="text" name="text" rows="4" cols="50"></textarea>
      </p>
      <p>
         <label for="name">Name?</label>
         <input type="text" id="name" name="name">
      </p>
      <input type="submit" value="Post">
   </form>
   <main>
   <?php 

require "./util.php";
require "./db/Database.php";
$db = new Database;

// Show all the messages
$messages = $db->getMessages();
foreach ($messages as $msg) {

   // Escape any HTML to prevent HTML injection
   $msgText = htmlspecialchars($msg->text);
   $msgName = htmlspecialchars($msg->name);

   echo "
      <div class=\"message\">
         <div>
            <p>$msgText</p>
            <a href=\"delete_message.php?id=$msg->id\">X</a>
         </div>
         <div>
            <p>$msgName</p>
            <p>", relativeTime($msg->postTime), "</p>
         </div>
      </div>";
}
   ?>
   </main>
</body>
</html>