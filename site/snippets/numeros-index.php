<div class="index-content-sort">
    <a class="index-issue-single sc" data-sortby="issue">Nº</a>
    <a class="index-issue-title sc" data-sortby="title">Titre</a>
    <a class="index-issue-release sc">Année</a>
</div>
<div class="index-content-issues">
    <ul>
        <?php
        $items = $site->find('numeros')->children()->visible()->not($site->activePage())->flip();
        foreach($items as $item):?>
        <li class="entry-available">
            <a class="item" href="<?= $item->url() ?>">
                <span class="index-issue-single tab"><?= $item->numero()->html() ?></span>
                 <span class="index-issue-title"><?= $item->titre()->ktr() ?></span>
                <span class="index-issue-release tab"><?= $item->parution()->html() ?></span>
            </a>
        </li>
        <?php endforeach ?>
    </ul>

    <div id="button-next-issues" class="input-label" for="show-button">
        <span>Archive</span>
    </div>

    <ul>
        <?php
        $items = $site->find('archives')->children()->visible()->not($site->activePage())->flip();
        foreach($items as $item):?>
        <li class="entry-available archive">
            <a class="item" href="<?= $item->url() ?>">
                <span class="index-issue-single tab"><?= $item->numero()->html() ?></span>
                <?php if($item->titre()->html()!=""): ?>
                  <span class="index-issue-title"><?= $item->titre()->ktr() ?></span>
                <?php else: ?>
                  <span class="index-issue-title"><em>Azimuts <?= $item->numero()->html() ?></em></span>
                <?php endif ?>
                <span class="index-issue-release tab"><?= $item->parution()->html() ?></span>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
