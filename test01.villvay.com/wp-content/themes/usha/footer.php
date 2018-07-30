<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */
?>
	</div><!-- #content -->
	</div><!-- wide contenitor-->
	<footer id="colophon" class="site-footer" role="contentinfo">
  		 <div class="widget-footer container">
   			<?php get_sidebar( 'footer' ); ?>
   		</div><!-- .widget-footer -->
		<div class="site-info">
		<?php esc_attr_e( '&copy;', 'usha' ); ?> <?php ( date( 'Y' ) ); ?> <a href="<?php echo esc_url(home_url( '/' )) ?>" target="_blank" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		<?php bloginfo( 'name' ); ?>
        </a>
		<?php printf( __( 'Powered by ', 'usha' )); ?><a href="http://wordpress.org/" rel="generator">Wordpress.org</a> | <a href="http://www.soniseo.com/usha/" rel="nofollow">Usha Theme</a> <?php printf( __( 'Developed by Soni Sharma', 'usha' )); ?>        
        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>