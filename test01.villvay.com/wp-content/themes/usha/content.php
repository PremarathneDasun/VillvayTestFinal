<?php
/**
 * The content
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content"><div class="alignleft"> 
       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
   <?php the_post_thumbnail(); ?>
   </a></div>
		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'usha' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'usha' ),
				'after'  => '</div>',
			) );
		?> 
	</div><!-- .entry-content -->
	<?php endif; ?>
	<footer class="entry-meta">
		<div class="entry-meta"><?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<?php comments_popup_link( __( 'Leave a comment', 'usha' ), __( '1 Comment', 'usha' ), __( '% Comments', 'usha' ) ); ?> | 
		<?php endif; ?> <?php if ( 'post' == get_post_type() ) : ?>
			<?php usha_posted_on(); ?><?php endif; ?>
		</div><!-- .entry-meta -->
		<?php edit_post_link( __( 'Edit', 'usha' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
