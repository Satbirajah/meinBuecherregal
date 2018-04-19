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

// https://www.wirlernen.at/PHP5fuerEinsteiger/049.php

$form = new Form('/buch/createBook');

echo "<select> <option value='$genre'></option></select>";
echo $form->file()->label('bild')->name('bild');
echo $form->text()->label('titel')->name('titel');
echo $form->text()->label('autor')->name('autor');
echo $form->text()->label('datum')->name('datum');
echo $form->text()->label('zusammenfassung')->name('zusammenfassung');

echo $form->submit()->label('Buch hinzufüen')->name('send');

$form->end();
?>
</div>
</div>
</section>
