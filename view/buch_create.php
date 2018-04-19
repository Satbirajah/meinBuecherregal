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

echo $form->text()->label('titel')->name('titel');
echo $form->text()->label('autor')->name('autor');
echo $form->password()->label('Passwort')->name('passwort');
echo $form->submit()->label('Buch hinzufüen')->name('send');

$form->end();
?>
</div>
</div>
</section>
