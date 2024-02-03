<?php
get_header();
if (isset($_GET['category'])) {
  $selected = $_GET['category'];
} else {
  $selected = 'artistic-team';
  $_GET['category'] = $selected;
}
?>
<section class="section">
  <form class="categories" method="GET" action="/our-team?category=<?php echo $selected ?>" id="stageForm">
    <?php
    $categories = get_categories(
      array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false,
        'slug' => ['artistic-team', 'dancer']
      )
    );
    foreach ($categories as $category) : ?>
      <input type="radio" name="category" value="<?php echo $category->slug; ?>" id="<?php echo $category->slug ?>">
      <label for="<?php echo $category->slug ?>" class="<?php echo $selected === $category->slug ? 'selected' : ''; ?>">
        <?php echo $category->name ?>
      </label>
    <?php endforeach; ?>
  </form>

  <?php
  $the_query = new WP_Query(
    array(
      'post_type' => 'team',
      'category_name' => $selected,
    )
  );
  if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <div class="team-card">
        <div class="my-10 px-8">
          <h4><?php the_title(); ?></h4>
          <?php if (get_field("position")) : ?>
            <p class="text-[#949494]"><?php echo get_field("position"); ?></p>
          <?php endif; ?>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="button-outline !text-black">
            Read full bio
          </a>
        </div>
        <div class="bg-cover bg-center min-h-[400px] -my-0.5" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
<section class="section text-center">
  <a href="#" class="button !bg-[#272727]">Join the team</a>
</section>
<section>
  <?php the_content(); ?>
</section>
<?php get_footer(); ?>