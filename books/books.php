<?php

function getBooks()
{
    return json_decode(file_get_contents(__DIR__ . '/books.json'), true);
}

function getBookByTitle($title)
{
    $books = getBooks();
    foreach ($books as $book) {
        if ($book['title'] == $title) {
            return $book;
        }
    }
    return null;
}

function createBook($data)
{
    $books = getBooks();

    $books[] = $data;

    putJson($books);

    return $data;
}

function updateBook($data, $title)
{
    $updateBook = [];
    $books = getBooks();
    foreach ($books as $i => $book) {
        if ($book['title'] == $title) {
            $books[$i] = $updateBook = array_merge($book, $data);
        }
    }

    putJson($books);

    return $updateBook;
}

function deleteBook($title)
{
    $books = getBooks();

    foreach ($books as $i => $book) {
        if ($book['title'] == $title) {
            array_splice($books, $i, 1);
        }
    }

    putJson($books);
}

/*
function uploadImage($file, $user)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}
*/

function putJson($books)
{
    file_put_contents(__DIR__ . '/books.json', json_encode($books, JSON_PRETTY_PRINT));
}

/*
function validateBook($book, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$book['author']) {
        $isValid = false;
        $errors['author'] = 'Author is mandatory';
    }
    // if (!$book['available'] || strlen($book['available']) < 6 || strlen($book['available']) > 16) {
    //     $isValid = false;
    //     $errors['available'] = 'Available is required and it must be more than 6 and less then 16 character';
    // }
    if ($book['pages'] && !filter_var($book['pages'], FILTER_VALIDATE_PAGES)) {
        $isValid = false;
        $errors['pages'] = 'This must be a valid pages address';
    }

    if (!filter_var($book['isbn'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['isbn'] = 'This must be a valid isbn number';
    }
    // End Of validation

    return $isValid;
}
*/
