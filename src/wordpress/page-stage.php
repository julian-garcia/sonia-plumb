<?php
  get_header();
  if (isset($_GET['category'])) {
    $selected = $_GET['category'];
  } else {
    $selected ='work-in-progress';
    $_GET['category'] = $selected;
  }
?>
<section class="section">
  <form class="categories" method="GET" action="/stage?category=<?php echo $selected ?>" id="stageForm">
    <?php
    $categories = get_categories(
      array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false,
        'slug' => ['current','work-in-progress','repertory']
      )
    );
    foreach( $categories as $category ): ?>
      <input type="radio" name="category" value="<?php echo $category->slug; ?>" id="<?php echo $category->slug ?>">
      <label for="<?php echo $category->slug ?>" class="<?php echo $selected === $category->slug ? 'selected' : ''; ?>">
        <?php echo $category->name ?>
      </label>
    <?php endforeach;?>
  </form>

  <?php
    $the_query = new WP_Query(
      array(
        'post_type' => 'works',
        'posts_per_page' => '3',
        'category_name' => $selected
      )
    );
  if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="grid md:grid-cols-2 gap-4 border-y-2 border-button-outline my-8">
        <div class="my-10">
          <h4><?php the_title(); ?></h4>
          <?php the_excerpt(); ?>
          <a href="<?php the_permalink(); ?>" class="button-outline !text-black">
            Learn more
          </a>
        </div>
        <div class="bg-cover bg-center min-h-[400px] -my-0.5" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php else: ?>
    <div class="grid grid-cols-2 gap-4 border-y-2 border-button-outline my-8">
      <div class="my-10">
        <h4>Coming soon</h4>
      </div>
    </div>
  <?php endif; ?>

  <?php the_content(); ?>
</section>
<?php get_footer(); ?>
