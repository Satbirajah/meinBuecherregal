<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 13:46
 */

class BuchController
{

    public function index(){
       $view = new View('buecher_anzeigen');
       $view->title="Meine Bücher";
       $view->heading="Meine Bücher";
        $view->display();
    }

    public function create()
    {
        $view = new View('buch_create');
        $view->title="Buch hinzufügen";
        $view->heading="Buch hinzufügen";
        $view->display();

    }
    //Erstellen des Buches
    public function doCreate(){
        if($_POST['send']){
            $buchTitel=$_POST['buchTitel'];
            $autor = $_POST['autor'];
            $veroeffentlicht= $_POST['veroeffentlicht'];
            $pers_zmsf=$_POST['pers_zmsf'];
            $genre =$_POST['genre'];
            $bild="";
            //bild -->
            $uid = $_SESSION['uid'];

            $genreRepository = new GenreRepository();
            $genreID = $genreRepository->getGenre($genre);

            $buchRepository= new BuchRepository();
            $buchRepository->create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$genreID);
        }
    }

    //Damit änderungen gemacht werden können
    public function update(){

        $buchRepository= new BuchRepository();
        $buchRepository->update();

    }

    //Damit das Buch gelöscht werden kann
    public function delete(){

        $buchRepository= new BuchRepository();
        $buchRepository->update();
    }
}