<?php
namespace CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces;

use CarloNicora\Minimalism\Interfaces\ParameterInterface;

interface EncryptedParameterInterface extends ParameterInterface
{
    /**
     * @param EncrypterInterface $encrypter
     * @return mixed
     */
    public function setEncrypter(EncrypterInterface $encrypter): void;

    /**
     * @return mixed
     */
    public function getEncryptedValue(): mixed;
}