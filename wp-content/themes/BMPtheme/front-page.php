<?php get_header(); ?>

      <script>
        $(function () {
          $(".rslides").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 500,
            timeout: 8000,    
            maxwidth: 960,
            namespace: "centered-btns"
          });    
        });
      </script>
  <div class="container">
      <div class="rslides_container">
        <ul class="rslides">
          <li><p>My <strong>family</strong> and I had a great time during our day out. I felt <strong>safe and comfortable</strong> the entire time. </p><img src="<?php bloginfo('template_directory'); ?>/images/slideshow/5.jpg"   alt="TNT Paintball" /></li>
          <li><p>This place is <strong>awesome</strong>, everyone is so <strong>friendly</strong>. My kids and I had a great time.</p><img src="<?php bloginfo('template_directory'); ?>/images/slideshow/1.jpg"   alt="TNT Paintball" /></li>
          <li><p>I felt pretty <strong>comfortable</strong> with the low speed paintball. I might try the high speed next time.</p><img src="<?php bloginfo('template_directory'); ?>/images/slideshow/2.jpg"   alt="TNT Paintball" /></li>
          <li><p>I had a awesome birthday! I <strong>shot my dad in the butt</strong>. The hotdogs were good too.</p><img src="<?php bloginfo('template_directory'); ?>/images/slideshow/3.jpg"   alt="TNT Paintball" /></li>
          <li><p>I came with my friends for my <strong>bachelor party</strong>. This was the perfect place to have it!</p><img src="<?php bloginfo('template_directory'); ?>/images/slideshow/4.jpg"   alt="TNT Paintball" /></li>
          
        </ul>
    </div>
  </div>
  
  <div class="container fivecol">
    <div class="col spanfive">
    <h2 class="pagetitle">Chose your style of play</h2>
    </div>
  </div>   
  <div class="container fivecol">  
      <div class="col spantwo">
        <a href="<?php bloginfo('url'); ?>/rates/low/" class="lowimpact"><?php dynamic_sidebar('lowimpact') ?></a>
      </div>
      
      <div class="col spantwo">
        <a href="<?php bloginfo('url'); ?>/rates/hi/" class="adrenaline"><?php dynamic_sidebar('adrenaline') ?></a>
      </div>
      
      <div class="col span">
        <div class="safety"><h4><a href="<?php bloginfo('url'); ?>/about/safety/">Safety info</a></h4></div>
        <div class="booknow"><h4><a href="<?php bloginfo('url'); ?>/rates/">Book Now!</a></h4></div>
      </div>
    </div>
  <div class="container fivecol">
    <div class="col spanfive">
    <h2 class="pagetitle"><span>Our Battlefields</span></h2>
    </div>
  </div> 

    <div class="container fivecol fields frontpage">
      
       <?php dynamic_sidebar('frontpage') ?>
    </div>


<?php get_footer(); ?>