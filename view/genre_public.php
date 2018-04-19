<article class="hreview open special">
    <?php if (empty($genres)): ?>
        <div class="dhd">
            <h2 class="item title"> Hoopla es gibt noch keine Genres</h2>
        </div>
    <?php else: ?>
        <?php foreach ($genres as $gerne): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $genre->genre; ?><?= $genre->beschreibung; ?></div>
                <div class="panel-body">
                    <p class="description"> <?= $genre->genre; ?> <?= $genre->beschreibung; ?>.</p>
                    <p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>
