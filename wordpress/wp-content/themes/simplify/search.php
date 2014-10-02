<?php 
/* 	Simplify Theme's Search Page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplify 1.0
*/

get_header(); ?>
<div id="container">
	<?php if (have_posts()) : ?>
		<div id="content">
        <h1 class="page-title fa-search-plus"><?php echo __('Search Results', 'selfie'); ?></h1>
        <?php $counter = 0; global $more; $more = 0; ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) { 
				$numposts = $wp_query->found_posts; // count # of SEARCH RESULTS ?>
				<h3 class="arc-src"><span><?php echo __('Search Term:', 'simplify');?> </span><?php the_search_query(); ?></h3>
				<h3 class="arc-src"><span><?php echo __('Number of Results:', 'simplify');?> </span><?php echo $numposts; ?></h3><br />
				<?php } //endif ?>
			
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<p class="postmetadataw"><?php echo __('Entry Date: ', 'simplify'); ?> <?php the_time('F j, Y'); ?></p>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
				<div class="content-ver-sep"></div>
  				<div class="entrytext">
 <?php the_post_thumbnail('thumbnail'); ?>
 <?php simplify_content(); ?>
 <div class="clear"> </div>
 <div class="up-bottom-border">
 				<p class="postmetadata"><?php echo __('Posted in', 'simplify'); ?> <?php the_category(', ') ?> | <?php edit_post_link( __('Edit', 'simplify'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'simplify'), __('1 Comment &#187;', 'simplify'), __('% Comments &#187;', 'simplify')); ?> <?php the_tags('<br />'. __('Tags: ', 'simplify'), ', ', '<br />'); ?></p>
 				</div></div></div>
				
		<?php $counter++; ?>
 		
		<?php endwhile; ?>
        <div id="page-nav">
	<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Entries', 'simplify')) ?></div>
	<div class="alignright"><?php next_posts_link(__('Next Entries &raquo;', 'simplify')) ?></div>
	</div>
		</div>		
		<?php get_sidebar(); ?>
        <?php else: ?>
		<br /><br /><h1 class="arc-post-title"><?php echo __('Sorry, we could not find anything that matched...', 'simplify'); ?></h1>
		
		<h3 class="arc-src"><span><?php echo __('You Can Try the Search...', 'simplify'); ?></span></h3>
		<?php get_search_form(); ?>
		<p><a href="<?php echo home_url(); ?>" title="Browse the Home Page"><?php echo __('&laquo; Or Return to the Home Page', 'simplify'); ?></a></p><br />
		<h2 class="post-title-color"><?php echo __('You can also Visit the Following. These are the Featured Contents', 'simplify'); ?></h2>
		<div class="content-ver-sep"></div><br />
		<?php get_template_part( 'featured-box' ); ?>

	<?php endif; ?>
	
<?php get_footer(); ?>