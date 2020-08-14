<?php


namespace App\UserInterface\Http\Controller;


use AGerault\DBlog\Security\Exception\InvalidCredentialsException;
use AGerault\DBlog\Security\Exception\UserNotFoundException;
use AGerault\DBlog\Security\UseCase\Login\Login;
use AGerault\DBlog\Security\UseCase\Login\LoginRequest;
use App\UserInterface\Presentation\LoginJsonPresenter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class LoginController
{
    private SerializerInterface $serializer;

    /**
     * LoginController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @param Login $login
     * @param LoginJsonPresenter $presenter
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function __invoke(
        Request $request,
        Login $login,
        LoginJsonPresenter $presenter,
        SerializerInterface $serializer
    ): JsonResponse
    {
        try {
            if (!$request->query->has('username') || !$request->query->has('password'))
            {
                return $this->errorResponse('Veuillez renseigner un identifiant et un mot de passe', 400);
            }

            $login->execute(
                new LoginRequest($request->get('username'), $request->get('password')),
                $presenter
            );

            return new JsonResponse(
                $serializer->serialize($presenter->getLoggedUser(), 'json'),
                200,
                [],
                true
            );
        } catch (InvalidCredentialsException|UserNotFoundException $e) {
            return $this->errorResponse($e->getMessage(), 404);
        }
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    private function errorResponse(string $message, int $code)
    {
        return new JsonResponse(
            $this->serializer->serialize(['error' => $message], 'json'),
            $code,
            [],
            true
        );
    }
}