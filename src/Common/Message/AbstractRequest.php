<?php

namespace Omnipay\Extend\Common\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest {

	/**
	 * Set payment method .
	 *
	 * @param $value
	 * @return mixed
	 */
	public function setPaymentMethod($value) {
		return $this->setParameter('paymentMethod', $value);

	}

	/**
	 * Get payment method .
	 *
	 * @return mixed
	 */
	public function getPaymentMethod() {
		return $this->getParameter('paymentMethod');
	}
}
