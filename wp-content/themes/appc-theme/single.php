<?php
$post_data = new APPC_CPT_Post();
get_header();
?>
<main class="pg-blog-post">
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
    <!-- blog post -->
    <div class="pg-blog-post__content">
        <div class="container">
            <h1 class="pg-blog-post__content-heading"><?php echo $post_data->get_title(); ?></h1>
            <p class="pg-blog-post__content-date"><?php echo $post_data->get_date(); ?></p>
            <div class="pg-blog-post__content-main user-generated"><?php echo $post_data->get_content(); ?></div>
        </div>
    </div>
</main>
<?php get_footer(); ?>

