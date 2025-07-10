# API Developer Experience Platform (Open Source Tool)

A developer-focused platform to build, test, and document APIs using the TALL stack (Tailwind, Alpine.js, Laravel, Livewire). Built for B2B API product teams who care about best practices.

## Features

-   RESTful & GraphQL API interface support
-   Authentication via OAuth 2.0 or API Key
-   Rate limiting and quota tracking
-   Webhooks for real-time event subscriptions
-   Auto-generated API docs (Swagger/OpenAPI, Postman)
-   SDK and sample code in JS, PHP, Python
-   Dashboard UI (Livewire) to configure & monitor everything

## Tech Stack

-   **TALL Stack**: Tailwind CSS, Alpine.js, Laravel, Livewire
-   Laravel Passport (OAuth2) or custom API Keys
-   Swagger/OpenAPI docs via L5-Swagger
-   Redis for rate limiting & caching
-   Lighthouse for GraphQL support

## Installation

```bash
git clone https://github.com/ifeekz/api-designer.git
cd api-design-best-practices
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
```
