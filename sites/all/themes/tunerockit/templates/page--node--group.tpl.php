<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<!-- include jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!-- include JustWave Player css and js files -->
<link type="text/css" rel="stylesheet" href="/sites/all/libraries/justwave/justwave.player.css">
<script src="/sites/all/libraries/justwave/justwave.player-min.js"></script>

<script>
$(document).ready( function() {
// inject players to audio elements
// if they have justwave class name only
  $.justwave();
});
</script>


<audio width="800" height="269" poster="/sites/default/files/styles/medium/public/song-img/14489099-Seamless-wave-hand-drawn-pattern-Abstract-background--Stock-Vector.jpg" src="http://everwebcodebox.com/audio-player-master/audio/CosmicTraveler.mp3"></audio> 


<?php if ($page['searchmenu']): ?>
<div class="top-bar" id="search-menu">
 <div class="expanded row">
 <div class="small-12 columns">
  <div class="top-bar-left"> 

  </div>
    <div class="top-bar-right">
    <?php print render($page['searchmenu']); ?>
  </div>
  </div>
  </div>
</div>
<?php endif; ?>
    

    
<?php if ($page['mainmenu']): ?>
<div class="expanded row trwrap mainmenu">
		<div class="columns">
 <?php print render($page['mainmenu']); ?>
		</div>
</div>
<?php endif; ?>
    
    
<?php if ($page['navigation']): ?>
	<div class="expanded row trwrap navigation">
		<div class="columns">
 <?php print render($page['navigation']); ?>
		</div>
	</div>
<?php endif; ?>


<?php if ($page['authmenu']): ?>
<div class="expanded row trwrap authmenu">
    <div class="columns">
 <?php print render($page['authmenu']); ?>
	</div>
</div>
<?php endif; ?>


<div class="trhead" style="background:url(<?php print file_create_url($node->field_header_image[LANGUAGE_NONE][0]['uri']); ?>) center center;background-size:cover;"> 


<div class="row">
	<div class="small-12 small-centered columns title artist_band_name">
		<div class="inside_title">
    <?php print render($title_prefix); ?>
    
    		<h3><?php print $title; ?></h3>
    <?php print render($title_suffix); ?>
		</div>
	</div>
</div>

    
</div> <!-- header photo area trhead -->

<?php if ($page['alertbar']): ?>
<div class="trwrap alertbar">
<div class="row">
		<div class="small-12 columns alertbar artistslogan">
 <?php print render($page['alertbar']); ?>
		</div>
	</div>
</div>
 <?php endif; ?>
 
 
 
 
<div class="trwrap colorbar">
<div class="row">
		<div class="small-12 columns alertbar artistslogan">
		
<?php 
	$slogan = field_view_field('node', $node, 'field_slogan', array('label'=>'hidden'));
	print render($slogan);
 ?>

		</div>
	</div>
</div>



<!-- Alert Bar -->

		<?php if ($tabs = render($tabs)): ?>
    	<dl class="sub-nav">
        <?php print $tabs; ?>
      </dl>
    <?php endif; ?>



    <?php if ($action_links): ?>
    	<ul class="action-links clearfix expanded row">
    		<?php print render($action_links); ?>
    	</ul>
    <?php endif; ?>
    
    
<div class="row">

	<?php if ($page['left']): ?>
    <div class="large-3 columns">
      <?php print render($page['left']); ?>
    </div>
		<!-- Left sidebar -->
  <?php endif; ?>




    
    
    
  <div class="<?php print $main_columns; ?> columns">
   <?php print $messages; ?>
   

  
    <?php print render($page['content']); ?>
    
    
    
  </div>
  <!-- Main content area -->

  <?php if ($page['right']): ?>
    <div class="large-3 columns">
      <?php print render($page['right']); ?>
    </div>
		<!-- Right sidebar -->
  <?php endif; ?>

</div>

</div>

<?php if ($page['footer']): ?>
  <div class="expanded row footeroutsy footback">
      <div class="large-12 columns"><hr></div>
</div>
  <div class="expanded row trfooter footerinsy footback">
    <div class="large-12 columns">
			<?php print render($page['footer']); ?>
    </div>
  </div>
	<!-- Footer -->
<?php endif; ?>
