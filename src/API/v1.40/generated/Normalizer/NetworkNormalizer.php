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

class NetworkNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\Network';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\Network';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\Network();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        if (\array_key_exists('Scope', $data)) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        if (\array_key_exists('EnableIPv6', $data)) {
            $object->setEnableIPv6($data['EnableIPv6']);
            unset($data['EnableIPv6']);
        }
        if (\array_key_exists('IPAM', $data)) {
            $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], 'Mdshack\\Docker\\API\\v1_40\\Model\\IPAM', 'json', $context));
            unset($data['IPAM']);
        }
        if (\array_key_exists('Internal', $data)) {
            $object->setInternal($data['Internal']);
            unset($data['Internal']);
        }
        if (\array_key_exists('Attachable', $data)) {
            $object->setAttachable($data['Attachable']);
            unset($data['Attachable']);
        }
        if (\array_key_exists('Ingress', $data)) {
            $object->setIngress($data['Ingress']);
            unset($data['Ingress']);
        }
        if (\array_key_exists('Containers', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Containers'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_40\\Model\\NetworkContainer', 'json', $context);
            }
            $object->setContainers($values);
            unset($data['Containers']);
        }
        if (\array_key_exists('Options', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setOptions($values_1);
            unset($data['Options']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        }
        foreach ($data as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $object[$key_3] = $value_3;
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('created') && $object->getCreated() !== null) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('scope') && $object->getScope() !== null) {
            $data['Scope'] = $object->getScope();
        }
        if ($object->isInitialized('driver') && $object->getDriver() !== null) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('enableIPv6') && $object->getEnableIPv6() !== null) {
            $data['EnableIPv6'] = $object->getEnableIPv6();
        }
        if ($object->isInitialized('iPAM') && $object->getIPAM() !== null) {
            $data['IPAM'] = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
        }
        if ($object->isInitialized('internal') && $object->getInternal() !== null) {
            $data['Internal'] = $object->getInternal();
        }
        if ($object->isInitialized('attachable') && $object->getAttachable() !== null) {
            $data['Attachable'] = $object->getAttachable();
        }
        if ($object->isInitialized('ingress') && $object->getIngress() !== null) {
            $data['Ingress'] = $object->getIngress();
        }
        if ($object->isInitialized('containers') && $object->getContainers() !== null) {
            $values = [];
            foreach ($object->getContainers() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Containers'] = $values;
        }
        if ($object->isInitialized('options') && $object->getOptions() !== null) {
            $values_1 = [];
            foreach ($object->getOptions() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Options'] = $values_1;
        }
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values_2 = [];
            foreach ($object->getLabels() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Labels'] = $values_2;
        }
        foreach ($object as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $data[$key_3] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\Network' => false];
    }
}
