# TeamDyamix SDK for PHP
This is an unofficial PHP SDK for the [TeamDynamix REST APIs](https://solutions.teamdynamix.com/TDWebApi/).

A provider for Laravel is included, although this package can be used in non-Laravel PHP projects too.

**🚨 Note**: This is an early release. The API is unstable and will probably change.

## APIs
Here is the list of APIs that this package covers. The list is organized by the same categories as the API documentation.

- [ ] General (the uncategorized ones at the top)
  - [x] Auth - *Incomplete*, but does support logging in as a non-administrator
  - [ ] Accounts
  - [ ] Applications
  - [ ] Attachments
  - [ ] Attributes
  - [ ] Feed
  - [ ] Groups
  - [ ] Locations
  - [ ] People
  - [ ] Time
  - [ ] User Management
- [ ] Asset/Configuration Management
  - [ ] Asset Searches/Reports
  - [ ] Asset Statuses
  - [ ] Assets
  - [ ] Configuration Item Searches/Reports
  - [ ] Configuration Item Types
  - [ ] Maintenence Windows
  - [ ] Product Models
  - [ ] Product Types
  - [ ] Vendors
- [ ] Projects
  - [ ] Briefcase Files
  - [ ] Briefcase Folders
  - [ ] Issues
  - [ ] Plans
  - [ ] Projects
  - [ ] Risks
  - [ ] Tasks
- [ ] Reporting
  - [ ] Reports
- [ ] Roles
  - [ ] Functional Roles
  - [ ] Resource Pools
  - [ ] Security Roles
- [ ] Self-Service
  - [ ] Knowledge Base
  - [ ] Project Requests
  - [x] Service Catalog - *Incomplete*, but listing services is supported.
- [ ] Tickets
  - [ ] Blackout Windows
  - [ ] Impacts
  - [ ] Priorities
  - [ ] Sources
  - [ ] Ticket Searches/Reports
  - [x] Ticket Statuses
  - [x] Ticket Tasks
  - [x] Ticket Types
  - [x] Tickets - *Incomplete*, but creating & getting tickets is supported.
  - [ ] Urgencies

**Note**: It is unlikely that we will add support for every API on this list. We are open to pull requests!