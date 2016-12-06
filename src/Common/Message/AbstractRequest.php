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

	/**
	 * Getter: checkout language.
	 *
	 * @return string
	 */
	public function getLanguage() {
		return $this->getParameter('language');
	}

	/**
	 * Setter: checkout language.
	 *
	 * @param $value
	 *
	 * @return $this
	 */
	public function setLanguage($value) {
		return $this->setParameter('language', $value);
	}

	/**
	 * Getter: coupon.
	 *
	 * @return string
	 */
	public function getCoupon() {
		return $this->getParameter('coupon');
	}

	/**
	 * Setter: coupon.
	 *
	 * @param $value
	 *
	 * @return $this
	 */
	public function setCoupon($value) {
		return $this->setParameter('coupon', $value);
	}
}
