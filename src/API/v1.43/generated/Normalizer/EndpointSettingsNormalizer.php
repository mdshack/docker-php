<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EndpointSettingsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\EndpointSettings';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\EndpointSettings';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\EndpointSettings();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] !== null) {
            $object->setIPAMConfig($this->denormalizer->denormalize($data['IPAMConfig'], 'Mdshack\\Docker\\API\\v1_43\\Model\\EndpointIPAMConfig', 'json', $context));
            unset($data['IPAMConfig']);
        } elseif (\array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] === null) {
            $object->setIPAMConfig(null);
        }
        if (\array_key_exists('Links', $data)) {
            $values = [];
            foreach ($data['Links'] as $value) {
                $values[] = $value;
            }
            $object->setLinks($values);
            unset($data['Links']);
        }
        if (\array_key_exists('Aliases', $data)) {
            $values_1 = [];
            foreach ($data['Aliases'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAliases($values_1);
            unset($data['Aliases']);
        }
        if (\array_key_exists('NetworkID', $data)) {
            $object->setNetworkID($data['NetworkID']);
            unset($data['NetworkID']);
        }
        if (\array_key_exists('EndpointID', $data)) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        }
        if (\array_key_exists('Gateway', $data)) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
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
        if (\array_key_exists('GlobalIPv6Address', $data)) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            unset($data['GlobalIPv6Address']);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data)) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            unset($data['GlobalIPv6PrefixLen']);
        }
        if (\array_key_exists('MacAddress', $data)) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        }
        if (\array_key_exists('DriverOpts', $data) && $data['DriverOpts'] !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['DriverOpts'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setDriverOpts($values_2);
            unset($data['DriverOpts']);
        } elseif (\array_key_exists('DriverOpts', $data) && $data['DriverOpts'] === null) {
            $object->setDriverOpts(null);
        }
        foreach ($data as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_3;
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
        if ($object->isInitialized('iPAMConfig') && $object->getIPAMConfig() !== null) {
            $data['IPAMConfig'] = $this->normalizer->normalize($object->getIPAMConfig(), 'json', $context);
        }
        if ($object->isInitialized('links') && $object->getLinks() !== null) {
            $values = [];
            foreach ($object->getLinks() as $value) {
                $values[] = $value;
            }
            $data['Links'] = $values;
        }
        if ($object->isInitialized('aliases') && $object->getAliases() !== null) {
            $values_1 = [];
            foreach ($object->getAliases() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Aliases'] = $values_1;
        }
        if ($object->isInitialized('networkID') && $object->getNetworkID() !== null) {
            $data['NetworkID'] = $object->getNetworkID();
        }
        if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
            $data['EndpointID'] = $object->getEndpointID();
        }
        if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
            $data['Gateway'] = $object->getGateway();
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
        if ($object->isInitialized('globalIPv6Address') && $object->getGlobalIPv6Address() !== null) {
            $data['GlobalIPv6Address'] = $object->getGlobalIPv6Address();
        }
        if ($object->isInitialized('globalIPv6PrefixLen') && $object->getGlobalIPv6PrefixLen() !== null) {
            $data['GlobalIPv6PrefixLen'] = $object->getGlobalIPv6PrefixLen();
        }
        if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
            $data['MacAddress'] = $object->getMacAddress();
        }
        if ($object->isInitialized('driverOpts') && $object->getDriverOpts() !== null) {
            $values_2 = [];
            foreach ($object->getDriverOpts() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['DriverOpts'] = $values_2;
        }
        foreach ($object as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_43\\Model\\EndpointSettings' => false];
    }
}
