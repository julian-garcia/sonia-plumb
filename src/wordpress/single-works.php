<?php get_header(); ?>
<div class="banner">
  <div class="image" style="background-image: url('<?php the_post_thumbnail_url() ?>')">
  </div>
</div>
<section class="section">
  <div class="mb-10 text-[#949494]">
    <?php echo get_post_type_object(get_post_type())->labels->name; ?> /
    <?php $post_categories = get_the_category();
    if ($post_categories) {
      foreach ($post_categories as $category) {
        echo $category->name;
      }
    } ?> /
    <?php the_title(); ?>
  </div>
  <h2><?php the_title(); ?></h2>
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
            <div class="grid grid-cols-2">
              <a class="block" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <?php if (get_field('team_member_roles')) : ?>
                <div>
                  <?php foreach (explode(',', get_field('team_member_roles')) as $role) : ?>
                    <p class="m-0"><?php echo $role; ?></p>
                  <?php endforeach; ?>
                </div>
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
            <div class="grid grid-cols-2">
              <a class="block" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
              <div>
                <?php foreach (explode(',', get_field('team_member_roles')) as $role) : ?>
                  <p class="m-0"><?php echo $role; ?></p>
                <?php endforeach; ?>
              </div>
            </div>
            <?php wp_reset_postdata(); ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if (get_field('music')) : ?>
        <div>
          <h3>Music</h3>
          <?php the_field('music'); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<?php if (get_field('sponsors')) : ?>
  <section class="section mt-12">
    <h3>Sponsors</h3>
    <?php the_field('sponsors'); ?>
  </section>
<?php endif; ?>

<section class="section">
  <?php get_template_part('templates/content', 'testimonials'); ?>
</section>

<?php get_template_part('templates/content', 'gallery'); ?>

<?php if (get_field('external_links')) : ?>
  <section class="section">
    <hr>
    <?php the_field('external_links'); ?>
  </section>
<?php endif; ?>

<?php get_footer(); ?>