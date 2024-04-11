<?php

namespace App\Livewire\SalaMedia;

use Livewire\Component;

class LligarMedia extends Component
{
    public $messages;
    public $newMessage;

    public function mount()
    {
        $this->messages = Message::all(); // Carga los mensajes existentes
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newMessage' => 'required|max:255', // Validación básica
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|max:255', // Validación básica
        ]);

        $message = Message::create([
            'body' => $this->newMessage,
            // Añade otros campos necesarios, como 'user_id'
        ]);

        $this->messages[] = $message; // Añade el nuevo mensaje a la lista de mensajes
        $this->newMessage = ''; // Limpia el campo de texto
    }

    public $body;

    protected $rules = [
        'body' => 'required|max:1700',
    ];

    public function render()
    {
        return view('livewire.chat-component', [
            'messages' => Message::latest()->take(50)->get()->reverse(), // Obtiene los últimos 50 mensajes y los invierte para mostrar el más reciente al final
        ]);
    }

    public function sendMessages()
    {
        $this->validate();

        // Asigna el usuario autenticado al mensaje (asumiendo que tienes una columna user_id en tu tabla messages)
        Message::create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);

        $this->body = ''; // Limpia el campo después de enviar
    }
}

