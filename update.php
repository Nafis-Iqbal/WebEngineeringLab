<?php
include 'partials/header.php';
require __DIR__ . '/books/books.php';

if (!isset($_GET['title'])) {
    include "partials/not_found.php";
    exit;
}
$bookTitle = $_GET['title'];

$book = getBookByTitle($bookTitle);
if (!$book) {
    include "partials/not_found.php";
    exit;
}

$errors = [
    'title' => "",
    'author' => "",
    'avaiilable' => "",
    'pages' => "",
    'isbn' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = array_merge($book, $_POST);

    $book = updateBook($_POST, $bookId);
    //uploadImage($_FILES['picture'], $user);
    header("Location: index.php");

}

?>

<?php include '_form.php' ?>
