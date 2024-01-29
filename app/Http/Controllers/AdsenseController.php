<?php

namespace App\Http\Controllers;

use App\Models\AdsenseCode;
use Illuminate\Http\Request;

class AdsenseController extends Controller
{
    // AdsenseController içinde gerekli fonksiyonları oluşturun:
    public function showForm()
    {
        return view('adsense.form');
    }

    public function saveAdsenseCode(Request $request)
    {

        $request->validate([
            'adsense_code' => 'required|string',
        ]);

        AdsenseCode::create([
            'code' => $request->input('adsense_code'),
            'user_id' => 1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reklam kodu başarıyla kaydedildi!'
        ]);
    }
}
