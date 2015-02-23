<h1>Sitemap</h1>
<ul>
<?php
// Add pages you'd like to exclude in the exclude here
// Currently just excluding the sitemap page itself & _Test Page
wp_list_pages(
  array(
    'exclude' => '571,253',
    'title_li' => '',
  )
);
?>
</ul>