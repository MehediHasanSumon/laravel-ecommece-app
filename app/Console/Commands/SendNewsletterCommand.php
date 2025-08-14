<?php

namespace App\Console\Commands;

use App\Models\Newsletter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsletterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send {subject} {message}'; 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send newsletter to all active subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subject = $this->argument('subject');
        $message = $this->argument('message');
        
        $subscribers = Newsletter::where('is_active', true)->get();
        $count = $subscribers->count();
        
        if ($count === 0) {
            $this->error('No active subscribers found!');
            return 1;
        }
        
        $this->info("Sending newsletter to {$count} subscribers...");
        
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        
        foreach ($subscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(new \App\Mail\NewsletterMail($subject, $message, $subscriber->email));
                $bar->advance();
            } catch (\Exception $e) {
                $this->error("Failed to send email to {$subscriber->email}: {$e->getMessage()}");
                $bar->advance();
            }
        }
        
        $bar->finish();
        $this->newLine(2);
        $this->info('Newsletter sent successfully!');
        
        return 0;
    }
}