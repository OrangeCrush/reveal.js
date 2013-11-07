<?php
   require('secure.php'); //contains my database password

   //Connect to MySQL on localhost, user root and password $pw
   $conn = mysql_connect('127.0.0.1', 'root', $pw);

   //Use database 'library'  (create with "CREATE DATABASE library;" from a mysql terminal)
   mysql_select_db('library');

   //Build and run a query to select all books from the BOOKS table.
   $getBooksQuery = 'SELECT ISBN, title, author, available from BOOKS';
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
      <h1>Welcome to the Library!</h1>
      <h2>Available Books</h2>
      <table>
         <thead>
            <th>ISBN</th> <!-- <th> is used inside of the <thead> element -->
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
         </thead>
<?
   for($i = 0; $i < mysql_num_rows($results); $i++){
      $book = mysql_fetch_row($results);
      $isbn = $book[0];
      $title = $book[1];
      $author = $book[2];
      
      //0 or 1 doesnt make sense to our users; so convert it to Yes/No instead
      $available = $book[3] == 0 ? 'No' : 'Yes';

      //each time through the loop will be another row
      //in our table, so we need to create 1 <tr> and 4 <td> elements
      //each iteration.

      echo("
         <tr>
            <td>$isbn</td> 
            <td>$title</td> 
            <td>$author</td> 
            <td>$available</td> 
        </tr>");
   }

?>


      </table>
      <a href="checkout.php">Check out</a>
      <a href="checkin.php">Check in</a>
   </body>
</html>
<? mysql_close($conn);?>
