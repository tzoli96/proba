# Trial Task

PHP Codeigniter

## Table of Contents

- [Installation](#installation)
- [Environment](#environment)
- [Endpoints](#endpoints)

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/tzoli96/proba
   cd <project-directory>
2. **Environment File:**
   Rename the provided .env.example file to .env. Update the necessary configurations in the .env file, such as database credentials and any other environment-specific settings.
   ```bash
   git clone https://github.com/tzoli96/proba
   cd <project-directory>
3. **Build and Start Docker Containers:**
   ```bash
   docker-compose up -d --build
## Environment
- PHP 8.2 version 
- Mysql 5.7

## Endpoints
- **GET**: Simulated cron endpoint which populate your database table, accessible at **yourdomain/test** through a GET request.
