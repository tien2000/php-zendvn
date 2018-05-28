<?php 
    require_once 'autoloader.php';

    $feed = new SimplePie();

    // https://vnexpress.net/rss/so-hoa.rss

    // Config
    $feed->set_feed_url('https://vnexpress.net/rss/so-hoa.rss');
    $feed->enable_cache(true);
    $feed->set_cache_duration(3600);
    $feed->set_cache_location('cache');
    $feed->handle_content_type();                           // Định dạng UTF-8
    $feed->strip_attributes(array('width', 'height'));      // Bỏ thuộc tính của thẻ html.
    $feed->strip_htmltags('img');                           // Bỏ thẻ html.

    $feed->init();

    // echo $feed->get_title() . "<br>";
    // echo $feed->get_description() . "<br>";
    // echo $feed->get_permalink() . "<br>";

    foreach ($feed->get_items(0, 2) as $item) {
        echo $item->get_title() . "<br>";
        echo $item->get_description() . "<br>";
        echo $item->get_date('d/m/Y') . "<br>";
        echo '<hr>';
    }

    // echo "<pre>";
    // print_r($feed);
    // echo "</pre>";
?>