<?php foreach ($mNews->getData() as $item) : ?>
<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="<?=$item['link']?>"><?=$item['title']?></a>
            </h3>
        </div>
        <div class="panel-body">
            <h6 style=" margin-top: 0px;"><?=$item['pub_date']?></h6>
            <?=$item['description']?>
        </div>
</div>
<?php endforeach; ?>