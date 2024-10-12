<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeDevis;
use App\Models\Commande;
use App\Models\CommandeComplaint;
use App\Mail\SendNotifClientNewOrder;
use App\Mail\SendNewOrderAdminMail;
use Illuminate\Support\Facades\Mail;
use PDF;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;


class CommandeController extends Controller
{
    public function processOrder(Request $request)
    {
        $data = $request->all();
        if($data['number']) {
            $response = $this->creditCardPayment($data);
            return redirect(route('order.success') . "?order_token=" . $response['token']);
        } else {
            $response = $this->paypalPayment($data);
            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'payer-action') {
                        return redirect()->away($links['href']);
                    }
                }
                /*return redirect()
                    ->route('createTransaction')
                    // ->with('error', 'Something went wrong.');*/
            } else {
                return redirect()->away(route('order.error',['ref' => $devis->ref]));
            }
        }
	}

    private function paypalPayment($data)
    {
        $devis = DemandeDevis::find($data['id']);
        $token = bcrypt($devis->ref);
        $devis->order_token = $token;
        $devis->update();


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('order.success') . "?order_token=" . $token,
                "cancel_url" => route('order.error',['ref' => $devis->ref]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => strtoupper($devis->response->price_unit->iso),
                        "value" => $devis->response->price
                    ],
                    "description" => $devis->ref
                ]
            ],
            "payment_source" => [
                "paypal" => [
                  "experience_context" => [
                    "payment_method_preference" => "IMMEDIATE_PAYMENT_REQUIRED",
                    "locale" => "en-US",
                    "landing_page" => "LOGIN",
                    "user_action" => "PAY_NOW"
                  ]
                ]
            ]
        ]);

        return $response;
    }


    private function paypal_detail()
    {

        
        $data = $request->all();
        $devis = DemandeDevis::find($data['id']);
        $token = bcrypt($devis->ref);
        $devis->order_token = $token;
        $devis->update();
        $items = [];
        $items[] = [
            "name" => 'Diangadingana',
            "image_url" => "https://www.madarom.net/assets/images/1699044205image_slide_2.jpg",
            "url" => 'https://www.madarom.net/product/essential-oils/saro-or-mandravasarotra-11',
            "quantity" => "5",
            "unit_amount" => [
                "currency_code" => strtoupper($devis->response->price_unit->iso),
                "value" => "10"
            ],
            "category" => 'PHYSICAL_GOODS'

        ];

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('order.success') . "?order_token=" . $token,
                "cancel_url" => route('order.error',['ref' => $devis->ref]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => strtoupper($devis->response->price_unit->iso),
                        "value" => "50",
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => strtoupper($devis->response->price_unit->iso),
                                "value" => "50"
                            ]
                        ]
                    ],
                    "description" => $devis->ref,
                    "items" => $items

                ]
            ]
        ]);

        
        
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            /*return redirect()
                ->route('createTransaction')
                // ->with('error', 'Something went wrong.');*/
        } else {
            /*return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');*/
        }
    }


    private function creditCardPayment($data)
    {
        $devis = DemandeDevis::find($data['id']);
        $token = bcrypt($devis->ref);
        $devis->order_token = $token;
        $devis->update();


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setRequestHeader('PayPal-Request-Id', $token);
        $paypalToken = $provider->getAccessToken();
        $card = [
            "name" => $data['card_nom'],
            "number" => $data['number'],
            "expiry" => $data['expiry'],
            "security_code" => $data['security_code']
        ];

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('order.success') . "?order_token=" . $token,
                "cancel_url" => route('order.error',['ref' => $devis->ref]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => strtoupper($devis->response->price_unit->iso),
                        "value" => $devis->response->price
                    ],
                    "description" => $devis->ref
                ]
            ],
            "payment_source" => [
                "card" => $card
            ]
        ]);

        $response['token'] = $token;

        return $response;
    }

    private function stripe()
    {
       $stripe = new \Stripe\StripeClient('sk_test_51Oei2SCdYO6dhQamkEb4xAfUJcrDJfXY9rj8DpA9HgGeZ80Kcr4IrMp5pHi9ZOsReSysSPLYGjKNOIZoRejn1RC700fbMFZhOD');

        $checkout_session = $stripe->checkout->sessions->create([
          'line_items' => [[
            'price_data' => [
              'currency' => strtolower($devis->response->price_unit->iso),
              'product_data' => [
                'name' => $devis->ref
              ],
              'unit_amount' => convert_devises($devis->response->price, $devis->response->price_unit->iso),
            ],
            'quantity' => 1,
          ]],
          'mode' => 'payment',
          'success_url' => route('order.success') . "?token=" . $token,
          'cancel_url' => route('order.error',['ref' => $devis->ref]),
        ]); 
    }

	public function error(Request $request, $ref)
	{
	    $devis = DemandeDevis::where('ref', $ref)->first();

	    if($devis) {
	    	$devis->update(['order_token' => null]);
	        return view('order.error', ['devis' => $devis]);
	    } else return redirect()->back();
	    
	}

	public function success(Request $request)
	{
	    $devis = DemandeDevis::where('order_token', $request->order_token)->first();
	    if($devis) {
	    	if($devis->commande_id) {
	    		$order = $devis->order;

	    	} else {
	    		$order = Commande::create([
		    		'demande_devis_id' => $devis->id,
		    		'statut' => 1
		    		
		    	]);
		    	$order->update(['ref' => $this->refCommande($order->id), 'numero_facture' => numero_facture($order)]);
		    	$devis->commande_id = $order->id;
		    	$devis->update();
	    	}

	    	$this->sendNotifClientNewOrder($order, '');

	    	$this->SendNewOrderAdminNotif($order);

	        return view('order.success', ['order' => $order]);
	    } else return redirect()->back();
	    
	}

	private function refCommande($id)
    {
        $ref = 'CO';
        $id = sprintf("%06d", $id);
        $ref.=$id;

        return $ref;
    }


    public function detail(Request $request, $id)
    {
    	$order = Commande::find($id);

        return view('order.detail', ['order' => $order]);
    }

    public function invoice(Request $request, $id)
    {
    	$order = Commande::find($id);
    	$pdf = PDF::loadView('order.invoice', compact('order'));
    	return $pdf->download(i18n('order.facture_file') . $order->numero_facture . ".pdf");

        //return view('order.invoice', ['order' => $order]);
    }

    private function sendNotifClientNewOrder($order, $body)
    {
        $subject = i18n('email.order_success_object') . $order->ref;

        $pdf = PDF::loadView('order.invoice', compact('order'));
        $pdf->save(public_path("assets/pdf/" . i18n('order.facture_file') . $order->numero_facture . ".pdf"));

        Mail::to($order->devis->user->email)->send(new SendNotifClientNewOrder($subject, $subject, strval($body), $order));
        
        
    }


    private function SendNewOrderAdminNotif($order)
    {
        $subject = 'Nouvelle commande ' . $order->ref;
        $emails = admin_emails_notifs();

        foreach ($emails as $key => $email) {
            Mail::to($email)->send(new SendNewOrderAdminMail($subject, $order));
        }  
    }


     public function complaint(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required'
        ]);

        $data = $request->all();
        unset($data['_token']);
        CommandeComplaint::create($data);
        $request->session()->flash('message', 'message');
        return redirect()->back();
    }


}
