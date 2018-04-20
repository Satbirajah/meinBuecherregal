<article class="hreview open special" style="padding-bottom: 100%;">
    <?php if (empty($genres)): ?>
        <div class="dhd" style="padding-bottom: 100%;>
            <h2 class="item title"> Du hast noch keine Genre. </h2>
        </div>
    <?php else: ?>
        <?php foreach ($genres as $genre): ?>
            <div class="panel panel-default">
                <div class="panel-body">
<<<<<<< HEAD
                  <a href="/buch/index" name="genre" value="<?= $genre->id?>"><p class="description" style="color: black;"> <?= $genre->genre; ?> </p><br></a>
=======
                    <a href="/buch/index?gid=<?= $genre->id?>" title="genre"><p class="description"> <?= $genre->genre; ?></p> </a>
>>>>>>> b57d0edf76db40764e4838d5dc4acdf479d7668f
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
