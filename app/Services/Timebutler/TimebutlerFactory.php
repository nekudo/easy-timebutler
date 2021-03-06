<?php

declare(strict_types=1);

namespace Nekudo\EasyTimebutler\Services\Timebutler;

use Bloatless\Endocore\Components\Logger\LoggerInterface;

class TimebutlerFactory
{
    /**
     * @var array $config
     */
    protected $config;

    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    /**
     * @param array $config
     * @param LoggerInterface $logger
     */
    public function __construct(array $config, LoggerInterface $logger)
    {
        $this->config = $config;
        $this->logger = $logger;
    }

    /**
     * Creates a new timebutler service instance.
     *
     * @return Timebutler
     * @throws TimebutlerException
     */
    public function make(): Timebutler
    {
        $timebutlerConfig = $this->config['timebutler'] ?? [];
        if (empty($timebutlerConfig)) {
            throw new \RuntimeException('timebutler config not found. Check config file.');
        }

        $timebutler = new Timebutler();
        $timebutler->setTmpDir($timebutlerConfig['tmp_dir']);

        return $timebutler;
    }
}
