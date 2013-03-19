<?php
/**
 * @author Ben Pinepain <pinepain@gmail.com>
 * @url https://github.com/pinepain/amqpy
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AMQPy;


use \AMQPy\Exceptions\SerializerException;


interface ISerializer {
    /**
     * Returns string representation of a value
     *
     * @param mixed $value Value to serialize
     *
     * @throws SerializerException When serialization fails
     *
     * @return string Serialized value
     */
    public function serialize($value);

    /**
     * Decodes serialized string
     *
     * @param string $string String to parse
     *
     * @throws SerializerException When parsing fails
     *
     * @return mixed The value parsed from the given string
     */
    public function parse($string);

    /**
     * Get associated MIME type with serializer
     *
     * @return string MIME type according to IANA, RFC 2046, RFC 6648 and RFC 4288
     */
    public function getContentType();
}
