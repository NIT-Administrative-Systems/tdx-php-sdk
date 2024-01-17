<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket;

use GuzzleHttp\Client;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\Application;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\CreateTicket;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\FeedEntry\TicketFeedEntry;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\FeedEntry\TicketFeedEntryResponse;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\TicketResponse;

class Ticket extends TdxClient
{
    public function __construct(
        ApiConfiguration $config,
        Client $httpClient,
        UnencryptedToken $authToken,
        protected Application $tdxApplication,
    ) {
        parent::__construct($config, $httpClient, $authToken);
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Tickets#GETapi/{appId}/tickets/{id}
     */
    public function getTicket(int $ticketId): TicketResponse
    {
        $response = $this->get(sprintf('/api/%s/tickets/%s', $this->tdxApplication->id, $ticketId));

        return TicketResponse::fromResponse($response);
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Tickets#POSTapi/{appId}/tickets?EnableNotifyReviewer={EnableNotifyReviewer}&NotifyRequestor={NotifyRequestor}&NotifyResponsible={NotifyResponsible}&AllowRequestorCreation={AllowRequestorCreation}
     */
    public function create(CreateTicket $ticketInfo, bool $notifyReviewer, bool $notifyRequestor, bool $notifyResponsible, bool $allowRequestorCreation): TicketResponse
    {
        $response = $this->post(
            path: sprintf('/api/%s/tickets', $this->tdxApplication->id),
            payload: $ticketInfo->toArray(),
            urlParameters: [
                'EnableNotifyReviewer' => $notifyReviewer,
                'NotifyRequestor' => $notifyRequestor,
                'NotifyResponsible' => $notifyResponsible,
                'AllowRequestorCreation' => $allowRequestorCreation,
            ],
        );

        return TicketResponse::fromResponse($response);
    }

    /**
     * @link https://solutions.teamdynamix.com/TDWebApi/Home/section/Tickets#POSTapi/{appId}/tickets/{id}/feed
     */
    public function update(int $ticketId, TicketFeedEntry $feedEntry): TicketFeedEntryResponse
    {
        $response = $this->post(
            path: sprintf('/api/%s/tickets/%s/sla', $this->tdxApplication->id, $ticketId),
            payload: $feedEntry->toArray()
        );

        return TicketFeedEntryResponse::fromResponse($response);
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Tickets#GETapi/{appId}/tickets/forms
     */
    public function allForms(): Response
    {
        return $this->get(sprintf('/api/%s/tickets/forms', $this->tdxApplication->id));
    }
}
