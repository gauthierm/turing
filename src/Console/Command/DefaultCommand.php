<?php

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package   Turing
 * @copyright 2018 silverorange
 */
class DefaultCommand extends Command
{
    public function __construct()
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = $this->getApplication()->find('run');

        $browser = getenv('SELENIUM_BROWSER') || 'chrome';
        $serverURL = getenv('SELENIUM_SERVER_URL') || 'http://localhost:4444';
        $logsDir = getenv('STEWARD_LOGS_PATH') || 'tests/logs';

        $arguments = [
            'command' => 'run',
            'environment' => $environment,
            'browser' => $browser,
            '--logs-dir' => $logsDir,
            '--server-url' => $serverURL,
            '--verbose' => '2',
        ];

        $runInput = new ArrayInput($arguments);
        return $command->run($runInput, $output);
    }
}