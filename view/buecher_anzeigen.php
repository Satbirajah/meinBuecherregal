<article class="hreview open special">
    <?php if (empty($buecher)): ?>
        <div class="dhd">
            <h2 class="item title"> Du hast noch keine Bücher. </h2>
        </div>
    <?php else: ?>
        <?php foreach ($buecher as $buch): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $buch->titel; ?><?= $buch->autor; ?></div>
                <div class="panel-body">
                  <a><p class="description"> <?= $buch->titel; ?> <?= $buch->autor; ?></p></a>
                    <?php $update = new Form('buch/update');
                        echo $update->submit()->label('Anpassen')->name('update')->value('$buch->ugid');
                    ?>
                    <?php $delete = new Form('buch/delete');
                    echo $update->submit()->label('löschen')->name('delete')->value('$buch->ugid');
                    ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php

    $form = new Form('/buch/create');
    echo $form->submit()->label('Buch hinzufügen')->name('send');
    $form->end();
    ?>
</article>
