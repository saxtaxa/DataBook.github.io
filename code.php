<?php

session_start();
require 'dbcon.php';

if (isset($_POST['save_book'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $year = mysqli_real_escape_string($con, $_POST['year']);

    $query = "INSERT INTO book (title, price, author, publication_year) VALUES ('$title','$price','$author','$year')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        // echo "Saved";
        $_SESSION['message'] = "Book Added";
        header('Location: book-create.php');
        exit(0);
    } else {
        // echo "Not Saved";
        $_SESSION['message'] = "Book Not Added";
        header('Location: book-create.php');
        exit(0);
    }
}
