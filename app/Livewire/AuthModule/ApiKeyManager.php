<?php

namespace App\Livewire\AuthModule;

use Livewire\Component;
use App\Modules\AuthModule\Models\ApiKey;
use Illuminate\Support\Facades\Auth;

class ApiKeyManager extends Component
{
    public $keys = [];

    public function mount()
    {
        $this->loadKeys();
    }

    public function loadKeys()
    {
        $this->keys = Auth::user()->apiKeys()->latest()->get();
    }

    public function generateKey()
    {
        ApiKey::generate(Auth::user());
        $this->loadKeys();
        session()->flash('message', 'API key generated.');
    }

    public function revokeKey($id)
    {
        $key = ApiKey::where('user_id', Auth::id())->findOrFail($id);
        $key->update(['active' => false]);

        $this->loadKeys();
        session()->flash('message', 'API key revoked.');
    }
    public function render()
    {
        return view('livewire.auth-module.api-key-manager');
    }
}
