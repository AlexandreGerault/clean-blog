<?php


namespace AGerault\DBlog\Blog\Gateway;


use AGerault\DBlog\Blog\Entity\Article;

interface ArticlesGateway
{
    /**
     * @return Article[]
     */
    public function all(): array;

    /**
     * @return Article
     */
    public function last(): Article;
}