<?php
require_once '../lib/Repository.php';

class BuchRepository extends Repository
{
    protected $tableName = "user_genre_buch";
    protected $primaryKey = 'ugID';

    public function create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID){
        echo $uid;
        $query = "INSERT INTO $this->tableName (uid,gid,titel,autor,veroeffentlicht,bildName,pers_zmsf) VALUES (?,?,?,?,?,?,?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->bind_param('iisssss',$uid,$genreID,$buchTitel,$autor,$veroeffentlicht,$bild,$pers_zmsf);

        if (!$statement->execute()) {
            throw new Exception($statement->errorgit);
        }

        return $statement->insert_id;

    }

    public function update($titel,$autor,$veroeffentlicht,$pers_zmsf,$ugid,$bild){

        $query="UPDATE $this->tableName SET titel = ? , autor= ? ,veroeffentlicht = ?, pers_zmsf=?, bildName = ? WHERE ugid = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssssi',$titel,$autor,$veroeffentlicht,$pers_zmsf,$bild, $ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        
        return true;

    }

    public function getBook($ugid){

        $query= "SELECT * FROM $this->tableName WHERE id = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i',$ugid);
        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        else{
            $resultat = $statement->get_result();
            $book = $resultat->fetch_assoc();
            return $book;
        }

    }


    public function getBooksByUidGid($uid, $gid){
        $query= "SELECT * FROM $this->tableName WHERE uid = ? AND gid = ?";


        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii',$uid,$gid);

        if(!$statement->execute()){
            throw new Exception($statement->error);
        }
        $result= $statement->get_result();
        $books = array();
        while ($book = $result->fetch_object()) {
            $books[] = $book;
        }
       return $books;
    }
}