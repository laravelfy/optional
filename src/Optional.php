<?php

namespace Laravelfy\Optional;

use ArrayObject;

/**
 * Optional, inspired by laravel's optional object
 */
class Optional extends ArrayObject
{
    private $storage = null;

    /**
     * 构造
     *
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->storage = $data;

        if (is_array($data) || is_object($data)) {
            parent::__construct($data);
        }
    }

    /**
     * 将返回的属性当做方法触发
     *
     * @return self
     */
    public function __invoke()
    {
        $arguments = func_get_args();
        if (!is_callable($this->storage)) {
            return new self(null);
        }

        $result = call_user_func_array($this->storage, $arguments);
        return new self($result);
    }

    /**
     * 获取属性
     *
     * @param string $attribute
     * @return self
     */
    public function __get($attribute)
    {
        if (is_array($this->storage) && isset($this->storage[$attribute])) {
            return new self($this->storage[$attribute]);
        }

        if (is_object($this->storage) && isset($this->storage->{$attribute})) {
            return new self($this->storage->{$attribute});
        }

        return new self(null);
    }

    /**
     * 调用魔术方法
     *
     * @param string $method
     * @param array $arguments
     * @return self
     */
    public function __call($method, $arguments)
    {
        if (!is_callable([$this->storage, $method]) && !is_callable([$this->storage, '__call']) && !is_callable([$this->storage, '__callStatic'])) {
            return new self(null);
        }

        $result = call_user_func_array([$this->storage, $method], $arguments);
        return new self($result);
    }

    /**
     * 转化为数组
     *
     * @return array
     */
    public function __toArray()
    {
        if (is_object($this->storage) && method_exists($this->storage, 'toArray')) {
            return $this->storage->toArray();
        } elseif (is_object($this->storage) && method_exists($this->storage, '__toArray')) {
            return $this->storage->__toArray();
        }

        return (array) $this->storage;
    }

    /**
     * 转化为字符串
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->storage;
    }
}
