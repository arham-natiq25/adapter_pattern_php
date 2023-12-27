<?php

class Getbook
{
    private $bookname;

    public function __construct($bookName)
    {
        $this->bookname = $bookName;
    }

    public function showBookName()
    {
        echo "Book Name is " . $this->bookname;

        if ($this->bookname === "mybook") {
            return "\n ...hello my book";
        } else {
            return "\n .. your book is other";
        }
    }
}

class DisplayName
{
  
    public function showName($email, $name)
    {
        echo "Your name is " . $name;
        echo "Your email is " . $email;
    }
}

interface Bookie
{
    public function testie();

    public function second($email, $name);
}

class GetbookAdapter implements Bookie
{
    private $bookName;
    private $displayName;

    public function __construct(Getbook $book, DisplayName $displayName)
    {
        $this->bookName = $book;
        $this->displayName = $displayName;
    }

    public function testie()
    {
        $val = $this->bookName->showBookName();
        echo $val;
    }

    public function second($email, $name)
    {
        $this->displayName->showName($email, $name);
    }
}

function testing(Bookie $bookie)
{
    return $bookie->second('bala@b.com', 'dummy');
}
function bookGet(Bookie $bookie)
{
    return $bookie->testie();
}

// Creating instances
$getbook = new Getbook('new book');
$displayName = new DisplayName();
$new = new GetbookAdapter($getbook, $displayName);

// Calling the testing function with the $new object
$abc = 1;
if($abc===1){
    $result = testing($new);
}
else $result = bookGet($new);

// Output the result
echo $result;
