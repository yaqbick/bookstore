<?php

class Model
{
    protected $id;
    protected $title;
    protected $publisher_id;
    protected $cover;
    protected $price;

    public function __construct(int $id, string $title, int $publisher_id, string $cover, float $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->publisher_id = $publisher_id;
        $this->cover = $cover;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getPublisherId(): int
    {
        return $this->id;
    }
    public function getCover(): string
    {
        return $this->cover;
    }
    public function getPrice(): string
    {
        return $this->price;
    }
}
