<?php get_header(); ?>
<div class="banner">
  <div class="image"
    style="background-image: url('<?php the_post_thumbnail_url() ?>')">
  </div>
  <h1><?php the_title(); ?></h1>
</div>
<section class="section">
  <div class="mb-10 text-[#949494]">
    <?php echo get_post_type_object(get_post_type())->labels->name; ?> /
    <?php $cats = get_categories(); if($cats): ?>
      <?php foreach($cats as $category): ?>
      <?php echo $category->name; ?> /
      <?php endforeach; ?>
    <?php endif; ?>
    <?php the_title(); ?>
  </div>
  <?php the_content(); ?>
</section>
<hr>
<?php if (get_field('artistic_team') or get_field('dancers') or get_field('education_team')): ?>
<section class="section">
  <div class="grid sm:grid-cols-2 gap-8 md:gap-16">
    <div>
      <?php if (get_field('artistic_team')): ?>
      <h3>Artistic Team</h3>
      <?php foreach( get_field('artistic_team') as $post ): setup_postdata($post); ?>
        <?php if (in_array('Artistic',get_field('team_member_type'))): ?>
          <div class="grid grid-cols-2">
            <a class="block" href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
            <div>
              <?php foreach( explode(',', get_field('team_member_roles')) as $role ): ?>
                <p class="m-0"><?php echo $role; ?></p>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif;  ?>
      <?php endforeach; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <div>
      <?php if (get_field('dancers')): ?>
      <h3>Dancers</h3>
      <?php foreach( get_field('dancers') as $post ): setup_postdata($post); ?>
        <a class="block" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php endforeach; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
    <div>
      <?php if (get_field('education_team')): ?>
      <h3>Education Team</h3>
      <?php foreach( get_field('education_team') as $post ): setup_postdata($post); ?>
        <a class="block" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <?php endforeach; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<hr>
<?php endif; ?>
<?php get_template_part('templates/content', 'gallery'); ?>
<?php get_footer(); ?>
