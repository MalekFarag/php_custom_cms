<?php
class Product
{

    private $conn;

    // Note: update table names, column names in here
    public $prod_table                  = 'tbl_products';
    public $category_table              = 'tbl_category';
    public $prod_category_linking_table = 'tbl_prod_category';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProds()
    {
        //TODO:write the SQL query that returns all movies from the tbl_movies table
        // $query = 'SELECT * FROM '.$this->movies_table;


        //TODO:write the SQL query that returns all movies with its genre
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->prod_table . ' p';
        $query .= ' LEFT JOIN ' . $this->prod_category_linking_table . ' link ON link.prod_id = p.prod_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' GROUP BY p.prod_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProdsByCategory($category){
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->prod_table . ' p';
        $query .= ' LEFT JOIN ' . $this->prod_category_linking_table . ' link ON link.prod_id = p.prod_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' GROUP BY p.prod_id';
        $query .= ' HAVING category_name LIKE "%'.$category.'%"';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProdsByID($id)
    {
        $query = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name FROM ' . $this->prod_table . ' m';
        $query .= ' LEFT JOIN ' . $this->prod_category_linking_table . ' link ON link.prod_id = p.prod_id';
        $query .= ' LEFT JOIN ' . $this->category_table . ' c ON link.category_id = c.category_id ';
        $query .= ' WHERE p.prod_id=' . $id;
        $query .= ' GROUP BY p.prod_id';

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}