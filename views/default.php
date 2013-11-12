<?php
/**
 * @var string $id
 * @var string $containerCssClass
 * @var array $slides
 */
?>

<div class="flex-container <?php echo CHtml::encode($containerCssClass) ?>">
    <div id="<?php echo $id ?>" class="flexslider">
        <ul class="slides">
            <?php foreach ($slides as $slide): ?>
                <li>
                    <?php echo $slide['content'] ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>