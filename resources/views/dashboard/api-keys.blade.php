@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">API Key Management</h1>
        @livewire('auth-module.api-key-manager')
    </div>
@endsection
