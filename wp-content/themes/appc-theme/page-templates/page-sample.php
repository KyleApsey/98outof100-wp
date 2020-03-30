<?php
/**
 *  Template Name: APPC SAMPLE PAGE
 */
$page_data = new APPC_SAMPLE_PAGE();
get_header();
?>

<main>
    <h1><?php echo $page_data->get_title(); ?></h1>
    <p>This is the sample page</p>
</main>

<?php get_footer(); ?>