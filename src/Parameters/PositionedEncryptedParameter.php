<?php
namespace CarloNicora\Minimalism\Interfaces\Encrypter\Parameters;

use CarloNicora\Minimalism\Interfaces\Encrypter\Factories\EncryptedParametersFactory;
use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncryptedParameterInterface;
use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncrypterInterface;
use CarloNicora\Minimalism\Interfaces\ObjectFactoryInterface;
use CarloNicora\Minimalism\Interfaces\ObjectInterface;
use CarloNicora\Minimalism\Parameters\PositionedParameter;

class PositionedEncryptedParameter extends PositionedParameter implements EncryptedParameterInterface, ObjectInterface
{
    /**
     * @var EncrypterInterface
     */
    private EncrypterInterface $encrypter;

    /**
     * @param EncrypterInterface $encrypter
     * @return mixed
     */
    public function setEncrypter(EncrypterInterface $encrypter): void
    {
        $this->encrypter = $encrypter;
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

    /**
     * @return EncryptedParametersFactory|string
     */
    public function getObjectFactoryClass(
    ): EncryptedParametersFactory|string
    {
        return ObjectFactoryInterface::class;
    }
}