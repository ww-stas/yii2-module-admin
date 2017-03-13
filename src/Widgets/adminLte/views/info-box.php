<?php
/* @var $color string */
/* @var $title string */
/* @var $subTitle string */
/* @var $icon string */
?>

<div class="info-box">
    <span class="info-box-icon <?php echo $color ?> "><i class="<?php echo $icon ?>"></i></span>

    <div class="info-box-content">
        <span class="info-box-text"><?php echo $title ?></span>
        <span class="info-box-number"><?php echo $subTitle ?></span>
    </div>
</div>
