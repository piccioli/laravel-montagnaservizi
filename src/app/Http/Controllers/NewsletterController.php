<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): JsonResponse
    {
        $request->validate(['email' => ['required', 'email', 'max:255']]);

        $apiKey = config('services.brevo.api_key');
        $listId = config('services.brevo.list_id');

        // Graceful degradation: log and return success if keys not yet configured
        if (! $apiKey || ! $listId) {
            logger()->info('Newsletter subscribe (Brevo not configured): ' . $request->email);
            return response()->json(['success' => true]);
        }

        try {
            $response = Http::withHeaders([
                'api-key'      => $apiKey,
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ])->post('https://api.brevo.com/v3/contacts', [
                'email'         => $request->email,
                'listIds'       => [(int) $listId],
                'updateEnabled' => true,
            ]);

            // 201 Created, 204 No Content (already subscribed, updated)
            if ($response->successful()) {
                return response()->json(['success' => true]);
            }

            logger()->warning('Brevo API error', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Errore durante l\'iscrizione. Riprova tra qualche istante.',
            ], 422);

        } catch (\Throwable $e) {
            logger()->error('Brevo newsletter exception: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Errore di rete. Riprova.',
            ], 500);
        }
    }
}
