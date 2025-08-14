<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class NewsletterController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-newsletters')->only(['index', 'show']);
        $this->middleware('permission:delete-newsletters')->only(['destroy']);
        $this->middleware('permission:send-newsletters')->only(['showSendForm', 'send']);
    }
    
    /**
     * Display a listing of the newsletters.
     */
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(15);
        return view('admin.newsletters.index', compact('newsletters'));
    }
    
    /**
     * Display the specified newsletter.
     */
    public function show(Newsletter $newsletter)
    {
        return view('admin.newsletters.show', compact('newsletter'));
    }
    
    /**
     * Remove the specified newsletter from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Newsletter subscription deleted successfully');
    }
    
    /**
     * Export all newsletter subscribers to CSV.
     */
    public function export()
    {
        $newsletters = Newsletter::where('is_active', true)->get();
        $filename = 'newsletter_subscribers_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($newsletters) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Email', 'Subscribed At']);
            
            foreach ($newsletters as $newsletter) {
                fputcsv($file, [
                    $newsletter->id,
                    $newsletter->email,
                    $newsletter->subscribed_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
    
    /**
     * Show the form for sending a newsletter.
     */
    public function showSendForm()
    {
        return view('admin.newsletters.send');
    }
    
    /**
     * Send a newsletter to all active subscribers.
     */
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'test_mode' => 'nullable|boolean',
        ]);
        
        $subject = $request->subject;
        $message = $request->message;
        $testMode = $request->has('test_mode');
        
        if ($testMode) {
            // Send test email to admin only
            Mail::to(auth()->user()->email)
                ->send(new NewsletterMail($subject, $message));
                
            return redirect()->back()->with('success', 'Test newsletter sent successfully!');
        } else {
            // In a real application, you would queue this job
            // For now, we'll use Artisan command
            $exitCode = Artisan::call('newsletter:send', [
                'subject' => $subject,
                'message' => $message,
            ]);
            
            if ($exitCode === 0) {
                return redirect()->back()->with('success', 'Newsletter sent successfully to all active subscribers!');
            } else {
                return redirect()->back()->with('error', 'Failed to send newsletter. Please try again.');
            }
        }
    }
}