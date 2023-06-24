<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAIController extends Controller
{
    public function generateCompletion(Request $request){
        $client = new Client();

        $response = $client->post('https://api.openai.com/v1/engines/davinci-codex/completions',[
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'prompt' => $request->prompt,
                'max_tokens' => 150,
                'temperature' => 0.9,
                'top_p' => 1,
                'frequency_penalty' => 0.0,
                'presence_penalty' => 0.0,
                'stop' => ['\n']
            ]
        ]);
        $completion = json_decode($response->getBody()->getContents(), true);
        return response()->json($completion);
    }
}
