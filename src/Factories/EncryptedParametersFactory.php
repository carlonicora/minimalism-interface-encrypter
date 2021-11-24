<?php
namespace CarloNicora\Minimalism\Interfaces\Encrypter\Factories;

use CarloNicora\Minimalism\Interfaces\Encrypter\Parameters\PositionedEncryptedParameter;
use CarloNicora\Minimalism\Interfaces\ObjectFactoryInterface;
use CarloNicora\Minimalism\Interfaces\ObjectInterface;
use CarloNicora\Minimalism\Objects\ModelParameters;

class EncryptedParametersFactory implements ObjectFactoryInterface
{
    public function __construct(
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

        return new $className($parameter);
    }
}