<?php

namespace App\Models;

class Radio implements \JsonSerializable
{

	protected $nid;
	protected $title;
	protected $description;
	protected $thumbnail;
	protected $channel;

	public function __construct($nid, $title, $description, $thumbnail, $channel)
	{
		$this->nid = $nid;
		$this->title = $title;
		$this->description = $description;
		$this->thumbnail = $thumbnail;
		$this->channel = $channel;
	}

	public function getId()
	{
		return $this->nid;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getThumbnail()
	{
		return $this->thumbnail;
	}

	public function getChannel()
	{
		return $this->channel;
	}

	public function jsonSerialize()
	{
		return array(
			'nid' => $this->nid,
			'title' => $this->title,
			'description' => $this->description,
			'channel' => $this->channel
		);
	}

}
