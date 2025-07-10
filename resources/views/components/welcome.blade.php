<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Welcome to API Designer
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
        API Designer is an open-source B2B platform built with the TALL stack that helps teams design, secure, and manage modern APIs following best practices.
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">
            <x-heroicon-o-key class="w-6 h-6 text-gray-400" />
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                API Keys & OAuth
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Secure your API with full OAuth2 support (via Laravel Passport) or custom API Keys. Manage scopes, expiration, and access controls.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            {{-- <x-heroicon-o-refresh class="w-6 h-6 text-gray-400" /> --}}
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Rate Limiting & Quotas
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Protect your API from abuse with per-user rate limits and usage quotas. Easily configure via middleware or policies.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <x-heroicon-o-code-bracket-square class="w-6 h-6 text-gray-400" />
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                REST & GraphQL Ready
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Build APIs with either RESTful or GraphQL interfaces. Generate OpenAPI/Swagger docs and Postman collections automatically.
        </p>
    </div>

    <div>
        <div class="flex items-center">
            <x-heroicon-o-puzzle-piece class="w-6 h-6 text-gray-400" />
            <h2 class="ms-3 text-xl font-semibold text-gray-900">
                Modular & Extensible
            </h2>
        </div>

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
            Built with modular architecture using Laravel’s service providers, so each feature can evolve independently. Plug in new modules easily.
        </p>
    </div>
</div>
