<?php

$className = 'featured-plant-name';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>


<div class="<?php echo esc_attr($className); ?>">
    <h2><?php the_field("common_name"); ?></h2>
    <h3><span class="scientific-name"><?php the_field("scientific_name"); ?></span></h3>
</div> <!-- end featured plant name div -->