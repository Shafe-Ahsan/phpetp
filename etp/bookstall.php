<?php

class Book {
    // Private properties
    private $title;
    private $author;
    private $price;

    // Constructor (optional)
    public function __construct($title = "", $author = "", $price = 0.0) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    // Getter for title
    public function getTitle() {
        return $this->title;
    }

    // Setter for title
    public function setTitle($title) {
        if (!empty(trim($title))) {
            $this->title = htmlspecialchars($title);
        } else {
            throw new Exception("Title cannot be empty.");
        }
    }

    // Getter for author
    public function getAuthor() {
        return $this->author;
    }

    // Setter for author
    public function setAuthor($author) {
        if (!empty(trim($author))) {
            $this->author = htmlspecialchars($author);
        } else {
            throw new Exception("Author cannot be empty.");
        }
    }

    // Getter for price
    public function getPrice() {
        return $this->price;
    }

    // Setter for price
    public function setPrice($price) {
        if (is_numeric($price) && $price >= 0) {
            $this->price = round($price, 2);
        } else {
            throw new Exception("Price must be a non-negative number.");
        }
    }

    // Method to display book details
    public function displayBookDetails() {
        return "Title: {$this->getTitle()}, Author: {$this->getAuthor()}, Price: \${$this->getPrice()}";
    }
}

// Program to manage multiple Book objects
try {
    $books = [];

    // Creating and setting properties for Book 1
    $book1 = new Book();
    $book1->setTitle("The Great Gatsby");
    $book1->setAuthor("F. Scott Fitzgerald");
    $book1->setPrice(10.99);
    $books[] = $book1;

    // Creating and setting properties for Book 2
    $book2 = new Book();
    $book2->setTitle("1984");
    $book2->setAuthor("George Orwell");
    $book2->setPrice(8.99);
    $books[] = $book2;

    // Creating and setting properties for Book 3
    $book3 = new Book();
    $book3->setTitle("To Kill a Mockingbird");
    $book3->setAuthor("Harper Lee");
    $book3->setPrice(12.49);
    $books[] = $book3;

    // Displaying all book details
    echo "<h1>Book List</h1>";
    foreach ($books as $book) {
        echo "<p>" . $book->displayBookDetails() . "</p>";
    }

} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>
