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

    }

    //Damit änderungen gemacht werden können
    public function update(){

    }

    //Damit das Buch gelöscht werden kann
    public function delete(){

    }
}