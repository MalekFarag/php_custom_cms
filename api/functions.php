<?php 
$db       = Database::getInstance()->getConnection();
class Prod
{
    private $conn;

    // Note: update table names, column names in here
    // public $movie_table               = 'tbl_movies';
    // public $category_table               = 'tbl_genre';
    // public $movie_genre_linking_table = 'tbl_mov_genre';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getProds()
    {
        //TODO:write the SQL query that returns all movies from the tbl_movies table
        // $query = 'SELECT * FROM '.$this->movies_table;


        //TODO:write the SQL query that returns all movies with its genre
        // $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        // $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        // $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        // $query .= ' GROUP BY m.movies_id';

        $query = "SELECT * FROM tbl_products";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProdsByCategory($category){
        // $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        // $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        // $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        // $query .= ' GROUP BY m.movies_id';
        // $query .= ' HAVING genre_name LIKE "%'.$category.'%"';

        $query = "SELECT * FROM tbl_products WHERE category = $category";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    public function getProdByID($id)
    {
        // $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) as genre_name FROM ' . $this->movie_table . ' m';
        // $query .= ' LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON link.movies_id = m.movies_id';
        // $query .= ' LEFT JOIN ' . $this->genre_table . ' g ON link.genre_id = g.genre_id ';
        // $query .= ' WHERE m.movies_id=' . $id;
        // $query .= ' GROUP BY m.movies_id';

        $query = "SELECT * FROM tbl_products WHERE id = $id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}








// // getting all products
// function getProds(){

//     $pdo = Database::getInstance()->getConnection();

//     $query = 'SELECT * FROM tbl_products';
    
//     $prod_set = $pdo->prepare($query);
//     $prod_set->execute();

//     return $prod_set;

// }

// //getting products by category
// function getProdsByCategory($category){

//     $pdo = Database::getInstance()->getConnection();

//     $query = "SELECT * FROM tbl_products WHERE category = $category";
    
//     $prod_set = $pdo->prepare($query);
//     $prod_set->execute();

//     return $prod_set;

// }


//after


// initialize object
$prod = new Prod($db);

// query movies
if (isset($_GET['id'])) {
    $stmt = $prod->getProdByID($_GET['id']);
} else if(isset($_GET['category'])){
    $stmt = $prod->getProdByCategory($_GET['category']);
}else {
    $stmt = $prod->getProds();
}

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // movies array
    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $single_prod = $row;
        $results[]    = $single_prod;
    }

} else {
    echo json_encode(
        array(
            "message" => "No prods found.",
        )
    );
}