<?php
require("dbvezerlo.php");

class Oscar {
    
    private $db;

    public function __construct() {
        $this->db = new DBController();
    }

    public function getAllFilms() {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie";
        return $this->db->executeSelectQuery($query);
    }

    public function getFilmsById($FilmId) {
        $query = "SELECT m_ID, title, m_desc, pic FROM movie WHERE m_ID = ?";
        return $this->db->executeSelectQuery($query, [$FilmId]);
    }

    public function getFilmsByType($Mt_name) {
        $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_description 
                  FROM movie 
                  INNER JOIN movie_type ON movie_type.mt_ID = movie.m_type 
                  WHERE movie_type.Mt_name = ?";
        return $this->db->executeSelectQuery($query, [$Mt_name]);
    }

    public function __destruct() {
        $this->db->closeDB();
    }
}
?>