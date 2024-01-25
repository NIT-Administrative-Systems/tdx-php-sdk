<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket\FeedEntry;

class TicketFeedEntry
{
    public function __construct(
        protected readonly string $comments,
        protected readonly bool $cascadeStatus = false,
        protected readonly bool $isPrivate = false,
        protected readonly ?int $newStatusId = null,
        protected readonly ?array $notify = null,
        protected readonly ?bool $isRichHtml = false,
    ) {
        //
    }

    public function toArray(): array
    {
        return [
            'Comments' => $this->comments,
            'CascadeStatus' => $this->cascadeStatus,
            'IsPrivate' => $this->isPrivate,
            'NewStatusID' => $this->newStatusId,
            'Notify' => $this->notify,
            'IsRichHtml' => $this->isRichHtml
        ];
    }

    public static function fromArray(array $data): ?self
    {
        return new self(
            comments: $data['Comments'],
            cascadeStatus: $data['CascadeStatus'],
            isPrivate: $data['IsPrivate'],
            newStatusId: $data['NewStatusID'],
            notify: $data['Notify'],
            isRichHtml: $data['IsRichHtml'],
        );
    }
}