<div class="side">
  <!-- Bouton RSS -->
  <a href="<?php bloginfo('rss2_url'); ?>">S'abonner au flux RSS</a>
    
  <!-- Formulaire de recherche -->
  <?php get_search_form(); ?>
  <!-- Archives -->
  <ul class="list">
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
</div>

<li id="recent-posts-3" class="widget-container widget_recent_entries">
  <h3 class="widget-title">Recent Posts</h3>
    
  <ul>
    <li><a href="#" title="speedwapp">speewapp intégré dans WordPress &nbsp;3.0</a></li>
    <li><a href="#" title="433">433</a></li>
    <li><a href="#" title="Recent Developments">Recent Developments</a></li>
    <li><a href="#" title="WYSIWYRG">WYSIWYRG</a></li>
    <li><a href="#" title="Quebec">Quebec</a></li>
  </ul>
</li>
