<?php
    get_header();

    $heading = get_field('fof_heading', 'option');
    $image = get_field('fof_image', 'option');
    $subheading = get_field('fof_subheading', 'option');
    $bottomCtaText = get_field('fof_bottom_cta_text', 'option');
    $bottomCtaLink = get_field('fof_bottom_cta_link', 'option');

?>
<div class="container">
<div class="no-page-wrap">    
<h2 class="no-page-head">404</h2>
<p class="no-page-text">Oops! Page Not Found.</p>
<p class="no-page-link"><a href="https://elitegas.com/">Return to Home Page</a></p>
</div>
</div>

<?php
    get_blocks();
    get_footer();
?>