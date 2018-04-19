<article class="hreview open special">
    <?php if (empty($genres)): ?>
        <div class="dhd">
            <h2 class="item title"> Du hast noch keine Genre. </h2>
        </div>
    <?php else: ?>
        <?php foreach ($genres as $gerne): ?>
            <div class="panel panel-default">
               // <div class="panel-heading"><?= $genre->genre; ?><?= $genre->beschreibung; ?></div>
                <div class="panel-body">
                  <a><p class="description"> <?= $genre->genre; ?> <?= $genre->beschreibung; ?></p></a>
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
