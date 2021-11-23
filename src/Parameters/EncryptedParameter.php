<?php
namespace CarloNicora\Minimalism\Interfaces\Encrypter\Parameters;

use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncryptedParameterInterface;
use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncrypterInterface;

class EncryptedParameter implements EncryptedParameterInterface
{
    /**
     * @var EncrypterInterface
     */
    private EncrypterInterface $encrypter;

    /**
     * @param EncrypterInterface $encrypter
     */
    public function setEncrypter(EncrypterInterface $encrypter): void
    {
        $this->encrypter = $encrypter;
    }

    /**
     * EnctyptedParameter constructor.
     * @param mixed $value
     */
    public function __construct(
        private mixed $value
    )
    {
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->encrypter->decryptId($this->value);
    }

    /**
     * @return mixed
     */
    public function getEncryptedValue(): mixed
    {
        return $this->value;
    }
}