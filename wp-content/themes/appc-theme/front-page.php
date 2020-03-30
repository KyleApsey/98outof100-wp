<?php
/**
 *  Template Name: Henge Front Page
 */
$page_data = new APPC_Page_Front_Page;
get_header();
?>
<main class="pg-home">
    <!-- hero -->
    <div class="hero is-active">
        <img class="hero__image hero__image--default is-active" src="<?php echo $page_data->get_hero_image()['url']; ?>" alt="<?php echo $page_data->get_hero_image()['alt']; ?>" title="<?php echo $page_data->get_hero_image()['title']; ?>"/>
        <?php if(!empty($page_data->get_hero_image_works())) { ?>
            <img class="hero__image hero__image--works" src="<?php echo $page_data->get_hero_image_works()['url']; ?>" alt="<?php echo $page_data->get_hero_image_works()['alt']; ?>" title="<?php echo $page_data->get_hero_image_works()['title']; ?>"/>
        <?php } ?>
        <?php if(!empty($page_data->get_hero_image_blog())) { ?>
            <img class="hero__image hero__image--blog" src="<?php echo $page_data->get_hero_image_blog()['url']; ?>" alt="<?php echo $page_data->get_hero_image_blog()['alt']; ?>" title="<?php echo $page_data->get_hero_image_blog()['title']; ?>"/>
        <?php } ?>
        <?php if(!empty($page_data->get_hero_image_about())) { ?>
            <img class="hero__image hero__image--about" src="<?php echo $page_data->get_hero_image_about()['url']; ?>" alt="<?php echo $page_data->get_hero_image_about()['alt']; ?>" title="<?php echo $page_data->get_hero_image_about()['title']; ?>"/>
        <?php } ?>
        <?php if(!empty($page_data->get_hero_image_contact())) { ?>
            <img class="hero__image hero__image--contact" src="<?php echo $page_data->get_hero_image_contact()['url']; ?>" alt="<?php echo $page_data->get_hero_image_contact()['alt']; ?>" title="<?php echo $page_data->get_hero_image_contact()['title']; ?>"/>
        <?php } ?>
        <?php if(!empty($page_data->get_hero_heading())) { ?>
            <div class="hero__text">
                <div class="container">
                    <h1><?php echo $page_data->get_hero_heading(); ?></h1>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="header-menu__search-area">
        <div class="container">
            <form class="form js-SearchForm">
                <div class="form-row">
                    <div class="form-element">
                        <span class="form-element__field">
                            <input type="text" id="search" name="search" placeholder="Enter a phrase or keyword"/>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- header menu -->
    <div class="header-menu">
        <div class="container">
            <div class="header-menu__content">
                <!-- nav menu -->
                <ul class="header-menu__list">
                    <?php if($page_data->has_works()) { ?>
                        <li class="header-menu__item">
                            <button class="header-menu__link js-ShowWorks" type="button">Works</button>
                        </li>
                    <?php } ?>
                    <?php if($page_data->has_blog()) { ?>
                        <li class="header-menu__item">
                            <button class="header-menu__link js-ShowBlog" type="button">Blog</button>
                        </li>
                    <?php } ?>
                    <?php if($page_data->has_about()) { ?>
                        <li class="header-menu__item header-menu__item--about">
                            <button class="header-menu__link js-ShowAbout" type="button">About</button>
                        </li>
                    <?php } ?>
                    <?php if($page_data->has_contact()) { ?>
                        <li class="header-menu__item header-menu__item--contact">
                            <button class="header-menu__link js-ShowContact" type="button">Contact</button>
                        </li>
                    <?php } ?>
                    <li class="header-menu__item header-menu__item--search">
                        <button class="header-menu__link js-ShowSearch" type="button">Search</button>
                    </li>
                </ul>
                <!-- logo -->
                <div class="header-menu__logo">
                    <img src="<?php echo Site_Config_General_Content::get_logo()['url']; ?>" alt="<?php echo Site_Config_General_Content::get_logo()['alt']; ?>" title="<?php echo Site_Config_General_Content::get_logo()['title']; ?>"/>
                </div>
            </div>
        </div>
    </div>
    <?php if($page_data->has_about()) { ?>
        <!-- about -->
        <div class="pg-home__about">
            <div class="container">
                <div class="pg-home__about-content">
                    <?php if(!empty($page_data->get_about_image())) { ?>
                        <img class="pg-home__about-content-image" src="<?php echo $page_data->get_about_image()['url']; ?>" alt="<?php echo $page_data->get_about_image()['alt']; ?>" title="<?php echo $page_data->get_about_image()['title']; ?>"/>
                    <?php } ?>
                    <?php if(!empty($page_data->get_about_text())) { ?>
                        <div class="pg-home__about-content-text user-generated"><?php echo $page_data->get_about_text(); ?></div>
                    <?php } ?>
                    <?php if($page_data->has_contact()) { ?>
                        <div class="pg-home__about-contact"><?php echo $page_data->get_contact_text(); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if($page_data->has_works()) { ?>
        <!-- works -->
        <div class="pg-home__works">
            <div class="container">
                <div class="pg-home__works-content">
                    <?php if(!empty($page_data->get_works_text())) { ?>
                        <div class="pg-home__works-content-text user-generated"><?php echo $page_data->get_works_text(); ?></div>
                    <?php } ?>
                    <?php if(!empty($page_data->get_works_projects())) { ?>
                        <ul class="pg-home__works-content-project-list">
                            <?php foreach($page_data->get_works_projects() as $work) { ?>
                                <li class="pg-home__works-content-project-item">
                                    <a href="<?php echo $work->get_permalink(); ?>">
                                        <?php if(!empty($work->get_featured_image())) { ?>
                                            <img src="<?php echo $work->get_featured_image()['url']; ?>" alt="<?php echo $work->get_featured_image()['alt']; ?>" title="<?php echo $work->get_featured_image()['title']; ?>"/>
                                        <?php } ?>
                                        <h3 class="pg-home__works-content-project-item-heading"><?php echo $work->get_title(); ?></h3>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($page_data->has_blog()) { ?>
        <!-- blog -->
        <div class="pg-home__blog">
            <div class="container">
                <ul class="pg-home__blog-list">
                    <?php foreach($page_data->get_blog_posts() as $post) { ?>
                        <li class="pg-home__blog-item">
                            <a href="<?php echo $post->get_permalink(); ?>">
                                <h3 class="pg-home__blog-item-heading"><?php echo $post->get_title(); ?></h3>
                                <?php if(!empty($post->get_excerpt())) { ?>
                                    <p class="pg-home__blog-item-excerpt"><?php echo $post->get_excerpt(); ?></p>
                                <?php } ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <?php if($page_data->has_contact()) { ?>
        <!-- contact -->
        <div class="pg-home__contact">
            <div class="container">
                <div class="pg-home__contact-content"><?php echo $page_data->get_contact_text(); ?></div>
            </div>
        </div>
    <?php } ?>
    <!-- search -->
</main>
<?php get_footer(); ?>