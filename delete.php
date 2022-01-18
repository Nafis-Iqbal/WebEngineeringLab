<?php
include 'partials/header.php';
require __DIR__ . '/books/books.php';


if (!isset($_POST['title'])) {
    include "partials/not_found.php";
    exit;
}
$bookTitle = $_POST['title'];
deleteBook($bookTitle);

header("Location: index.php");
