<?php
require 'books/books.php';

$books = getBooks();

include 'partials/header.php';
?>


<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new book</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
            <th>Pages</th>
            <th>ISBN</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $book['title'] ?></td>
                <td><?php echo $book['author'] ?></td>
                <td><?php echo $book['available'] ?></td>
                <td><?php echo $book['pages'] ?></td>
                <td><?php echo $book['isbn'] ?></td>
                <td>
                    <a href="view.php?title=<?php echo $book['title'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?title=<?php echo $book['title'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="title" value="<?php echo $book['title'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>

