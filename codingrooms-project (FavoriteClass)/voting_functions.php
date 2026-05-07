<?php

function appendVoteToFile($fileName, $year, $favorite) {
   // TODO: Write your solution here
   if (is_writable($fileName)){
      $thefile = fopen($fileName, "a");
      $string = $year . "," . $favorite . PHP_EOL;
      //console.log($string);
      if ($thefile){
         fwrite($thefile, $string);
         fclose($thefile);
         
      }

   }
   
   
}

function tallyVotes($fileName, &$votes) {
   // TODO: Write your solution here
   if (is_readable($fileName)){
      $thefile = fopen($fileName, "r");
      if ($thefile){
         while ($line = fgets($thefile)) {
            $line = trim($line);
            $parts = explode(",", $line);
            tallyVote($votes, $parts[0], $parts[1]);
         }
         fclose($thefile);
         return true;
      }
   }
   else{
      return false;
   }
}
  
function tallyVote(&$votes, $year, $favorite) {
   $years = ["Freshman", "Sophomore", "Junior", "Senior"];
   $yearIndex = array_search($year, $years);  
   $votes[$favorite][$yearIndex]++;
}

function votesTable($votes) {
   $output = "<table id='tblVotes'><tr>";
   $output .= "<caption><h3>Course Votes</h3></caption>";
   $output .= "<th class='th_wide'>Course</th>";
   $output .= "<th>Freshman</th>";
   $output .= "<th>Sophomore</th>";
   $output .= "<th>Junior</th>";
   $output .= "<th>Senior</th>";
   $output .= "<th>Total</th>";
   $output .= "</tr>";
   $freshmanTotal = 0;
   $sophomoreTotal = 0;
   $juniorTotal = 0;
   $seniorTotal = 0;
   foreach ($votes as $course => $counts) {
      $output .= "<tr>";
      $output .= "<td class='td_left'>$course</td>";
      $output .= "<td>$counts[0]</td>";
      $output .= "<td>$counts[1]</td>";
      $output .= "<td>$counts[2]</td>";
      $output .= "<td>$counts[3]</td>";
      $freshmanTotal = $freshmanTotal + $counts[0];
      $sophomoreTotal = $sophomoreTotal + $counts[1];
      $juniorTotal = $juniorTotal + $counts[2];
      $seniorTotal = $seniorTotal + $counts[3];
      $courseTotal = $counts[0] + $counts[1] + $counts[2] + $counts[3];
      $output .= "<td>$courseTotal</td>";
      $output .= "</tr>";
   }
   $output .= "<tr>";
   $output .= "<th class='th_wide'>Total</th>";
   $output .= "<th>$freshmanTotal</th>";
   $output .= "<th>$sophomoreTotal</th>";
   $output .= "<th>$juniorTotal</th>";
   $output .= "<th>$seniorTotal</th>";
   $classTotal = $freshmanTotal + $sophomoreTotal + $juniorTotal + $seniorTotal;
   $output .= "<th>$classTotal</th>";
   $output .= "</tr>";
   $output .= "</table>";   
   return $output;
}

?>
