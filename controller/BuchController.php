<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 13:46
 */

require_once '../repository/BuchRepository.php';
require_once '../repository/GenreRepository.php';
class BuchController
{
    protected $book = null;
    public function index(){
       $view = new View('buecher_anzeigen');
       $view->title="Meine Bücher";
       $view->heading="Meine Bücher";
        $view->display();
    }

    public function create()
    {

        $genreRepository = new GenreRepository();
        $genres = $genreRepository -> readAll();



        $view = new View('buch_create');
        $view->genres = $genres;
        $view->title="Buch hinzufügen";
        $view->heading="Buch hinzufügen";
        $view->display();

    }
    //Erstellen des Buches
    public function createBook(){
        if($_POST['send']){
            $buchTitel=$_POST['buchTitel'];
            $autor = $_POST['autor'];
            $veroeffentlicht= $_POST['veroeffentlicht'];
            $pers_zmsf=$_POST['pers_zmsf'];
            $genre =$_POST['genre'];
            $bild="";
            //bild -->noch machen
            $uid = $_SESSION['uid'];

            $genreRepository = new GenreRepository();
            $genreID = $genreRepository->getGenre($genre);

            $buchRepository= new BuchRepository();
            $buchRepository->create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID);
        }
    }


    //Damit änderungen gemacht werden können
    public function update($ugid){

        if($_POST['send']){
            //zuerst ugid holen vom buch
            //neue werte holen
            $titel=$_POST['buchTitel'];
            $autor = $_POST['autor'];
            $veroeffentlicht= $_POST['veroeffentlicht'];
            $pers_zmsf=$_POST['pers_zmsf'];
            $genre =$_POST['genre'];
            $buchRepository= new BuchRepository();
            $buchRepository->update($titel,$autor,$veroeffentlicht,$pers_zmsf,$ugid);
        }


    }

    //Damit das Buch gelöscht werden kann
    public function delete($ugid){
        //zuerts ugId holen
        $buchRepository= new BuchRepository();
        $buchRepository->deleteById($ugid);
    }
}