<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use Stripe;
class StripeController extends BaseController
{
    public function index()
    {
        return view('checkout');
    }
 
    public function createCharge()
    {
        Stripe\Stripe::setApiKey(getenv('stripe.secret'));
        Stripe\Charge::create ([
                "amount" => 5 * 100,
                "currency" => "usd",
                "source" => $this->request->getVar('stripeToken'),
                "description" => "Binaryboxtuts Payment Test"
        ]);
         
        return redirect()->back()->with('success', 'Payment Successful!');
  
    }    
}