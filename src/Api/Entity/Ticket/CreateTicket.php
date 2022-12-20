<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity\Ticket;

use DateTime;

class CreateTicket
{
    public function __construct(
        protected readonly int $typeId,
        protected readonly ?int $formId,
        protected readonly string $title,
        protected readonly ?string $description,
        protected readonly int $statusId,
        protected readonly int $priorityId,
        protected readonly string $requestorEmail,
        protected readonly ?int $accountId = null,
        protected readonly ?int $sourceId = null,
        protected readonly ?int $impactId = null,
        protected readonly ?int $urgencyId = null,
        protected readonly ?DateTime $goesOffHoldDate = null,
        protected readonly ?int $estimatedMinutes = null,
        protected readonly ?DateTime $startDate = null,
        protected readonly ?DateTime $endDate = null,
        protected readonly ?string $responsibleUid = null,
        protected readonly ?int $responsibleGroupId = null,
        protected readonly ?float $timeBudget = null,
        protected readonly ?float $expenseBudget = null,
        protected readonly ?int $locationId = null,
        protected readonly ?int $locationRoomId = null,
        protected readonly ?int $serviceId = null,
        protected readonly ?int $serviceOfferingId = null,
        protected readonly ?int $articleId = null,
        protected readonly ?int $articleShortcutId = null,
        protected readonly array $customAttributes = [],
    ) {
        //
    }

    public function toArray(): array
    {
        return [
            'TypeID' => $this->typeId,
            'FormID' => $this->formId,
            'Title' => $this->title,
            'Description' => $this->description,
            'AccountID' => $this->accountId,
            'StatusID' => $this->statusId,
            'PriorityID' => $this->priorityId,
            'RequestorEmail' => $this->requestorEmail,
            'SourceID' => $this->sourceId,
            'ImpactID' => $this->impactId,
            'UrgencyID' => $this->urgencyId,
            'GoesOffHoldDate' => $this->goesOffHoldDate,
            'EstimatedMinutes' => $this->estimatedMinutes,
            'StartDate' => $this->startDate,
            'EndDate' => $this->endDate,
            'ResponsibleUid' => $this->responsibleUid,
            'ResponsibleGroupID' => $this->responsibleGroupId,
            'TimeBudget' => $this->timeBudget,
            'ExpenseBudget' => $this->expenseBudget,
            'LocationID' => $this->locationId,
            'LocationRoomID' => $this->locationRoomId,
            'ServiceID' => $this->serviceId,
            'ServiceOfferingID' => $this->serviceOfferingId,
            'ArticleID' => $this->articleId,
            'ArticleShortcutID' => $this->articleShortcutId,
            'CustomAttributes' => $this->customAttributes,
        ];
    }
}
