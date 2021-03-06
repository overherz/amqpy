<?php

namespace AMQPy\Serializers;

use AMQPy\Serializers\Exceptions\SerializerException;

class PlainText implements SerializerInterface
{
    const MIME = 'text/plain';

    public function serialize($value)
    {
        if (!is_string($value) && !is_numeric($value)) {
            throw new SerializerException("Failed to serialize value: Incompatible type");
        }

        return (string)$value;
    }

    public function parse($value)
    {
        if (!is_string($value) && !is_numeric($value)) {
            throw new SerializerException("Failed to parse value: Incompatible type");
        }

        return $value;
    }

    public function getContentType()
    {
        return self::MIME;
    }
}
