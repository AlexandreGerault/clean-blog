<?php


namespace AGerault\DBlog\Blog\UseCases\ReadLastArticle;


interface ReadLastArticlePresenterInterface
{
    public function present(ReadLastArticleResponse $response);
}