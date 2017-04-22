<?php



declare(strict_types=1);



namespace BrianFaust\Environment\Console\Commands;

class DecryptEnvCommand extends EnvCommand
{
    /**
     * @var string
     */
    protected $signature = 'env:decrypt';

    /**
     * @var string
     */
    protected $description = 'Decrypt the .env file.';

    public function handle(): void
    {
        $contents = $this->getEnvVars()->map(function ($value, $key) {
            return $this->buildDecryptedString($key, $value);
        });

        $this->write('decrypted', $contents);
    }
}
