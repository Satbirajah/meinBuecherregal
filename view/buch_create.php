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

$form = new Form('/buch/showBooks');
echo "Genre";
echo '<br>';
echo "<select name='genre[]'>";
    foreach($genres as $genre) {
        echo '<option value ="' . $genre->id . '">'. $genre->genre.'</option>';
    }
   echo "</select>";
    echo '<br>';
echo '<label for="file">Bild</label>';
echo '<br>';
echo '<input type="file" name="bild"/>';
echo $form->text()->label('Titel')->name('buchTitel');
echo $form->text()->label('Autor')->name('autor');
echo $form->text()->label('Veröffentlicht')->name('veroeffentlicht');
echo $form->text()->label('Zusammenfassung')->name('pers_zmsf');

echo $form->submit()->label('Buch hinzufüen')->name('send');

$form->end();
?>
</div>
</div>
</section>