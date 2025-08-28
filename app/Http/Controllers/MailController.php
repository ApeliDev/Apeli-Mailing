<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Available email templates
     *
     * @var array
     */
    protected $templates = [
        'purchase-confirmation' => [
            'name' => 'Purchase Confirmation',
            'view' => 'emails.purchase-confirmation',
            'fields' => [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
            ]
        ],
        // Add more templates here as needed
    ];

    /**
     * Show the email form for the specified template
     *
     * @param string $type
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEmailForm($type)
    {
        if (!array_key_exists($type, $this->templates)) {
            return redirect()->route('dashboard')->with('error', 'Invalid template selected.');
        }

        $template = $this->templates[$type];
        
        return view('email-form', [
            'template' => $template,
            'type' => $type
        ]);
    }

    /**
     * Send the email based on template type
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request, $type)
    {
        if (!array_key_exists($type, $this->templates)) {
            return redirect()->route('dashboard')->with('error', 'Invalid template selected.');
        }

        $template = $this->templates[$type];
        
        $validated = $request->validate($template['fields']);

        try {
            switch ($type) {
                case 'purchase-confirmation':
                    Mail::to($validated['email'])->send(new PurchaseConfirmationMail([
                        'name' => $validated['name']
                    ]));
                    break;
                // Add cases for other template types here
            }
            
            return redirect()->route('dashboard')
                ->with('success', ucfirst(str_replace('-', ' ', $type)) . ' email sent successfully!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage())
                ->withInput();
        }
    }
}
