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
 * A logger which accepts a message with sprintf tokens and passes it through sprintf() with values supplied in the
 * $context array as arguments before passing it to the wrapped logger.
 *
 * This allows you to change this:
 * $logger->info( sprintf( 'Hello, my name is %s, %s.', 'Tony', 'Bogdanov' ) );
 *
 * into this:
 * $logger->info( 'Hello, my name is %s, %s.', [ 'Tony', 'Bogdanov' ] );
 *
 * The output will be:
 * Hello, my name is Tony, Bogdanov.
 *
 * Class SprintfLogger
 *
 * @package ExtendedLogger
 */
class SprintfLogger implements LoggerInterface {

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $wrappedLogger;

    /**
     * SprintfLogger constructor.
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

        $this->wrappedLogger->log( $level, sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function emergency( $message, array $context = [] ) {

        $this->wrappedLogger->emergency( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function alert( $message, array $context = [] ) {

        $this->wrappedLogger->alert( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function critical( $message, array $context = [] ) {

        $this->wrappedLogger->critical( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function error( $message, array $context = [] ) {

        $this->wrappedLogger->error( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function warning( $message, array $context = [] ) {

        $this->wrappedLogger->warning( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function notice( $message, array $context = [] ) {

        $this->wrappedLogger->notice( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function info( $message, array $context = [] ) {

        $this->wrappedLogger->info( sprintf( $message, ... $context ) );

    }

    /**
     * @inheritDoc
     */
    public function debug( $message, array $context = [] ) {

        $this->wrappedLogger->debug( sprintf( $message, ... $context ) );

    }

}
