<?php


namespace App\UserInterface\Presentation;


use AGerault\DBlog\Blog\UseCases\ReadLastArticle\ReadLastArticlePresenterInterface;
use AGerault\DBlog\Blog\UseCases\ReadLastArticle\ReadLastArticleResponse;

class ReadLastArticleHtmlPresenter implements ReadLastArticlePresenterInterface
{
    private ReadLastArticleViewModel $viewModel;

    /**
     * @return ReadLastArticleViewModel
     */
    public function getViewModel(): ReadLastArticleViewModel
    {
        return $this->viewModel;
    }

    public function present(ReadLastArticleResponse $response)
    {
        $this->viewModel = new ReadLastArticleViewModel();

        $this->viewModel->setTitle($response->getArticle()->getTitle());
        $this->viewModel->setContent($response->getArticle()->getContent());
        $this->viewModel->setPublishedAt($response->getArticle()->getPublishedAt());
        $this->viewModel->setUpdatedAt($response->getArticle()->getUpdatedAt());
    }
}