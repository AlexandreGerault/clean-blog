<?php

namespace AGerault\DBlog\Blog\Entity;

use DateTime;

class Article
{
    private string $title;
    private string $content;
    private DateTime $publishedAt;
    private ?DateTime $editedAt;
    private bool $published;

    /**
     * Article constructor.
     * @param string $title
     * @param string $content
     * @param DateTime $publishedAt
     * @param ?DateTime $editedAt
     * @param bool $published
     */
    public function __construct(string $title, string $content, DateTime $publishedAt, DateTime $editedAt = null, bool $published = false)
    {
        $this->title = $title;
        $this->content = $content;
        $this->publishedAt = $publishedAt;
        $this->editedAt = $editedAt;
        $this->published = $published;
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @return ?DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->editedAt;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }


}