<?php

/**
 * Copyright (c) Tony Bogdanov <tonybogdanov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ExtendedLogger;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * A logger which accepts a message and prepends "[level] " to it before passing it to the wrapped logger.
 *
 * This allows you to change this:
 * $logger->info( '[info] Hello, my name is Tony Bogdanov.' );
 *
 * into this:
 * $logger->info( 'Hello, my name is Tony Bogdanov.' );
 *
 * The output will be:
 * [info] Hello, my name is Tony, Bogdanov.
 *
 * Class LevelLogger
 *
 * @package ExtendedLogger
 */
class LevelLogger implements LoggerInterface {

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $wrappedLogger;

    /**
     * LevelLogger constructor.
     *
     * @param LoggerInterface|null $wrappedLogger
     */
    public function __construct( LoggerInterface $wrappedLogger = null ) {

        $this->wrappedLogger = $wrappedLogger ?? new NullLogger();

    }

    /**
     * @inheritDoc
     */
    public function log( $level, $message, array $context = [] ) {

        $this->wrappedLogger->log( $level, '[' . $level . '] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function emergency( $message, array $context = [] ) {

        $this->wrappedLogger->emergency( '[emergency] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function alert( $message, array $context = [] ) {

        $this->wrappedLogger->alert( '[alert] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function critical( $message, array $context = [] ) {

        $this->wrappedLogger->critical( '[critical] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function error( $message, array $context = [] ) {

        $this->wrappedLogger->error( '[error] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function warning( $message, array $context = [] ) {

        $this->wrappedLogger->warning( '[warning] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function notice( $message, array $context = [] ) {

        $this->wrappedLogger->notice( '[notice] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function info( $message, array $context = [] ) {

        $this->wrappedLogger->info( '[info] ' . $message, $context );

    }

    /**
     * @inheritDoc
     */
    public function debug( $message, array $context = [] ) {

        $this->wrappedLogger->debug( '[debug] ' . $message, $context );

    }

}
