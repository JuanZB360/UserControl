<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;

class ErrorServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        
    }

    public function handleError(callable $services)
    {
        try {
            $services();
        } catch (\Exception $e) {
            Log::Error([
                'Error: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'code' => $e->getCode()
            ]);
        }
    }
}
