<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		@header("location:loginScreen.html");
	}
	$bookName=$_POST['bookName'];
	$username=$_SESSION['username'];
	try
	{
		$db=new PDO('mysql:host=localhost;port=3306;dbname=BooksDetails','root','root');
		$db->exec("delete from books where bookName='".$bookName."'");
		unlink("books/".$bookName.".txt");
		echo "record deleted";
		@header("location:deleteContent.php");

	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}

?>