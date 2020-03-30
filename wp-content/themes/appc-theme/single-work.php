<?php
$post_data = new APPC_CPT_Work();
get_header();
?>
<main class="pg-work-post">
    <!-- header menu -->
    <div class="header-menu">
        <div class="container">
            <div class="header-menu__content">
                <!-- nav menu -->
                <ul class="header-menu__list">
                    <li class="header-menu__item">
                        <a href="<?php echo get_home_url(); ?>" class="header-menu__link">Home</a>
                    </li>
                </ul>
                <!-- logo -->
                <div class="header-menu__logo">
                    <img src="<?php echo Site_Config_General_Content::get_logo()['url']; ?>" alt="<?php echo Site_Config_General_Content::get_logo()['alt']; ?>" title="<?php echo Site_Config_General_Content::get_logo()['title']; ?>"/>
                </div>
            </div>
        </div>
    </div>
    <!-- work post -->
    <div class="pg-work-post__content">
        <div class="container">
            <h1 class="pg-work-post__content-heading"><?php echo $post_data->get_title(); ?></h1>
            <p class="pg-work-post__content-date"><?php echo $post_data->get_date(); ?></p>
            <?php if(!empty($post_data->get_featured_image())) { ?>
                <img class="pg-work-post__content-featured-image" src="<?php echo $post_data->get_featured_image()['url']; ?>" alt="<?php echo $post_data->get_featured_image()['alt']; ?>" title="<?php echo $post_data->get_featured_image()['title']; ?>"/>
            <?php } ?>
            <div class="pg-work-post__content-main user-generated"><?php echo $post_data->get_content(); ?></div>
            <ul class="pg-work-post__content-gallery">
                <?php foreach($post_data->get_gallery() as $item) { ?>
                    <li class="pg-work-post__content-gallery-item">
                        <img src="<?php echo $item['url']; ?>" alt="<?php echo $item['alt']; ?>" title="<?php echo $item['title']; ?>"/>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>>
</main>
<?php get_footer(); ?>

