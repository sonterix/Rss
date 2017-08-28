<?php

namespace App\Model;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ModelEdDel
{

    public function getDataById()
    {
        $id = explode('=', $_SERVER['REQUEST_URI']);

        $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "0943");
        $sql = $db->query("SELECT * FROM rss_links WHERE id=$id[1]");
        
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDeleteById()
    {
        $id = explode('=', $_SERVER['REQUEST_URI']);

        $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "root", "0943");
        $sql = $db->query("DELETE FROM rss_links WHERE id=$id[1]");
    }

}