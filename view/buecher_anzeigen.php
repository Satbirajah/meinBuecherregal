<article class="hreview open special">
    <?php if (empty($buecher)): ?>
        <div class="dhd">
            <h2 class="item title"> Du hast noch keine Bücher. </h2>
        </div>
    <?php else: ?>

        <?php foreach ($buecher as $buch): ?>
            <div class="panel panel-default">
                 <div class="panel-body">
                     <br><p class="description"> <h3><?= $buch->titel; ?></h3> <?= $buch->autor; ?> </br><?= $buch->veroeffentlicht; ?>
                     <?= $buch->pers_zmsf; ?> </p></a>
                    <?php $update = new Form('updateView('.$buch->id.')');
                        echo $update->submit()->label('Anpassen')->name('update');
                        $update->end();
                    ?>
                     <?php $delete = new Form('delete('.$buch->id.')');
                     echo $update->submit()->label('Löschen')->name('delete');
                     $delete->end();
                     ?>
                  </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php

  /*  $form = new Form('/buch/createBook');
    echo $form->submit()->label('Buch hinzufügen')->name('send');
    $form->end();*/
    ?>
</article>
