<?php
require_once '../lib/Repository.php';

class BuchRepository extends Repository
{
    protected $tableName = "user_genre_buch";
    public function create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID){
        $query = "INSERT INTO $this->tablename (uid,gid,titel,autor,veroeffentlicht,bildPfad,pers_zmsf) VALUES ( ?, ?, ?,?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iisssss',$uid,$genreID,$buchTitel,$autor,$veroeffentlicht,$bild,$pers_zmsf);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        else{
            return $statement->insert_id;
        }
    }

    public function update($titel,$autor,$veroeffentlicht,$pers_zmsf,$ugid){

        $query="UPDATE $this->tableName SET titel = ? , autor= ? ,veroeffentlicht = ?, pers_zmsf=? WHERE ugid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssssi',$titel,$autor,$veroeffentlicht,$pers_zmsf, $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->getResult();
            $user = $resultat-> fetch_object();
            return $user;
        }
    }

    public function delete(){

    }

    public function getBook($titel,$autor,$veroeffentlicht,$pers_zmsf){

        $query= "SELECT * FROM $this->tableName WHERE ugid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss',$titel,$autor,$veroeffentlicht,$pers_zmsf);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->getResult();
            $book = $resultat-> fetch_object();
            return $book;
        }
    }
}