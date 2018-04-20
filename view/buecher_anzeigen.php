<article class="hreview open special">
    <?php if (empty($buecher)): ?>
        <div class="dhd" style="padding-bottom: 100%;">
            <h2 class="item title"> Du hast noch keine Bücher. </h2>
        </div>
    <?php else: ?>

        <?php foreach ($buecher as $buch): ?>
            <div class="panel panel-default">
                 <div class="panel-body">
                     <br><p class="description"> <h3><?= $buch->titel; ?></h3> <?= $buch->autor; ?> </br><?= $buch->veroeffentlicht; ?>

                     <?= $buch->pers_zmsf; ?> </p>
<<<<<<< HEAD
=======

>>>>>>> 4519fa4da2be54bc07c94da054137ab81d850a2c
                     <?= $buch->pers_zmsf; ?> </p></a>

                    <?php $update = new Form('updateView?id='.$buch->ugID);
                        echo $update->submit()->label('Anpassen')->name('update');
                        $update->end();
                    ?>
                     <?php $delete = new Form('delete?id='.$buch->ugID);
                     echo $update->submit()->label('Löschen')->name('delete');
                     $delete->end();
                     ?>
                  </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>
