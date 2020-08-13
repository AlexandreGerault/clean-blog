<?php


namespace AGerault\DBlog\Blog\UseCase\ReadLastArticle;

use AGerault\DBlog\Blog\Exception\ArticleNotFoundException;
use AGerault\DBlog\Blog\Gateway\ArticlesGateway;

class ReadLastArticle
{
    private ArticlesGateway $articleGateway;

    /**
     * ReadLastArticle constructor.
     * @param ArticlesGateway $articleGateway
     */
    public function __construct(ArticlesGateway $articleGateway)
    {
        $this->articleGateway = $articleGateway;
    }

    /**
     * @return ArticlesGateway
     */
    public function getArticleGateway(): ArticlesGateway
    {
        return $this->articleGateway;
    }

    /**
     * @param ReadLastArticlePresenterInterface $presenter
     * @return mixed
     * @throws ArticleNotFoundException
     */
    public function execute(ReadLastArticlePresenterInterface $presenter)
    {
        $lastArticle = $this->articleGateway->last();

        $response = new ReadLastArticleResponse($lastArticle);

        return $presenter->present($response);
    }
}