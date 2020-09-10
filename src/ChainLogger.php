<?php

/**
 * Copyright (c) Tony Bogdanov <tonybogdanov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ExtendedLogger;

use Psr\Log\LoggerInterface;

/**
 * A logger which accepts an array of PSR-3 loggers in the constructor and passes all messages through them in sequence.
 *
 * Class ChainLogger
 *
 * @package ExtendedLogger
 */
class ChainLogger implements LoggerInterface {

    /**
     * @var LoggerInterface[]
     */
    protected array $wrappedLoggers;

    /**
     * ChainLogger constructor.
     *
     * @param array $wrappedLoggers
     */
    public function __construct( array $wrappedLoggers = [] ) {

        $this->wrappedLoggers = $wrappedLoggers;

    }

    /**
     * @inheritDoc
     */
    public function log( $level, $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->log( $level, $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function emergency( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->emergency( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function alert( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->alert( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function critical( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->critical( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function error( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->error( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function warning( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->warning( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function notice( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->notice( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function info( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->info( $message, $context );

        }

    }

    /**
     * @inheritDoc
     */
    public function debug( $message, array $context = [] ) {

        foreach ( $this->wrappedLoggers as $logger ) {

            $logger->debug( $message, $context );

        }

    }

}
