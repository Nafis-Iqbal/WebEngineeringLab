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

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <b><?php echo $book['title'] ?></b></h3>
        </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="update.php?title=<?php echo $book['title'] ?>">Update</a>
            <form style="display: inline-block" method="POST" action="delete.php">
                <input type="hidden" name="title" value="<?php echo $book['title'] ?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Title:</th>
                <td><?php echo $book['title'] ?></td>
            </tr>
            <tr>
                <th>Author:</th>
                <td><?php echo $book['author'] ?></td>
            </tr>
            <tr>
                <th>Available:</th>
                <td><?php echo $book['available'] ?></td>
            </tr>
            <tr>
                <th>Pages:</th>
                <td><?php echo $book['pages'] ?></td>
            </tr>
            <tr>
                <th>ISBN:</th>
                <td><?php echo $book['isbn'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include 'partials/footer.php' ?>