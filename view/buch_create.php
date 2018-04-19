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

<<<<<<< HEAD
echo "<select> <option value='$genre'></option></select>";

echo $form->file()->label('bild')->name('bild');
echo $form->text()->label('titel')->name('titel');
echo $form->text()->label('autor')->name('autor');
echo $form->text()->label('datum')->name('datum');
echo $form->text()->label('zusammenfassung')->name('zusammenfassung');
=======
echo "Genre";
echo '<br>';
echo "<select name='genre[]'>";
    foreach($genres as $genre) {
        echo '<options value ="' . $genre['gid'] . '">Genre</options>';
    }
   echo "</select>";
    echo '<br>';
echo '<label for="file">Bild</label>';
echo '<br>';
echo '<input type="file" name="bild"/>';
echo $form->text()->label('Titel')->name('titel');
echo $form->text()->label('Autor')->name('autor');
echo $form->text()->label('Veroeffentlicht')->name('datum');
echo $form->text()->label('Zusammenfassung')->name('zusammenfassung');
>>>>>>> 591f35277e37ec7ad80603226015c38fb9a8e949

echo $form->submit()->label('Buch hinzufüen')->name('send');

$form->end();
?>
</div>
</div>
</section>