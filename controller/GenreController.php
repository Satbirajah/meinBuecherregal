<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 08:36
 */

require_once '../repository/GenreRepository.php';


class GenreController
{
    public function index(){
        if(strlen($_SESSION['uid'])>0){
            $genreRepository = new GenreRepository();
            $view =new view('genre_privat');
            $view->title = 'Meine Genres';
            $view->heading = 'Meine Genres';
            $view->genres= $genreRepository->getGenreByUID();
            $view->display();
        }
        else{

            $genreRepository = new GenreRepository();

            $view = new view('genre_public');
            $view->title = 'Alle Genres';
            $view->heading = 'Alle Genres';
            $view->genres= $genreRepository->readAll();
            $view->display();
        }
    }


}