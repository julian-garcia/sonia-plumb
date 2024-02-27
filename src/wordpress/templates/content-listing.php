<?php
if (isset($_GET['category'])) {
  $catArray = explode('_', $_GET['category']);
  $selected = $catArray[0];
  if (sizeof($catArray) == 1) {
    $page = '1';
  } else {
    $page = end($catArray);
  }
} else {
  $selected = $args['default_category'];
  $page = '1';
}
$currentPageNumber = (int)$page;
$postsPerPage = 3;
$postCount = null;
$readmore = array_search($selected, $args['categories']);
if ($selected) {
  $catDesc = substr(strip_tags(category_description(get_category_by_slug($selected)->term_id)), 1);
}

if ($args['post_type'] == 'partnership') {
  $postsPerPage = $args['posts_page'];
}

$categoryTypePosts = new WP_Query(array(
  'category_name' => $selected,
  'post_type' => $args['post_type']
));
$postCount = $categoryTypePosts->found_posts;

$pageTotal = $postCount ? ceil($postCount / $postsPerPage) : 0;
?>
<section class="section" id="postListing">
  <?php if ($args['post_type'] !== 'partnership') : ?>
    <form class="categories" method="GET" action="<?php echo $args['form_url'] ?>?category=<?php echo $selected ?>" id="stageForm">
      <?php
      $categories = get_categories(
        array(
          'orderby' => 'description',
          'order'   => 'ASC',
          'hide_empty' => false,
          'slug' => $args['categories']
        )
      );
      foreach ($categories as $category) : ?>
        <input type="radio" name="category" value="<?php echo $category->slug; ?>" id="<?php echo $category->slug ?>">
        <label for="<?php echo $category->slug ?>" class="<?php echo $selected === $category->slug ? 'selected' : ''; ?>">
          <?php echo $category->name ?>
        </label>
      <?php endforeach; ?>
    </form>
    <p class="w-[800px] max-w-full">
      <?php echo $catDesc; ?>
    </p>
  <?php endif; ?>
  <?php if ($pageTotal > 1) : ?>
    <ul class="pagination flex gap-4 my-8 justify-end text-button-outline">
      <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
        <?php if ($i == 1) : ?>
          <?php if ($currentPageNumber == 1) : ?>
            <li>Prev</li>
          <?php else : ?>
            <li>
              <a href="<?php echo $args['form_url'] . '?category=' . $selected . '_' . $currentPageNumber - 1; ?>" class="text-button-active">Prev</a>
            </li>
          <?php endif; ?>
          <li>/</li>
        <?php endif; ?>
        <?php if ($currentPageNumber == $i) : ?>
          <li class="text-button-active"><?php echo $i; ?></li>
        <?php else : ?>
          <li>
            <a href="<?php echo $args['form_url'] . '?category=' . $selected . '_' . $i; ?>" class="!text-button-outline">
              <?php echo $i; ?>
            </a>
          </li>
        <?php endif; ?>
        <?php if ($i == $pageTotal) : ?>
          <li>/</li>
          <?php if ($currentPageNumber == $pageTotal) : ?>
            <li>Next</li>
          <?php else : ?>
            <li class="active">
              <a href="<?php echo $args['form_url'] . '?category=' . $selected . '_' . $currentPageNumber + 1; ?>" class="text-button-active">Next</a>
            </li>
          <?php endif; ?>
        <?php else : ?>
          <li>/</li>
        <?php endif; ?>
      <?php endfor; ?>
    </ul>
  <?php endif; ?>
  <?php
  $orderBy = 'name';
  $order = 'ASC';

  if ($args['post_type'] == 'works') {
    $orderBy = 'date';
    $order = 'DESC';
  }
  $the_query = new WP_Query(
    array(
      'post_type' => $args['post_type'],
      'posts_per_page' => $postsPerPage,
      'category_name' => $selected,
      'paged' => $page,
      'orderby' => $orderBy,
      'order' => $order
    )
  );
  if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <?php if ($args['post_type'] == 'team') : ?>
        <div class="team-card">
          <div class="my-4 sm:my-10 px-4 sm:px-8">
            <h4><?php the_title(); ?></h4>
            <?php if (get_field("position")) : ?>
              <p class="text-[#949494]"><?php echo get_field("position"); ?></p>
            <?php endif; ?>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="button-outline !text-black" aria-label="<?php the_title(); ?>">
              <?php echo $args['read_more'][$readmore]; ?>
            </a>
          </div>
          <?php $bgCover = 'bg-contain opacity-10';
          $bgImg = '';
          if (get_the_post_thumbnail_url(get_the_ID())) {
            $bgCover = 'bg-cover opacity-100';
            $bgImg = "background-image: url('" . get_the_post_thumbnail_url(get_the_ID(), 'large') . "')";
          } ?>
          <div class="<?php echo $bgCover; ?> bg-center bg-gray-400 bg-no-repeat min-h-[400px] -my-0.5 bg-[url('../images/logo-square.svg')]" style="<?php echo $bgImg; ?>">
          </div>
        </div>
      <?php elseif ($args['post_type'] == 'partnership') : ?>
        <div class="grid md:grid-cols-2">
          <h4 class="mb-4">
            <a href="<?php echo get_field('partner_link'); ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a>
          </h4>
          <div><?php the_content(); ?></div>
        </div>
      <?php else : ?>
        <div class="grid md:grid-cols-2 gap-4 border-y-2 border-button-outline my-8">
          <div class="my-10">
            <h4 class="inline-block"><?php the_title(); ?></h4>
            <?php if ($args['post_type'] == 'works') : ?>
              <span class="text-xl font-light">
                (<?php echo get_the_date('Y'); ?>)
              </span>
            <?php endif; ?>
            <p class="text-[#949494] -mt-4"><?php echo get_field('level'); ?></p>
            <?php if ($args['post_type'] == 'class' && in_array($selected, ['classroom', 'contextual-dance'])) {
              the_content();
            } else {
              the_excerpt();
            } ?>
            <a href="<?php echo $args['post_type'] == 'class' && $selected === 'classroom' ? '/contact' :  get_permalink(); ?>" class="button-outline !text-black" aria-label="<?php the_title(); ?>">
              <?php echo $args['read_more'][$readmore]; ?>
            </a>
          </div>
          <div class="bg-cover bg-center bg-no-repeat min-h-[400px] -my-0.5" style="background-image: url('<?php the_post_thumbnail_url('large') ?>')"></div>
        </div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
  <?php endif; ?>
</section>