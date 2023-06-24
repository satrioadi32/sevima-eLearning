<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class OpenAIComponent extends Component
{
    public $prompt;
    public $output;

    public function render()
    {
        return view('livewire.openai');
    }

    public function generateCompletion()
    {
        $this->validate([
            'prompt' => 'required',
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.api_key'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/davinci/completions', [
                'prompt' => $this->prompt,
                'max_tokens' => 100,
            ]);

            $completion = json_decode($response->getBody(), true);
            $this->output = $completion['choices'][0]['text'];
        } catch (\Exception $e) {
            // Menangani error
            $this->output = 'Error: ' . $e->getMessage();
        }
    }
}
