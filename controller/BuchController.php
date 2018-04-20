<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 17.04.2018
 * Time: 13:46
 */

require_once '../repository/BuchRepository.php';
require_once '../repository/GenreRepository.php';
require_once 'GenreController.php';

class BuchController
{
    protected $book = null;
    protected $ugid= NULL;
    protected $gid = NULL;
    public function index(){
       $view = new View('buecher_anzeigen');
       $view->title="Meine Bücher";
       $view->heading="Meine Bücher";
       $buecher = new GenreRepository();
       $view->buecher=$buecher->getGenreByUID($_SESSION['uid']);
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
            echo $_POST['genre'];
            $uid = $_SESSION['uid'];
            $bild= $this->uploadImage($_FILES['bild'],$uid);
            $genreRepository = new GenreRepository();
            $gid = $genreRepository->getGenre($genre);

            $buchRepository= new BuchRepository();
            $buchRepository->create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$gid);

            $genreController = new GenreController();
            $genreController->index();
        }
    }


    public function showBooks(){
        $buchRepository = new BuchRepository();
        $buecher= $buchRepository->getBooksByUidGid($_SESSION['uid'],$this->gid);
        $view = new View('buecher_anzeigen');
        $view->buecher = $buecher;
        $view->title="Bücher ";
        $view->heading="Buücher";
        $view->display();

    }
    public function uploadImage($file, $uid )
    {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $timestamp = time();
        $file_destination = "../public/images/" . $uid . $timestamp . '.' . $ext;
        move_uploaded_file($file['tmp_name'], $file_destination);

        return $file_destination;
    }

  //Damit änderungen gemacht werden können
    public function updateView($id)
    {
        $this->ugid = $id;
        $buch = new BuchRepository();
        $view = new View('buecher_update');
        $view->buech = $buch->readById($this->ugid);
        $view->title = "Buch";
        $view->heading = "Buch";
        $view->display();
    }
    public function update(){
        if($_POST['send']){

            $titel=$_POST['buchTitel'];
            $autor = $_POST['autor'];
            $veroeffentlicht= $_POST['veroeffentlicht'];
            $bild= $this->uploadImage($_FILES['bild'],$_SESSION['uid']);
            $pers_zmsf=$_POST['pers_zmsf'];
            $buchRepository= new BuchRepository();
            $buchRepository->update($titel,$autor,$veroeffentlicht,$pers_zmsf,$this->ugid,$bild);
        }


    }

    //Damit das Buch gelöscht werden kann
    public function delete($ugid){
        //zuerts ugId holen
        $buchRepository= new BuchRepository();
        $buchRepository->deleteById($ugid);
    }
}