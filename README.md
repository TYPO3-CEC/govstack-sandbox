# TYPO3 Project – DDEV Setup

This repository contains a TYPO3 website configured to run with [DDEV](https://ddev.readthedocs.io/).  
DDEV provides a Docker-based local development environment that is easy to set up and consistent across all platforms.

---

## Quick Start

### Prerequisites
- [Docker](https://docs.docker.com/get-docker/) installed and running
- [DDEV](https://ddev.readthedocs.io/en/stable/#installation) installed
- Git (for version control)

### Setup
1. Clone the repository

2. Start the DDEV environment:
   ```bash
   ddev start
   ```

3. Import the database:
   ```bash
   ddev import-db --file=dump/database.sql.gz
   ```

4. Unzip fileadmin
   ```bash
   cp dump/fileadmin.tar.gz public/
   ```
   ```bash
   ddev exec tar xzf public/fileadmin.tar.gz -C public
   ```
   ```bash
   rm public/fileadmin.tar.gz
   ```
   
5. Access your TYPO3 instance:  
   Main portal: https://govstack-typo3.ddev.site/
   Website example for an institution: https://institution.ddev.site/
   
   
6. Access TYPO3 backend:  
  https://govstack-typo3.ddev.site/typo3/ 
  <br/>username: admin
  <br/>password: TYPO3-BB_Govstack
   
## Common Commands

- Start environment:
  ```bash
  ddev start
  ```

- Stop environment:
  ```bash
  ddev stop
  ```

- Destroy environment (removes DB and containers):
  ```bash
  ddev delete
  ```
  
- Start site in browser (can be use instead of ddev start - starts project + open in browser)
  ```bash
  ddev launch
  ```

- Import database:
  ```bash
  ddev import-db --file=dump/database.sql.gz
  ```

- Export database:
  ```bash
  ddev export-db --file=dump/#dump_name#.sql.gz
  ```
  #dump_name# - name of the file for the database dump Ex: database_local_03_may
  
  
- Access PHP container shell:
  ```bash
  ddev ssh
  ```
  
---

## Development Notes

- TYPO3 is installed under `/public/`.
- All Composer dependencies are managed in `composer.json`.
- Database dumps are stored in `/.dumps/`.