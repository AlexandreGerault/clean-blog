<?php


namespace AGerault\DBlog\Blog\Gateway;


use AGerault\DBlog\Blog\Entity\Article;
use AGerault\DBlog\Blog\Exception\ArticleNotFoundException;

interface ArticlesGateway
{
    /**
     * @return Article[]
     */
    public function all(): array;

    /**
     * @throws ArticleNotFoundException
     * @return Article
     */
    public function last(): Article;
}