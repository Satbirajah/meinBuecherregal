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



$form = new Form('/registration/registration');

echo $form->text()->label('Nickname')->name('nickname');
echo $form->email()->label('Mail')->name('email');
echo $form->password()->label('Passwort')->name('passwort');
echo $form->password()->label('Passwort2')->name('passwort2');
echo $form->submit()->label('Registrieren')->name('send');

$form->end();
?>
</div>
</div>
</section>
