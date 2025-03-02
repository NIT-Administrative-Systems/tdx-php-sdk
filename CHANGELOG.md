# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
## [v0.5.1] - 2025-02-24
### Added
- Support for Laravel 12.x added.

## [v0.5.0] - 2025-01-28
### Changed
- Support for PHP 8.1 has been removed.

## [v0.4.0] - 2024-01-25
### Added
- The `Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket\Ticket` class now features an `update` method, implementing the [Updates a Ticket](https://solutions.teamdynamix.com/TDWebApi/Home/section/Tickets#POSTapi/{appId}/tickets/{id}/feed) API.

## [v0.3.0] - 2024-01-10
### Added
- The `CreateTicket` entity has an optional parameter for `isRichHtml`, so you can send HTML in your description for prettier tickets.

## [v0.2.0] - 2022-12-20
This version includes breaking API changes. Until we reach v1.0.0, that may be the case. Sorry!

### Fixes
- Changes to the `CreateTicket` entity, including updated parameter names & types. This corrects a problem with creating a ticket assigned to a group.

## [v0.1.0] - 2022-12-02
- Alpha release with support for a few APIs.
