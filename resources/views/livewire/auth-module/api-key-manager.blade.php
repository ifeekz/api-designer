<div class="space-y-4 p-4">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="generateKey" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Generate New API Key
    </button>

    <div class="mt-4">
        <h2 class="text-lg font-semibold mb-2">Your API Keys</h2>
        <table class="w-full table-auto border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Key</th>
                    <th class="p-2">Active</th>
                    <th class="p-2">Created</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keys as $key)
                    <tr class="border-t">
                        <td class="p-2 font-mono text-sm">{{ $key->key }}</td>
                        <td class="p-2 text-center">
                            @if($key->active)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td class="p-2 text-sm">{{ $key->created_at->diffForHumans() }}</td>
                        <td class="p-2">
                            @if($key->active)
                                <button wire:click="revokeKey({{ $key->id }})"
                                    class="text-red-600 hover:underline">
                                    Revoke
                                </button>
                            @else
                                <span class="text-gray-500">Revoked</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
