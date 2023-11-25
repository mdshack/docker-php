<?php

namespace Mdshack\Docker\API\v1_40\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NetworkContainerNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkContainer';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkContainer';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\NetworkContainer();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('EndpointID', $data)) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        }
        if (\array_key_exists('MacAddress', $data)) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        }
        if (\array_key_exists('IPv4Address', $data)) {
            $object->setIPv4Address($data['IPv4Address']);
            unset($data['IPv4Address']);
        }
        if (\array_key_exists('IPv6Address', $data)) {
            $object->setIPv6Address($data['IPv6Address']);
            unset($data['IPv6Address']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
            $data['EndpointID'] = $object->getEndpointID();
        }
        if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
            $data['MacAddress'] = $object->getMacAddress();
        }
        if ($object->isInitialized('iPv4Address') && $object->getIPv4Address() !== null) {
            $data['IPv4Address'] = $object->getIPv4Address();
        }
        if ($object->isInitialized('iPv6Address') && $object->getIPv6Address() !== null) {
            $data['IPv6Address'] = $object->getIPv6Address();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\NetworkContainer' => false];
    }
}
