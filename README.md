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
#. Clone the repository
   ```bash
   git clone https://github.com/TYPO3-CEC/govstack-sandbox.git
   ```

#. Change to the new folder created by the git clone:
   ```bash
   cd govstack-sandbox
   ```

#. Start the DDEV environment:
   ```bash
   ddev start
   ```

#. Import the database:
   ```bash
   ddev import-db --file=dump/database.sql.gz
   ```

#. Import the project files into `public/fileadmin`:
   ```bash
   ddev exec tar -xzf dump/fileadmin.tar.gz -C public
   ```
   
6. Access your TYPO3 instance:  
   Main portal: https://govstack-typo3.ddev.site/
   Website example for an institution: https://institution.ddev.site/
   
   
7. Access TYPO3 backend:  
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
