<?php
get_header();
if (isset($_GET['category'])) {
  $catArray = explode('_', $_GET['category']);
  $selected = $catArray[0];
  if (sizeof($catArray) == 1) {
    $page = '1';
  } else {
    $page = end($catArray);
  }
} else {
  $selected = 'repertory';
  $page = '1';
}
$postsPerPage = 3;
$currentPageNumber = (int)$page;
$postCount = null;
$cats = get_terms('category');
foreach ($cats as $cat) {
  if ($cat->slug == $selected) {
    $postCount = $cat->count;
  }
}
$pageTotal = ceil($postCount / $postsPerPage);
?>
<section class="section">
  <form class="categories" method="GET" action="/stage?category=<?php echo $selected ?>" id="stageForm">
    <?php
    $categories = get_categories(
      array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'hide_empty' => false,
        'slug' => ['current', 'work-in-progress', 'repertory']
      )
    );
    foreach ($categories as $category) : ?>
      <input type="radio" name="category" value="<?php echo $category->slug; ?>" id="<?php echo $category->slug ?>">
      <label for="<?php echo $category->slug ?>" class="<?php echo $selected === $category->slug ? 'selected' : ''; ?>">
        <?php echo $category->name ?>
      </label>
    <?php endforeach; ?>
  </form>
  <? if ($pageTotal > 1) : ?>
    <ul class="pagination flex gap-4 justify-end text-button-outline">
      <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
        <?php if ($i == 1) : ?>
          <? if ($currentPageNumber == 1) : ?>
            <li>Prev</li>
          <?php else : ?>
            <li>
              <a href="<?php echo '/stage?category=' . $selected . '_' . $currentPageNumber - 1; ?>" class="text-button-active">Prev</a>
            </li>
          <?php endif; ?>
          <li>/</li>
        <?php endif; ?>
        <? if ($currentPageNumber == $i) : ?>
          <li class="text-button-active"><?php echo $i; ?></li>
        <?php else : ?>
          <li>
            <a href="<?php echo '/stage?category=' . $selected . '_' . $i; ?>" class="!text-button-outline">
              <?php echo $i; ?>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($i == $pageTotal) : ?>
          <li>/</li>
          <? if ($currentPageNumber == $pageTotal) : ?>
            <li>Next</li>
          <?php else : ?>
            <li class="active">
              <a href="<?php echo '/stage?category=' . $selected . '_' . $currentPageNumber + 1; ?>" class="text-button-active">Next</a>
            </li>
          <?php endif; ?>
        <?php else : ?>
          <li>/</li>
        <?php endif; ?>
      <?php endfor; ?>
    </ul>
  <?php endif; ?>
  <?php
  $the_query = new WP_Query(
    array(
      'post_type' => 'works',
      'posts_per_page' => $postsPerPage,
      'category_name' => $selected,
      'paged' => $page
    )
  );
  if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
      <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php the_content(); ?>
</section>
<?php get_footer(); ?>