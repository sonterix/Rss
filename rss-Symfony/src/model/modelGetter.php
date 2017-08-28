<?php 

class ModelGetter
{

    function __construct()
    {
        date_default_timezone_set('Europe/Kiev');

        $db = new PDO("mysql:host=localhost; dbname=sg_news; charset=utf8", "root", "0943");
        $sql = "INSERT IGNORE INTO news_data (title, link, description, source, pub_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);

        $feed_urls = [
            'http://www.pravda.com.ua/rss/',
            'http://football.ua/rss2.ashx',
            'https://rss.unian.net/site/news_ukr.rss',
        ];

        $feed = new SimplePie();
        $feed->enable_cache(false);

        $feed->set_feed_url($feed_urls);
        $feed->init();
        $items = $feed->get_items();

        foreach ($items as $item) {
            $stmt->execute([
                $item->get_title(),
                $item->get_link(),
                $item->get_description(),
                $item->get_feed()->get_link(),
                $item->get_date("Y-m-d H:i:s"),
            ]);
}

}
