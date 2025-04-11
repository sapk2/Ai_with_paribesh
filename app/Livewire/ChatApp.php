<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ChatApp extends Component
{ 
    public $notes;
    public $history=[];

    public function render()
    {
        return view('livewire.chat-app');
    }
    public function submit() {
        $this->validate([
            'notes' => 'required',
        ]);
        $historyvalue=["question"=>$this->notes];
        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            'x-goog-api-key' => env('GEMINI_API_KEY'),
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=AIzaSyDiDG-PASnkyUZjNyCF80eo2_BnlaDT8xU', [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $this->notes]
                    ]
                ]
            ]
        ]);
        
        if ($response->successful()) {
            
            $text=$response->json()['candidates'][0]['content']['parts'][0]['text'];
        }else{
            $text="something went wrong";
        }
        $historyvalue["answer"]=$text;
        $this->history[]=$historyvalue;
        
    }
    
}
