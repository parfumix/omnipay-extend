<?php

namespace Omnipay\Extend;

use Guzzle\Http\ClientInterface;
use Omnipay\Common\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class Factory {

	/**
	 * @var array
	 */
	protected static $gateways = array();

	/**
	 * @var array
	 */
	protected static $aliases = array();

	/**
	 * Get all gateways .
	 *
	 * @return array
	 */
	public static function all() {
		return self::$gateways;
	}

	/**
	 * Register new gateway .
	 *
	 * @param string $class
	 * @param array $parameters
	 * @param array $aliases
	 * @return $this
	 */
	public function register($class, array $parameters = array(), array $aliases = array()) {
		if (! class_exists($class))
			throw new RuntimeException("Class '$class' not found");

		if ( in_array($class, array_keys(self::$gateways)) )
			return $this;

		self::$gateways[$class] = $parameters;

		$aliases = (array)$aliases;
		foreach ($aliases as $alias)
			$this->alias($alias, $class);

		return $this;
	}

	/**
	 * Adding alias to specific class .
	 *
	 * @param $alias
	 * @param $class
	 * @return $this
	 */
	public function alias($alias, $class) {
		if (! class_exists($class))
			throw new RuntimeException("Class '$class' not found");

		if ( ! in_array($class, array_keys(self::$gateways)) )
			throw new RuntimeException("Class '$class' not found");

		$alias = $this->normalize($alias);

		if ( in_array($alias, array_keys(self::$aliases)) )
			return $this;

		self::$aliases[$alias] = $class;

		return $this;
	}

	/**
	 * Create new gateway instance .
	 *
	 * @param string $class
	 * @param ClientInterface|null $httpClient
	 * @param HttpRequest|null $httpRequest
	 * @return mixed
	 */
	public function create($class, ClientInterface $httpClient = null, HttpRequest $httpRequest = null) {
		$class = isset(self::$aliases[$this->normalize($class)])
			? self::$aliases[$this->normalize($class)]
			: $class;

		if (! class_exists($class))
			throw new RuntimeException("Class '$class' not found");

		$params = isset(self::$gateways[$class])
			? self::$gateways[$class]
			: array();

		return (new $class($httpClient, $httpRequest))
			->initialize($params);
	}

	/**
	 * Normalize alias .
	 *
	 * @param $alias
	 * @return string
	 */
	protected function normalize($alias) {
		return strtolower($alias);
	}

}