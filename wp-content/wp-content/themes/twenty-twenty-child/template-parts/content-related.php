<?php
/**
 * Displays the content when related post needed.
 */  

$terms = get_the_terms( get_the_ID(), 'category' );

$args = array(
    'post_type'=> 'products',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $terms[0]->slug
        )
    )
);

$related = get_posts( $args );?>
<div class="related_post_product">
<?php if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>
<div class="related_item">
 	<ul> 
        		<li>
        			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php the_title(); ?>
            				<?php the_content(); ?>
			</a>
        		</li>
    	</ul> 
</div><!-- related_item -->  
<?php }?>
</div><!-- related_post_product -->
<?php wp_reset_postdata();



 ?>



