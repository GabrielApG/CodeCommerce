<?php namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendEmailCheckout {

	public function __construct()
	{

	}

	public function handle(CheckoutEvent $event)
	{
		echo "Evento Disparado";

		// Colocar aqui o processo de Envio de e-mail
		$user = $event->getUser(); // recuperando o usuario passado para o checkoutEvento
	}

}
