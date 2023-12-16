<?php
/**
 * The landing page. Unique page.
 */

get_header();
do_action( 'worksfront_landing_before' );
?>

<div class="landing"> Landing Page </div>
<div id="frontpage"></div>

<?php
do_action( 'worksfront_landing_after' );
get_footer();
