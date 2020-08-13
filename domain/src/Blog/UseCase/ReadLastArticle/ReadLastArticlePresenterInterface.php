<?php


namespace AGerault\DBlog\Blog\UseCase\ReadLastArticle;


interface ReadLastArticlePresenterInterface
{
    public function present(ReadLastArticleResponse $response);
}