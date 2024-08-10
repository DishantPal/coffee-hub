<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Shop;
use App\Mail\PromoteYourShop;
use Illuminate\Support\Facades\Mail;

class SendPromotionEmails extends Command
{
    protected $signature = 'email:send-promotion';
    protected $description = 'Send promotion emails to 3 shops that are not promoted';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch 3 random shops that are not promoted
        $shops = Shop::where('is_promoted', false)->inRandomOrder()->take(3)->get();

        if ($shops->isEmpty()) {
            $this->info('No shops found that are not promoted.');
            return;
        }

        foreach ($shops as $shop) {
            // Send promotion email
            Mail::to($shop->email)->send(new PromoteYourShop($shop));
            $this->info('Promotion email sent to: ' . $shop->name . ' (' . $shop->email . ')');
        }

        $this->info('Promotion emails have been sent successfully!');
    }
}
