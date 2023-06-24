<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class TranscribeComponent extends Component
{
    use WithFileUploads;

    public $audio;
    public $transcription;

    public function render()
    {
        return view('livewire.transcribe');
    }

    public function transcribe()
    {

        $path = $this->audio->store('public');
        $url = asset('storage/' . $path);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.api_key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/engines/davinci/transcriptions', [
            'audio' => $url,
        ]);

        $responseBody = $response->json();
        $this->transcription = $responseBody['transcription'];
    }
}
