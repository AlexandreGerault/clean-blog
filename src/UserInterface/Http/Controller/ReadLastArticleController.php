<?php


namespace App\UserInterface\Http\Controller;


use AGerault\DBlog\Blog\Exception\ArticleNotFoundException;
use AGerault\DBlog\Blog\UseCases\ReadLastArticle\ReadLastArticle;
use App\UserInterface\Presentation\ReadLastArticleHtmlPresenter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ReadLastArticleController
{
    /**
     * @param ReadLastArticle $readLastArticle
     * @param ReadLastArticleHtmlPresenter $presenter
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function __invoke(
        ReadLastArticle $readLastArticle,
        ReadLastArticleHtmlPresenter $presenter,
        SerializerInterface $serializer
    ): JsonResponse
    {
        try {
            $readLastArticle->execute($presenter);

            return new JsonResponse(
                $serializer->serialize($presenter->getViewModel(), 'json'),
                Response::HTTP_FOUND,
                [],
                true
            );
        } catch (ArticleNotFoundException $e) {
            dd($e);
        }
    }
}