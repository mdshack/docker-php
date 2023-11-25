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

class NetworkSettingsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkSettings';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkSettings';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\NetworkSettings();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Bridge', $data)) {
            $object->setBridge($data['Bridge']);
            unset($data['Bridge']);
        }
        if (\array_key_exists('SandboxID', $data)) {
            $object->setSandboxID($data['SandboxID']);
            unset($data['SandboxID']);
        }
        if (\array_key_exists('HairpinMode', $data)) {
            $object->setHairpinMode($data['HairpinMode']);
            unset($data['HairpinMode']);
        }
        if (\array_key_exists('LinkLocalIPv6Address', $data)) {
            $object->setLinkLocalIPv6Address($data['LinkLocalIPv6Address']);
            unset($data['LinkLocalIPv6Address']);
        }
        if (\array_key_exists('LinkLocalIPv6PrefixLen', $data)) {
            $object->setLinkLocalIPv6PrefixLen($data['LinkLocalIPv6PrefixLen']);
            unset($data['LinkLocalIPv6PrefixLen']);
        }
        if (\array_key_exists('Ports', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Ports'] as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API\\v1_40\\Model\\PortBinding', 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $object->setPorts($values);
            unset($data['Ports']);
        }
        if (\array_key_exists('SandboxKey', $data)) {
            $object->setSandboxKey($data['SandboxKey']);
            unset($data['SandboxKey']);
        }
        if (\array_key_exists('SecondaryIPAddresses', $data) && $data['SecondaryIPAddresses'] !== null) {
            $values_2 = [];
            foreach ($data['SecondaryIPAddresses'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API\\v1_40\\Model\\Address', 'json', $context);
            }
            $object->setSecondaryIPAddresses($values_2);
            unset($data['SecondaryIPAddresses']);
        } elseif (\array_key_exists('SecondaryIPAddresses', $data) && $data['SecondaryIPAddresses'] === null) {
            $object->setSecondaryIPAddresses(null);
        }
        if (\array_key_exists('SecondaryIPv6Addresses', $data) && $data['SecondaryIPv6Addresses'] !== null) {
            $values_3 = [];
            foreach ($data['SecondaryIPv6Addresses'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_40\\Model\\Address', 'json', $context);
            }
            $object->setSecondaryIPv6Addresses($values_3);
            unset($data['SecondaryIPv6Addresses']);
        } elseif (\array_key_exists('SecondaryIPv6Addresses', $data) && $data['SecondaryIPv6Addresses'] === null) {
            $object->setSecondaryIPv6Addresses(null);
        }
        if (\array_key_exists('EndpointID', $data)) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        }
        if (\array_key_exists('Gateway', $data)) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        }
        if (\array_key_exists('GlobalIPv6Address', $data)) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            unset($data['GlobalIPv6Address']);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data)) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            unset($data['GlobalIPv6PrefixLen']);
        }
        if (\array_key_exists('IPAddress', $data)) {
            $object->setIPAddress($data['IPAddress']);
            unset($data['IPAddress']);
        }
        if (\array_key_exists('IPPrefixLen', $data)) {
            $object->setIPPrefixLen($data['IPPrefixLen']);
            unset($data['IPPrefixLen']);
        }
        if (\array_key_exists('IPv6Gateway', $data)) {
            $object->setIPv6Gateway($data['IPv6Gateway']);
            unset($data['IPv6Gateway']);
        }
        if (\array_key_exists('MacAddress', $data)) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        }
        if (\array_key_exists('Networks', $data)) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Networks'] as $key_1 => $value_4) {
                $values_4[$key_1] = $this->denormalizer->denormalize($value_4, 'Mdshack\\Docker\\API\\v1_40\\Model\\EndpointSettings', 'json', $context);
            }
            $object->setNetworks($values_4);
            unset($data['Networks']);
        }
        foreach ($data as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_5;
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
        if ($object->isInitialized('bridge') && $object->getBridge() !== null) {
            $data['Bridge'] = $object->getBridge();
        }
        if ($object->isInitialized('sandboxID') && $object->getSandboxID() !== null) {
            $data['SandboxID'] = $object->getSandboxID();
        }
        if ($object->isInitialized('hairpinMode') && $object->getHairpinMode() !== null) {
            $data['HairpinMode'] = $object->getHairpinMode();
        }
        if ($object->isInitialized('linkLocalIPv6Address') && $object->getLinkLocalIPv6Address() !== null) {
            $data['LinkLocalIPv6Address'] = $object->getLinkLocalIPv6Address();
        }
        if ($object->isInitialized('linkLocalIPv6PrefixLen') && $object->getLinkLocalIPv6PrefixLen() !== null) {
            $data['LinkLocalIPv6PrefixLen'] = $object->getLinkLocalIPv6PrefixLen();
        }
        if ($object->isInitialized('ports') && $object->getPorts() !== null) {
            $values = [];
            foreach ($object->getPorts() as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $data['Ports'] = $values;
        }
        if ($object->isInitialized('sandboxKey') && $object->getSandboxKey() !== null) {
            $data['SandboxKey'] = $object->getSandboxKey();
        }
        if ($object->isInitialized('secondaryIPAddresses') && $object->getSecondaryIPAddresses() !== null) {
            $values_2 = [];
            foreach ($object->getSecondaryIPAddresses() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['SecondaryIPAddresses'] = $values_2;
        }
        if ($object->isInitialized('secondaryIPv6Addresses') && $object->getSecondaryIPv6Addresses() !== null) {
            $values_3 = [];
            foreach ($object->getSecondaryIPv6Addresses() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['SecondaryIPv6Addresses'] = $values_3;
        }
        if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
            $data['EndpointID'] = $object->getEndpointID();
        }
        if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
            $data['Gateway'] = $object->getGateway();
        }
        if ($object->isInitialized('globalIPv6Address') && $object->getGlobalIPv6Address() !== null) {
            $data['GlobalIPv6Address'] = $object->getGlobalIPv6Address();
        }
        if ($object->isInitialized('globalIPv6PrefixLen') && $object->getGlobalIPv6PrefixLen() !== null) {
            $data['GlobalIPv6PrefixLen'] = $object->getGlobalIPv6PrefixLen();
        }
        if ($object->isInitialized('iPAddress') && $object->getIPAddress() !== null) {
            $data['IPAddress'] = $object->getIPAddress();
        }
        if ($object->isInitialized('iPPrefixLen') && $object->getIPPrefixLen() !== null) {
            $data['IPPrefixLen'] = $object->getIPPrefixLen();
        }
        if ($object->isInitialized('iPv6Gateway') && $object->getIPv6Gateway() !== null) {
            $data['IPv6Gateway'] = $object->getIPv6Gateway();
        }
        if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
            $data['MacAddress'] = $object->getMacAddress();
        }
        if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
            $values_4 = [];
            foreach ($object->getNetworks() as $key_1 => $value_4) {
                $values_4[$key_1] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['Networks'] = $values_4;
        }
        foreach ($object as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_5;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\NetworkSettings' => false];
    }
}
