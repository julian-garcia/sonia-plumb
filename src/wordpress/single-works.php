<?php get_header(); ?>
<div class="banner">
  <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>'); background-position: <?php echo get_field("position"); ?>">
  </div>
</div>
<section class="section">
  <div class="mb-10 text-[#949494]">
    <a href="/our-stage" class="!text-[#949494]">Stage</a> /
    <?php $post_categories = get_the_category();
    if ($post_categories) {
      foreach ($post_categories as $category) {
        echo '<a class="!text-[#644d4d]" href="/our-stage?category=' . $category->slug . '">' . $category->name . '</a>';
      }
    } ?> /
    <?php the_title(); ?>
  </div>
  <h2 class="inline-block">
    <?php the_title(); ?>
  </h2>
  <span class="text-3xl font-light">
    (<?php echo get_field('works_year') ?: get_the_date('Y'); ?>)
  </span>
  <?php the_content(); ?>
</section>
<?php if (get_field('artistic_team') or get_field('dancers') or get_field('education_team') or get_field('music')) : ?>
  <section class="section">
    <hr>
    <div class="grid sm:grid-cols-2 gap-8 md:gap-16">
      <?php if (get_field('artistic_team')) : ?>
        <div>
          <h3>Artistic Team</h3>
          <?php foreach (get_field('artistic_team') as $post) : setup_postdata($post); ?>
            <div>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <?php if (get_field('team_member_roles')) : ?>
                /
                <span>
                  <?php foreach (explode(',', get_field('team_member_roles')) as $role) : ?>
                    <?php echo $role; ?>
                  <?php endforeach; ?>
                </span>
              <?php endif; ?>
            </div>
          <?php endforeach;
          wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
      <?php if (get_field('dancers')) : ?>
        <div>
          <h3>Dancers</h3>
          <?php foreach (get_field('dancers') as $post) : setup_postdata($post); ?>
            <a class="block" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if (get_field('education_team')) : ?>
        <div>
          <h3>Education Team</h3>
          <?php foreach (get_field('education_team') as $post) : setup_postdata($post); ?>
            <div>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <?php if (get_field('team_member_roles')) : ?>
                /
                <span>
                  <?php foreach (explode(',', get_field('team_member_roles')) as $role) : ?>
                    <?php echo $role; ?>
                  <?php endforeach; ?>
                </span>
              <?php endif; ?>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if (get_field('music')) : ?>
        <div>
          <h3>Music</h3>
          <?php echo get_field('music'); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php if (get_field('sponsors')) : ?>
  <section class="section mt-12">
    <h3>Sponsors</h3>
    <?php echo get_field('sponsors'); ?>
  </section>
<?php endif; ?>

<section class="section">
  <?php get_template_part('templates/content', 'testimonials'); ?>
</section>

<?php get_template_part('templates/content', 'gallery'); ?>

<?php if (get_field('external_links')) : ?>
  <section class="section">
    <hr>
    <?php echo get_field('external_links'); ?>
  </section>
<?php endif; ?>

<?php get_footer(); ?>