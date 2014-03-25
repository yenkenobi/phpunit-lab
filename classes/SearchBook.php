<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/9/14
 * Time: 6:46 PM
 */

class SearchBook {
    protected $books;

    public function __construct($books) {
        $this->books = $books;
    }

    public function find($string, $exact = false) {
        $result = array();

        if ($exact) {
            foreach ($this->books as $book) {
                if (strcasecmp($book['title'], $string) == 0) {
                    array_push($result, $book);
                }
            }
        }
        else {
            foreach ($this->books as $book) {
                if (stripos($book['title'], $string) !== false) {
                    array_push($result, $book);
                }
            }
        }
        if (count($result)) {
            return $result;
        }
        else {
            return false;
        }

    }

} 