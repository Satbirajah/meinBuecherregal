<section class="intro" >
    <div class="introBox">
        <div class="content">


<?php
/**
 * Created by PhpStorm.
 * User: bburki
 * Date: 18.04.2018
 * Time: 09:22
 */



$form = new Form('/buch/createBook');

echo $form->text()->label('Nickname')->name('nickname');
echo $form->text()->label('Mail')->name('email');
echo $form->password()->label('Passwort')->name('passwort');
echo $form->submit()->label('Benutzer erstellen')->name('send');

$form->end();
?>
</div>
</div>
</section>
