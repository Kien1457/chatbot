<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function sendChat(Request $request)
    {
        $userMessage = $request->input('#input');
        Log::info('User message:' . $userMessage);

        $responses = [
            'hello' => 'Hi! How Can I Assit You Today?',
            'How are you' => 'i am just a robot, but I\ am here to help!',
            'bye' => 'goodbye! Have nice day',
            'default' => '!Sorry! I didn`t not \understand you, can you say again!',
        ];

        $response = $responses['default'];
        foreach ($responses as $key => $reply) {
            if (stripos($userMessage, $key) !== false) {
                $response = $reply;
                break;
            }

            Log::info('Chatbot response: ' . $response);

            return response()->json($response);
        }
    }
}
