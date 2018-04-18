<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 08:36
 */

class GenreRepository extends Repository
{
    protected $tablename = "genre";

    //Genre ID wird zurück gegeben (privater Bereich)
    public function getGenre($genre){
        $query = "SELECT id FROM {$this->table} WHERE genre=?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_params('s',$genre);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->getResult();
            return $resultat;
        }

    }

}