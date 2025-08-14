<?php

namespace App\Security;

use App\Repository\UsuarioRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class ApiKeyAuthenticator extends AbstractAuthenticator
{
    private $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function supports(Request $request): ?bool
    {
        // Solo si el header existe
        return $request->headers->has('X-API-KEY');
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        $apiKey = $request->headers->get('X-API-KEY');

        if (!$apiKey) {
            throw new CustomUserMessageAuthenticationException('Falta la API Key');
        }

        return new SelfValidatingPassport(
            new UserBadge($apiKey, function ($apiKey) {
                // Buscar usuario por la API key
                $usuario = $this->usuarioRepository->findOneBy(['apiKey' => $apiKey]);

                if (!$usuario) {
                    throw new CustomUserMessageAuthenticationException('API Key inválida');
                }

                return $usuario;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, $token, string $firewallName): ?Response
    {
        // Si quieres que siga el flujo normal
        return null;
    }

    public function onAuthenticationFailure(Request $request, \Symfony\Component\Security\Core\Exception\AuthenticationException $exception): ?Response
    {
        return new Response($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
    }
}

