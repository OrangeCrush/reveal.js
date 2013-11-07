<?php
   require('solution/secure.php'); //contains my database password

   //Connect to MySQL on localhost, user root and password $pw
   $conn = mysql_connect('127.0.0.1', 'root', $pw);

   //Use database 'library'  (create with "CREATE DATABASE library;" from a mysql terminal)
   mysql_select_db('library');

   //Build and run a query to select all books from the BOOKS table.
   $getBooksQuery = //TODO query to get all books
   $results = mysql_query($getBooksQuery);
?>
<html>
<!-- This is an html comment-->
   <head>
      <!-- 
           Head is used to load external stylesheets (CSS),
           scripts (.js), and set keywords used when searching the web
           Its a good practice to include it.
      -->
   </head>
   <body> <!-- Every html document MUST have a body and html element to be considered valid -->

      <!-- TODO Write php code to list every book in the library into an html table -->
   
   </body>
</html>
<? mysql_close($conn);?>
