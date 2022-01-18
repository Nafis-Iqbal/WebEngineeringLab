<?php
include 'partials/header.php';
require __DIR__ . '/books/books.php';


$book = [
    'title' => '',
    'author' => '',
    'available' => '',
    'pages' => '',
    'isbn' => '',
];

$errors = [
    'title' => "",
    'author' => "",
    'available' => "",
    'pages' => "",
    'isbn' => "",
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = array_merge($book, $_POST);

    $book = createBook($_POST);
    //uploadImage($_FILES['picture'], $user);
    header("Location: index.php");
}

?>

<?php include '_form.php' ?>

