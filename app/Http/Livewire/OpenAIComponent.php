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
        return view('livewire.open-ai');
    }

    public function generateCompletion()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer YOUR_OPENAI_API_KEY',
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'prompt' => $this->prompt,
            'max_tokens' => 100,
        ]);

        $completion = json_decode($response->getBody(), true);
        $this->output = $completion['choices'][0]['text'];
    }
}
