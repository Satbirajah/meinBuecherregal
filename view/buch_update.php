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

            $form = new Form('/buch/update');
            echo '<br>';
            echo '<label for="file">Bild</label>';
            echo '<br>';
            echo '<input type="file" name="bild"/>';
            echo $form->text()->label('Titel')->name('buchTitel')->value($buch->titel);
            echo $form->text()->label('Autor')->name('autor')->value($buch->autor);
            echo $form->text()->label('Veröffentlicht')->name('veroeffentlicht')->value($buch->veroeffentlicht);
            echo $form->text()->label('Zusammenfassung')->name('pers_zmsf')->value($buch->pers_zmsf);

            echo $form->submit()->label('Buch ändern')->name('update');
            $form->end();
            ?>
        </div>
    </div>
</section>