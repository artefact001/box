<?php

// namespace App\Http\Controllers;

// use App\Models\Idee;
// use App\Mail\IdeaStatusMail;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

// class IdeeController extends Controller
// {
//     public function approveIdea($id)
//     {
//         $idea = Idee::findOrFail($id);
//         $status = 'approuvée'; -->

        // Mettre à jour le statut de l'idée
        // $idea->status = 'approved';
        // $idea->save();

        // Envoyer le mail
    //     Mail::to($idea->email)->send(new IdeaStatusMail($idea, $status));

    //     return redirect()->route('idees.index')->with('success', 'Idée approuvée et email envoyé.');
    // }

    // public function rejectIdea($id)
    // {
    //     $idea = Idee::findOrFail($id);
    //     $status = 'rejetée';

        // Mettre à jour le statut de l'idée
        // $idea->status = 'rejected';
        // $idea->save();

        // Envoyer le mail
//         Mail::to($idea->email)->send(new IdeaStatusMail($idea, $status));

//         return redirect()->route('idees.index')->with('success', 'Idée rejetée et email envoyé.');
//     }
// }

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdeaStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $idea;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($idea, $status)
    {
        $this->idea = $idea;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Statut de votre idée')
                    ->view('emails.idea_status');
    }
}
