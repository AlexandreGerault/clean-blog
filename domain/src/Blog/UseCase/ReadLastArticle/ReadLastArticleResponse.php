<?php


namespace AGerault\DBlog\Blog\UseCase\ReadLastArticle;


use AGerault\DBlog\Blog\Entity\Article;

class ReadLastArticleResponse
{
    private Article $article;

    /**
     * ReadLastArticleResponse constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }
}