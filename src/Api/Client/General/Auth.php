<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\General;

use GuzzleHttp\Client;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\AuthResponse;

class Auth extends TdxClient
{
    /**
     * The authToken is normally required, but most calls for auth APIs do not require authentication.
     */
    public function __construct(ApiConfiguration $config, Client $httpClient, ?UnencryptedToken $authToken)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
        $this->authToken = $authToken;
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Auth#POSTapi/auth/login
     */
    public function login(string $userName = null, string $password = null): AuthResponse
    {
        $userName ??= $this->config->username;
        $password ??= $this->config->password;

        $response = $this->post('/api/auth/login', ['UserName' => $userName, 'password' => $password]);

        return AuthResponse::fromResponse($response);
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Auth#POSTapi/auth/loginadmin
     */
    /*
    public function loginAdmin(string $beid, string $webServicesKey): Response
    {
        //
    }
    */

    /**
     * POST https://solutions.teamdynamix.com/SBTDWebApi/api/auth
     * GET https://services.northwestern.edu/SBTDWebApi/api/auth/getuser
     * POST https://services.northwestern.edu/SBTDWebApi/api/auth/login
     * POST https://services.northwestern.edu/SBTDWebApi/api/auth/loginadmin
     * GET https://services.northwestern.edu/SBTDWebApi/api/auth/loginsso
     */
}
