<?php

namespace App\Model;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ModelCabinet
{
    public function setUpdate($id, $name, $link)
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "0943");
        $sql = $db->query("UPDATE rss_links SET name = '$name', link = '$link' WHERE id=$id");
    }

    public function getCountRows()
    {
        return $this->countRows;
    }

    public function getData()
    {
        $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "0943");
        $sql = $db->query("SELECT * FROM rss_links ORDER BY id");

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
