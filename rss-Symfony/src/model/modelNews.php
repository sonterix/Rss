<?php

namespace App\Model;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ModelNews
{

    public function getData()
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "0943");
        $sql = "SELECT * FROM news_data ORDER BY id DESC LIMIT 50";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }

}