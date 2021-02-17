<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Admin\ContactSection;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'subject'   =>  'required|max:255',
            'message'   =>  'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContactSection::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);

        // If an error is received, continue normal operation.
        try {

            $username = env('MAIL_USERNAME');

        Mail::to($username)
            ->send(new SendEmail($input['name'], $input['email'], $input['subject'], $input['message']));

        } catch (Throwable $e) {

            return redirect()->to('/'.'#messages')
                ->with('success_message','frontend.your_message_has_been_delivered');

        }

        return redirect()->to('/'.'#messages')
            ->with('success_message','frontend.your_message_has_been_delivered');
    }

}
