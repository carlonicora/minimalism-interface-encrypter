<?php
namespace CarloNicora\Minimalism\Interfaces\Encrypter\Factories;

use CarloNicora\Minimalism\Interfaces\Encrypter\Interfaces\EncrypterInterface;
use CarloNicora\Minimalism\Interfaces\Encrypter\Parameters\EncryptedParameter;
use CarloNicora\Minimalism\Interfaces\Encrypter\Parameters\PositionedEncryptedParameter;
use CarloNicora\Minimalism\Interfaces\ObjectFactoryInterface;
use CarloNicora\Minimalism\Interfaces\ObjectInterface;
use CarloNicora\Minimalism\Objects\ModelParameters;

class EncryptedParametersFactory implements ObjectFactoryInterface
{
    /**
     * @param EncrypterInterface $encrypter
     */
    public function __construct(
        private EncrypterInterface $encrypter,
    )
    {
    }

    /**
     * @param string $className
     * @param string $parameterName
     * @param ModelParameters $parameters
     * @return ObjectInterface|null
     */
    public function create(
        string $className,
        string $parameterName,
        ModelParameters $parameters,
    ): ?ObjectInterface
    {
        if ($className === PositionedEncryptedParameter::class){
            $parameter = $parameters->getNextPositionedParameter();
        } else {
            $parameter = $parameters->getNamedParameter($parameterName);
        }

        if ($parameter === null) {
            return null;
        }

        /** @var PositionedEncryptedParameter|EncryptedParameter $response */
        $response = new $className($parameter);
        $response->setEncrypter($this->encrypter);

        return $response;
    }
}