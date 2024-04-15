<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<?php
		if ( et_builder_is_product_tour_enabled() ):
			// load fullwidth page in Product Tour mode
			while ( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<div class="entry-content">
					<?php
						the_content();
					?>
					</div>

				</article>

		<?php endwhile;
		else:
	?>
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				/**
				 * Fires before the title and post meta on single posts.
				 *
				 * @since 3.18.8
				 */
				do_action( 'et_before_post' );
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
					<?php if ( ( 'off' !== $show_default_title && $is_page_builder_used ) || ! $is_page_builder_used ) { ?>
						<div class="et_post_meta_wrapper">
							<h1 class="entry-title"><?php the_title(); ?></h1>

						<?php
							if ( ! post_password_required() ) :

								et_divi_post_meta();

								$thumb = '';

								$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

								$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
						?>
						<?php
								// If this post is by EH, then add the custom EH logo and credit EH
								$author = get_post_meta($post->ID, 'Author', true);
								// check if this custom field has a value; display it if it does, otherwise don't display anything 
								if($author=="Displayable EH Action"){
						?>
									<a href="https://www.earthhero.org"><img src="/earth_hero_logo.jpg", alt="Earth Hero's logo"></a>
									<p>Courtesy of <a href="https://www.earthhero.org">www.earthhero.org</a> <?php echo ""; ?></p>
						<?php 
								/* Don't add EH credit if it isn't an EH post! */
								}else{ }

								$classtext = 'et_featured_image';
								$titletext = get_the_title();
								$alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
								$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
								$thumb = $thumbnail["thumb"];

								$post_format = et_pb_post_format();

								if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) {
									printf(
										'<div class="et_main_video_container">
											%1$s
										</div>',
										et_core_esc_previously( $first_video )
									);
								} else if ( ! in_array( $post_format, array( 'gallery', 'link', 'quote' ) ) && 'on' === et_get_option( 'divi_thumbnails', 'on' ) && '' !== $thumb ) {
									print_thumbnail( $thumb, $thumbnail["use_timthumb"], $alttext, $width, $height );
								} else if ( 'gallery' === $post_format ) {
									et_pb_gallery_images();
								}
							?>

							<?php
								$text_color_class = et_divi_get_post_text_color();

								$inline_style = et_divi_get_post_bg_inline_style();

								switch ( $post_format ) {
									case 'audio' :
										$audio_player = et_pb_get_audio_player();

										if ( $audio_player ) {
											printf(
												'<div class="et_audio_content%1$s"%2$s>
													%3$s
												</div>',
												esc_attr( $text_color_class ),
												et_core_esc_previously( $inline_style ),
												et_core_esc_previously( $audio_player )
											);
										}

										break;
									case 'quote' :
										printf(
											'<div class="et_quote_content%2$s"%3$s>
												%1$s
											</div>',
											et_core_esc_previously( et_get_blockquote_in_content() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
									case 'link' :
										printf(
											'<div class="et_link_content%3$s"%4$s>
												<a href="%1$s" class="et_link_main_url">%2$s</a>
											</div>',
											esc_url( et_get_link_url() ),
											esc_html( et_get_link_url() ),
											esc_attr( $text_color_class ),
											et_core_esc_previously( $inline_style )
										);

										break;
								}

							endif;
						?>
					</div>
				<?php  } ?>

					<div class="entry-content">
					<?php
						do_action( 'et_before_content' );

						// set the variable to the value entered for the "Photo Credit" custom field
						$credit = get_post_meta($post->ID, 'Photo Credit', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($credit){ 
					?>
							<p><?php echo $credit; ?> <br></p>
					<?php 
						}else{ /* There is no photo credit: display nothing. */ }
					
						// set the variable to the value entered for the "Ease Rating" custom field
						$ease_rating = get_post_meta($post->ID, 'Ease Rating', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($ease_rating){ 
					?>
							<p><b>Ease Rating:</b> <?php echo $ease_rating; ?></p>
					<?php 
						}else{ /* No ease rating: do nothing. */ }
						
						// set the variable to the value entered for the "Carbon Emissions Per Year" custom field
						$co2_savings = get_post_meta($post->ID, 'Carbon Emissions Per Year', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($co2_savings){ 
					?>
						   <p><b>Carbon Emission Savings:</b> <?php echo $co2_savings; ?></p>
					<?php 
						}else{ /* No co2 savings: show nothing */ }
						
					  	// set the variable to the value entered for the "Impact Rating" custom field
						$impact_rating = get_post_meta($post->ID, 'Impact Rating', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($impact_rating || $impact_rating==0){ 
					?>
						   <div class="tooltip"> <b>Impact Rating (0-5):</b>
								<span class="tooltiptext">
									Impact = 0 (least) - 5 (most). This is a combination of a calculated scale and expert judgment in the absence of scientific data that directly quantifies the impact of a particular action.<br><br> 
									5 - ~80% target progress (2,000+ kg CO2e)<br>
									4 - ~60% (1,000 - 2,000 kg CO2e)<br>
									3 - ~20% (500 - 1,000 kg CO2e)<br>
									2 - ~10% (100 - 500 kg CO2e)<br>
									1 - <10% (<100 kg CO2e)<br>
									0 - <1% (<30 kg CO2e)<br>
								</span>
						   </div>
					<?php 
						echo $impact_rating; 
						}else{/*No impact rating to display: show nothing */ }
					
						// set the variable to the value entered for the "Influence Multiplier" custom field
						$influence_multiplier = get_post_meta($post->ID, 'Influence Multiplier', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($influence_multiplier){ 
					?>
					   		<p>
								<b>No. of People Influenced Beyond You:</b> 
					<?php
								//see the desc for the "Influence Multipler" column in the Actions database on Airtable for info regarding why each number correspodns to its respective string
								switch($influence_multiplier) {
									case 1:
										echo "0.";
										break;
									case 2:
										echo "tens of people";
										break;
									case 3:
										echo "hundreds of people";
										break;
									case 4:
										echo "thousands of people.";
										break;
								}
					?>
						   	</p>
					<?php 
						}else{ /* Nothing to Display */ }
						
						// set the variable to the value entered for the "Amount Savings" custom field
						$amount_savings = get_post_meta($post->ID, 'Amount Savings', true);
						// check if this custom field has a value; display it if it does, otherwise don't display anything 
						if($amount_savings){ 
					?>
						   <p><b>Amount of Savings:</b> <?php echo $amount_savings; ?></p>
						
					<?php 
						}else{/*Nothing to Display: do nothing */ }

						// set the variable to the value entered for the "Resilience Benefit" custom field
						$resilience_benefit = get_post_meta($post->ID, 'Resilience Benefit', true);
						// ALWAYS display this field if post is from EH
						// all EH posts have "Author" field, so this
						// can be used as a check if a post is EH or not
						if(get_post_meta($post->ID, 'Author', true)){ 
					?>
							<div class="tooltip">
								<b>Resilience Benefit: </b>
								<span class="tooltiptext">
									Will this action help the user avoid, reduce, or recover from the impacts of (climate-driven) disasters, and, in some cases, enable the user to help others (e.g., in a family or community)?
								</span>
							</div>
					<?php 
							if ($resilience_benefit) {
								echo "yes";
							} else {
								echo "no";
							}
						}else{/*No Resilience benefit to display: show nothing */ }

                        // Add header above post content field if this is an EH post
						// EH posts always have "Author" field, so we check this way
                        $author = get_post_meta($post->ID, 'Author', true);
                        // check if this custom field has a value; display it if it does, otherwise don't display anything 
                        if($author=="Displayable EH Action"){ 
					?>
							<br><br>
                            <h3>Description</h3>
					<?php 
                        }else{ /*The author field must be empty: not an EH post */}

						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					
					</div>
					<div class="et_post_meta_wrapper">
					<?php
					if ( et_get_option('divi_468_enable') === 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('divi_468_adsense') !== '' ) echo et_core_intentionally_unescaped( et_core_fix_unclosed_html_tags( et_get_option('divi_468_adsense') ), 'html' );
						else { ?>
							<a href="<?php echo esc_url( strval( et_get_option( 'divi_468_url' ) ) ); ?>"><img src="<?php echo esc_attr( et_get_option( 'divi_468_image' ) ); ?>" alt="468" class="foursixeight" /></a>
				<?php 	}
						echo '</div>';
					}

					/**
					 * Fires after the post content on single posts.
					 *
					 * @since 3.18.8
					 */
					do_action( 'et_after_post' );

						if ( ( comments_open() || get_comments_number() ) && 'on' === et_get_option( 'divi_show_postcomments', 'on' ) ) {
							comments_template( '', true );
						}
					?>
					</div>
				</article>

			<?php endwhile; ?>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php endif; ?>
</div>

<?php

get_footer();
