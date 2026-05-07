<!DOCTYPE html>
<html lang="en">
<head>
   <title>Favorite Class Voting</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
   <h1>Favorite Class Voting</h1>

   <?php

   $votes = [
      "Art History 476" => [0, 0, 0, 0],
      "Biology 170" => [0, 0, 0, 0],
      "Business 440" => [0, 0, 0, 0],
      "Calculus 116" => [0, 0, 0, 0],
      "Chemistry 230" => [0, 0, 0, 0],
      "Computer Science 274" => [0, 0, 0, 0],
      "Geography 309" => [0, 0, 0, 0],
      "History 417" => [0, 0, 0, 0],
      "Physics 240" => [0, 0, 0, 0],
      "Political Science 321" => [0, 0, 0, 0]];

   require "./voting_functions.php";
   if (empty($_POST["year"]) || empty($_POST["favorite"])) {
      echo "<h2>Error: Year or favorite class not chosen.</h2>";
   }
   else {
      echo "<h3>Your vote: $_POST[year] and $_POST[favorite]</h3>";
      $fileName = "votes_file.txt";
      if (appendVoteToFile($fileName, $_POST["year"], $_POST["favorite"]) &&
         tallyVotes($fileName, $votes)) {
         echo votesTable($votes);
      }
      else {
         echo "<p>Unable to open $fileName.</p>";
      }
   }
   
   ?>
   <a href="index.html">Vote Again!</a>

</body>
</html>
