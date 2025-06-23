<?php

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class OsusuApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.osusu.base_url', 'http://osusu.test/api/v1');
    }

    protected function getToken(): ?string
    {
        // Assumes user is authenticated and token is stored on user model
        return Auth::user()?->currentAccessToken()?->plainTextToken
            ?? Auth::user()?->api_token; // fallback
    }

    protected function withAuth()
    {
        $token = $this->getToken();

        return Http::withToken($token)->acceptJson();
    }

    public function getCategories()
    {
        return $this->withAuth()->get("{$this->baseUrl}/categories")->json();
    }

    public function getCategory($id)
    {
        return $this->withAuth()->get("{$this->baseUrl}/categories/{$id}")->json();
    }

    public function getOrders()
    {
        return $this->withAuth()->get("{$this->baseUrl}/orders")->json();
    }

    public function getOrder($id)
    {
        return $this->withAuth()->get("{$this->baseUrl}/orders/{$id}")->json();
    }

    public function getInstallments()
    {
        return $this->withAuth()->get("{$this->baseUrl}/installments")->json();
    }

    public function getTransactions()
    {
        return $this->withAuth()->get("{$this->baseUrl}/transactions")->json();
    }

    public function getInstallment($id)
    {
        return $this->withAuth()->get("{$this->baseUrl}/installments/{$id}")->json();
    }

    public function resetPassword(array $data)
    {
        return Http::acceptJson()
            ->post("{$this->baseUrl}/reset-password", $data)
            ->json();
    }
}
