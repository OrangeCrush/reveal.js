<?php
   require('secure.php'); //contains my database password

   //Connect to MySQL on localhost, user root and password $pw
   $conn = mysql_connect('127.0.0.1', 'root', $pw);

   //Use database 'library'  (create with "CREATE DATABASE library;" from a mysql terminal)
   mysql_select_db('library');

   //Build and run a query to select all books from the BOOKS table.
   //Only if someone has submitted a book to check in though!
   $results = [];
   if($_POST['ISBN'] != ""){
      $getBookQuery = 'SELECT available from BOOKS where available=1 AND ISBN=' . $_POST['ISBN'];
      $results = mysql_query($getBookQuery);
   }
?>
<html>
   <head>
   </head>
   <body>
      <h1>Check Books Out</h1>
      <p>What would you to checkin?</p>
      <form method="POST" action="checkout.php">
         <b>ISBN:</b>
         <!-- The name attribute on the input below decides what will be posted to $_POST[] in php-->
         <input name="ISBN" type="text"></input>
         <input type="submit" value="Check in!"></input>
      </form>
<?
   //If a book was submitted for check in; update the book's available status to 0, and
   //congradulate the user!

   //First; check if the book was actually checked out
   if(mysql_num_rows($results) > 0){
     $updateQuery = "UPDATE BOOKS SET available=0 WHERE isbn=" . $_POST['ISBN'];
     mysql_query($updateQuery);
?>
     <b>Book checked out successfully! Thanks!</b><br>
<?
   }else if($_POST['ISBN'] != ""){
?>
      <b>Book could not be checked out</b><br>
<?
   }

?>
   <a href="index.php">Home</a>
   </body>
</html>
