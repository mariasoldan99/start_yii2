<?php
use \app\assets\AppAsset;
/** @var $content string */
/** @var $this \yii\web\View */
?>
<?php $this->beginContent('@app/views/layouts/clear.php') ?>
<header>
    header is here
</header>
<div class="container">

    <div class="row">
        <div class="col-sm-9">
                <?php echo $content ?>
        </div>
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item">Siderbar Item 1</li>
                <li class="list-group-item">Siderbar Item 2</li>
                <li class="list-group-item">Siderbar Item 3</li>
            </ul>

            <?php if(isset($this->blocks['sidebar'])): ?>
                <hr>
                <?php echo $this->blocks['sidebar'] ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<footer>
    Footer is here
</footer>
<?php $this->endContent(); ?>
