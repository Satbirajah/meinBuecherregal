<article class="hreview open special">
    <?php if (empty($genres)): ?>
        <div class="dhd">
            <h2 class="item title"> Hoopla es gibt noch keine Genres</h2>
        </div>
    <?php else: ?>
        <?php foreach ($genres as $genre): ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="description"> <h3><?= $genre->genre; ?></h3> <?= $genre->Beschreibung; ?>.</p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>
