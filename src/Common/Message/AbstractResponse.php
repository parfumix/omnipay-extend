<?php

namespace Omnipay\Extend\Common\Message;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse {

	/**
	 * Set plan id method .
	 *
	 * @param $value
	 * @return mixed
	 */
	public function setPlanId($value) {
		return $this->setParameter('plan_id', $value);

	}

	/**
	 * Get plan id method .
	 *
	 * @return mixed
	 */
	public function getPlanId() {
		return $this->getParameter('plan_id');
	}
}
