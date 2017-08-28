<?php

namespace App\Model;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Model\ModelCabinet as MCabinet;

class ModelLink
{

    public function putLink($nameLink, $addLink)
    {
        $mCabinet = new MCabinet;
        $db = new PDO("mysql:host=localhost; dbname=sg_news; charset=utf8", "root", "0943");
        $sqlInsert = $db->query("INSERT IGNORE INTO rss_links (name, link) VALUES ('$nameLink', '$addLink')");
    }

}