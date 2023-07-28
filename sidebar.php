<?php
if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div class="c-sidebar">
	<h3 class="sidebar__title">Latest</h3>

	<?php
	$id_post = $posts[0]->ID;

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'orderby'        => 'data',
		'order' => 'desc'
	);

	$loop = new WP_Query($args);

	if ($loop->have_posts()) :
	?>
		<ul class="sidebar__menu">
			<?php
			while ($loop->have_posts()) : $loop->the_post();
				$class = ($id_post == $loop->post->ID && is_single()) ? "active" : "";
			?>
				<li class="<?php echo $class; ?>">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			<?php
			endwhile;
			?>
		</ul>
	<?php
	endif;

	wp_reset_postdata();
	?>
</div>

<div class="c-sidebar">
	<h3 class="sidebar__title">Archives</h3>
	<ul class="sidebar__menu">

		<?php
		global $posts;

		$q = "SELECT YEAR(post_date) as Year
                        FROM $wpdb->posts as p                      
                        left join $wpdb->term_relationships as r on p.ID = r.object_id
                        left join $wpdb->terms as t on t.term_id = r.term_taxonomy_id
                        WHERE post_status = 'publish' AND post_type = 'post'
                        GROUP BY Year
                        ORDER BY post_date DESC;";

		$links = $wpdb->get_results($q);
		$year_curr = substr($posts[0]->post_date, 0, 4);
		?>

		<?php foreach ($links as $link) :

			$class = ($year_curr == $link->Year) ? "active" : "";

		?>
			<li>
				<a class="<?= $class; ?>" href="<?php echo esc_url(get_year_link($link->Year)) ?>"> <?= $link->Year; ?></a>
			</li>
		<?php endforeach; ?>

	</ul>
</div>