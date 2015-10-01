<?php namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;

use Illuminate\Queue\SerializesModels;

class CheckoutEvent extends Event {

	use SerializesModels;

	// Neste campo as variaveis para receber os valores

	private $user;
	private $order;

	public function __construct($user, $order)
	{
		$this->user = $user;
		$this->order= $order;

	}

//	public function __construct()
//	{
//
//	}

}
