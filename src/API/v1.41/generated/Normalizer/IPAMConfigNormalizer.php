<?php

namespace Mdshack\Docker\API\v1_41\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IPAMConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\IPAMConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\IPAMConfig';
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Mdshack\Docker\API\v1_41\Model\IPAMConfig();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Subnet', $data)) {
            $object->setSubnet($data['Subnet']);
            unset($data['Subnet']);
        }
        if (\array_key_exists('IPRange', $data)) {
            $object->setIPRange($data['IPRange']);
            unset($data['IPRange']);
        }
        if (\array_key_exists('Gateway', $data)) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        }
        if (\array_key_exists('AuxiliaryAddresses', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['AuxiliaryAddresses'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setAuxiliaryAddresses($values);
            unset($data['AuxiliaryAddresses']);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('subnet') && $object->getSubnet() !== null) {
            $data['Subnet'] = $object->getSubnet();
        }
        if ($object->isInitialized('iPRange') && $object->getIPRange() !== null) {
            $data['IPRange'] = $object->getIPRange();
        }
        if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
            $data['Gateway'] = $object->getGateway();
        }
        if ($object->isInitialized('auxiliaryAddresses') && $object->getAuxiliaryAddresses() !== null) {
            $values = [];
            foreach ($object->getAuxiliaryAddresses() as $key => $value) {
                $values[$key] = $value;
            }
            $data['AuxiliaryAddresses'] = $values;
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\IPAMConfig' => false];
    }
}
