<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Subscribe to the newsletter.
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        Newsletter::create([
            'email' => $request->email,
            'subscribed_at' => now()
        ]);
        
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
    
    /**
     * Unsubscribe from the newsletter.
     */
    public function unsubscribe(Request $request, $email)
    {
        $newsletter = Newsletter::where('email', $email)->first();
        
        if ($newsletter) {
            $newsletter->update(['is_active' => false]);
            return redirect()->route('home')->with('success', 'You have been unsubscribed from our newsletter.');
        }
        
        return redirect()->route('home')->with('error', 'Email not found in our newsletter list.');
    }
}