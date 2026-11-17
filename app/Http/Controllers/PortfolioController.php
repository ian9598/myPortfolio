<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\ContactMessage;

class PortfolioController extends Controller
{
    /**
     * Show the single-page portfolio.
     */
    public function index()
    {
        return view('portfolio');
    }

    /**
     * Handle contact form submission.
     */
    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Mail::to(config('portfolio.personal.email'))->send(
            new ContactMessage($validated)
        );

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }

    /**
     * Download the resume PDF.
     */
    public function downloadResume()
    {
        $path = 'resume/Muhammad-Safiyan-Roslan-Resume.pdf';

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'Resume file not found.');
        }

        return response()->download(
            Storage::disk('public')->path($path),
            'Muhammad-Safiyan-Roslan-Resume.pdf'
        );
    }
}
