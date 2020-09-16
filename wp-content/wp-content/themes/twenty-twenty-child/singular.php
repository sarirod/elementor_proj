<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php if ( 'products' == get_post_type()){?>
	<div class="single_product_main">
		<div class="title_single_product">
			<?php the_title('<h2>','</h2>');?>
		</div><!-- title_single_product -->
		<div class="content_single_product">
			<?php the_content();
			if(get_field('youtube_video')){?>
				<iframe width="560" height="315" src="<?php the_field('youtube_video')?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>				
			<?php }?>
		</div><!-- content_single_product -->
		<div class="price_single_product <?=get_field('is_on_sale')?'onsale':''?>">
			Price : <?php the_field('price') ?>
		</div><!-- price_single_product -->
		<?php if(get_field('is_on_sale') && get_field('sale_price')){ ?>
			
			<div class="sale_price_single_product">
				Sale Price : <?php the_field('sale_price') ?>
			</div><!-- sale_price_single_product -->
		<?php }?>
		</div><!-- single_product_main -->
		<?php get_template_part( 'template-parts/content-related', get_post_type() );?>

	<?php }else{ ?>


<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}
}
	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
