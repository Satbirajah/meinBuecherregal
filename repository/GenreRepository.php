<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 08:36
 */
require_once '../lib/Repository.php';

class GenreRepository extends Repository{
    protected $tableName = "genre";

    //Genre ID wird zurück gegeben (privater Bereich)
    public function getGenre($genre){
        $query = "SELECT id FROM {$this->tableName} WHERE genre=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s',$genre);
<<<<<<< HEAD
        if (!$statement->execute()) {
=======

        if(!$statement->execute()){
>>>>>>> 19d67420bd130c82269183231d0743ff67abc86f
            throw new Exception($statement->error);
        }
        else{
            $result = $statement->get_result();
            $genreID = $result -> fetch_object();
            return $genreID;
        }

    }

    public function getGenreByUID(){
        $query= "SELECT * FROM user_genre_buch as ugb JOIN genre as g ON ugb.gid= g.id WHERE uid = ? GROUP BY gid";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$_SESSION['uid']);
        if(!$statement->execute()){
        throw new Exception($statement->error);
        }
        else{
            $result = $statement->get_result();
            $genres= array();
            while ($row = $result->fetch_object()) {

                $genres[] = $row;

            }
            return $genres;
        }


    }


}