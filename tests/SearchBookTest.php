<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/9/14
 * Time: 6:38 PM
 */

require(__DIR__."/../classes/SearchBook.php");

class SearchBookTest extends PHPUnit_Framework_Testcase {

    public $books;

    public function setUp(){
        $this->books = [
            [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
            [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
            [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
            [ 'title' => 'Head First Java', 'pages' => 200 ]
        ];
    }

    public function test_search() {

        $expected_result = [
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
        ];

        $search = new SearchBook($this->books);

        $results = $search->find('javascript');

        $this->assertEquals($results, $expected_result);

    }

    public function test_search_with_exact() {

        $expected_result = [
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
        ];

        $search = new BookSearch($this->books);

        $results = $search->find('javascript web applications', true);


        $this->assertEquals($results, $expected_result);

    }

    public function test_search_unavailable_book() {

        $search = new BookSearch($this->books);

        $results = $search->find('The Definitive Guide to Symfony', true);

        $this->assertFalse($results);

    }
}