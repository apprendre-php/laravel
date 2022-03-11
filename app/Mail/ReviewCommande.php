<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewCommande extends Mailable
{
    use Queueable, SerializesModels;

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('mails.review')->with('order', $this->order);
        
        
        /* Log::info(
            sprintf(
                'Récapitulatifs de votre commande : '
            )
        );

        foreach($order->item as $item){
            Log::info(
                sprintf(
                    'Nom de l\'article : %s / quantitée : %s Prix Total HT : %s / Prix TTC : %s',
                        $item->name,
                        $item->pivot->quantity,
                        $ht = $item->price * $item->pivot->quantity,
                        $ttc = $ht * 1.2,
                )
            );    
        } */
       
        // récapitulatif de sa commande avec chaque item, 
        //leur quantitée et le coût total. Le prix total HT et 
        //TTC devras être affiché en fin de mail.
    }
}
