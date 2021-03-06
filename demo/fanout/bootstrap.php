<?php

$file = __DIR__ . '/../../vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run demo.');
}

$config = array(
    'example.fanout' => array(
        'type'       => AMQP_EX_TYPE_FANOUT, // send messages to all queues
        'flags'      => AMQP_DURABLE, // as for now we use only persistent exchanges and queues
        'serializer' => '\\AMQPy\\Serializers\\PhpNative',
        'prefetch'   => 1, // 3 is default, but we don't allow one consumer to hold more than one message at a time

        'messages'   => array(
            'flags'      => AMQP_DURABLE, // if shutdown occurred messages still be in queues
            'attributes' => array(
                'expiration' => 5000, // microseconds, how long messages should be stored before deleted
            ),
        ),
        'queues'     => array(
            'example.fanout.default' => array(
                'flags'          => AMQP_DURABLE,
                'args'           => array(),
                'routing_key'    => 'example.fanout.default',
                'consumer_flags' => AMQP_AUTOACK,
            ),
        ),
    )
);


