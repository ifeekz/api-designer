<?php

namespace App\Modules\AuthModule\Controllers;

use Illuminate\Http\Request;

class OAuthController
{
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
