<?php
   require('solution/secure.php'); //contains my database password

   //Connect to MySQL on localhost, user root and password $pw
   $conn = mysql_connect('127.0.0.1', 'root', $pw);

   //Use database 'library'  (create with "CREATE DATABASE library;" from a mysql terminal)
   mysql_select_db('library');

   //Build and run a query to select all books from the BOOKS table.
   //Only if someone has submitted a book to check in though!
   $results = [];
   if($_POST['ISBN'] != ""){
      $getBookQuery = //TODO build query for getting books that are currently checked in (to see if they can be checked out)
      $results = mysql_query($getBookQuery);
   }
?>
<html>
   <head>
   </head>
   <body>
      <!--
          TODO build a form to allow users to enter the ISBN of a book to check out,
          and output if whether or not a given ISBN submitted was actually checked out or not
      -->
   <a href="index.php">Home</a>
   </body>
</html>
