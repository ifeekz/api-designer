<?php

namespace App\Modules\AuthModule\Controllers;

use Illuminate\Http\Request;
use App\Modules\AuthModule\Models\ApiKey;

class ApiKeyController
{
    public function generate(Request $request)
    {
        $key = ApiKey::generate($request->user());
        return response()->json(['key' => $key->key]);
    }

    public function list(Request $request)
    {
        return response()->json($request->user()->apiKeys);
    }
}
