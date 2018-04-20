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

    //für die View, damit die Bücher angezeigt werden können
    public function index(){
       $view = new View('buecher_anzeigen');
       $view->title="Meine Bücher";
       $view->heading="Meine Bücher";
       $buecher = new BuchRepository();
       $gid = $_GET['gid'];
       $view->buecher=$buecher->getBooksByUidGid($_SESSION['uid'],$gid);
        $view->display();
    }

    //für die View des Erstellen eines Buches
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
            $this->gid =$_POST['genre'];
            $uid = $_SESSION['uid'];
            $bild= $this->uploadImage($_FILES['bild'],$uid);
            $buchRepository= new BuchRepository();
            $buchRepository->create($buchTitel,$autor,$veroeffentlicht,$pers_zmsf,$bild,$uid,$this->gid);
            $genreController = new GenreController();
            $genreController->index();
        }
    }


    //damit das Bild abgespeichert wird


    public function showBooks(){
        $buchRepository = new BuchRepository();
        $buecher= $buchRepository->getBooksByUidGid($_SESSION['uid'],$this->gid);
        $view = new View('buecher_anzeigen');
        $view->buecher = $buecher;
        $view->title="Bücher ";
        $view->heading="Bücher";
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

    //für die View buch_update
    public function updateView()
    {
        $this->ugid = $_GET['id'];
        $buch = new BuchRepository();
        $view = new View('buch_update');
        $view->buch = $buch->readById($this->ugid);

        $view->title = "Buch";
        $view->heading = "Buch";
        $view->display();
    }

    //Damit Infos zum Buch geändert werden können
    public function update(){
        if($_POST['update']){

            $titel=$_POST['buchTitel'];
            $autor = $_POST['autor'];
            $veroeffentlicht= $_POST['veroeffentlicht'];
            $bild= $this->uploadImage($_FILES['bild'],$_SESSION['uid']);
            $pers_zmsf=$_POST['pers_zmsf'];
            $buchRepository= new BuchRepository();
            $isOK= $buchRepository->update($titel,$autor,$veroeffentlicht,$pers_zmsf,$this->ugid,$bild);
            if($isOK ){
                $this->showBooks();
            }
        }


    }

    //Damit das Buch gelöscht werden kann

    /**
     * @throws Exception
     */
    public function delete(){
        if($_POST['delete']){
            $buchRepository= new BuchRepository();
            $isOK= $buchRepository->deleteById($_GET['id']);
            if($isOK ){
                $this->showBooks();
            }
        }

    }
}