<?php

namespace App\Models;

class Video implements \JsonSerializable {

    protected $nid;

    protected $title;

    protected $description;

    protected $url;

    public function __construct($nid, $title, $description, $url) {
        $this->nid = $nid;
        $this->title = $title;
        $this->description = $description;
        $this->$url = $url;
    }

    public function getId() {
        return $this->nid;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getUrl() {
        return $this->url;
    }

    public function jsonSerialize() {
        return array(
            'nid' => $this->nid,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url
        );
    }
}
