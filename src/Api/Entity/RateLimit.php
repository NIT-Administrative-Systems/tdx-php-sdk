<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Entity;

use DateTime;

/**
 * Each API call is independently rate-limited by either IP, user, or organization.
 *
 * Information about rate limiting is sent with every API response.
 *
 * @property int $remaining The remaining number of calls that can be made for the period, from X-RateLimit-Remaining.
 * @property int $limit The total number of calls that may be made during the period, from X-RateLimit-Limit.
 * @property DateTime $resetAt When the current period ends and the remaining calls are reset.
 *
 * @link https://solutions.teamdynamix.com/TDWebApi/Home/AboutRateLimiting
 */
class RateLimit
{
    public function __construct(
        public readonly int $remaining,
        public readonly int $limit,
        public readonly DateTime $resetAt,
    ) {
        //
    }
}
