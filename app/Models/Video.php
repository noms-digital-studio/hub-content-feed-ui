<?php

namespace App\Models;

class Video implements \JsonSerializable {

    protected $nid;

    protected $title;

    protected $description;

    protected $duration;

    protected $url;

    protected $tags = array();

    protected $categories;


    public function __construct($nid, $title, $description, $duration, $url, $tags, $categories) {
        $this->nid = $nid;
        $this->title = $title;
        $this->description = $description;
        $this->duration = $duration;
        $this->url = $url;
        $this->tags = $tags;
        $this->categories = $categories;
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

    public function getDuration() {
        return $this->duration;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function jsonSerialize() {
        return array(
            'nid' => $this->nid,
            'title' => $this->title,
            'description' => $this->description,
            'duration' => $this->duration,
            'url' => $this->url,
            'tags' => $this->tags,
            'categories' => $this->categories
        );
    }
}
