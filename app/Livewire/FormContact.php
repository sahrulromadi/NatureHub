<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class FormContact extends Component
{
    public $name, $email, $phone, $subject, $message;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ];
    }

    public function save()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message
        ]);

        session()->flash('success', 'Thank you for contacting us! We will get back to you soon.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
