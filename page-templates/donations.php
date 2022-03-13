<?php
/*
Template Name: Page Donate
*/
?>
<?php get_header(); ?>
<div class="col1">
	<div class="fix"></div>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ( ! empty( $_GET['donation'] ) && $_GET['donation'] === 'thank-you' ) : ?>
			<div class="thank-you-mask">
				<div class="thank-you-message">
					<h3 class="thank-you-title"><?php _e( 'Thank You', 'arsofia' ) ?></h3>
					<img class="aligncenter" src="https://arsofia.com/wp-content/uploads/2015/11/thank-you-BG1.jpg" alt="Thank you">
					<p style="padding-top: 20px;"><?php _e( 'Thank you for making a donation. It will be wisely and carefully spent in the mission to stop the suffering of homeless animals in Sofia.', 'arsofia' ) ?></p>
					<button class="close-pop-up"><?php _e( 'Close', 'arsofia' ) ?></button>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(function () {
					jQuery('.close-pop-up').on('click', function () {
						jQuery('.thank-you-mask').hide(400)
					});
				})
			</script>
			<style>
				.thank-you-mask {
					position: fixed;
					top: 0;
					left: 0;
					z-index: 99999;
					width: 100%;
					height: 100%;
					background-color: rgba(0, 0, 0, 0.5);
					display: flex;
					justify-content: center;
					align-items: center;
				}

				.thank-you-message {
					background: #fff;
					min-width: 300px;
					max-width: 500px;
					width: 100%;
					height: 500px;
					max-height: 80vh;
					overflow: scroll;
					padding-left: 10px;
					text-align: center;
				}

				.thank-you-title {
					text-align: center;
					margin: 20px;
				}

				.close-pop-up {
					padding: 10px 20px;
					text-align: center;
					margin: 0 auto;
					display: block;
					cursor: pointer;
				}
			</style>
		<?php endif; ?>
			<div class="post-alt blog" id="post-<?php the_ID(); ?>">
				<div class="entry">
					<?php the_content( '<span class="continue">Continue Reading</span>' ); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
