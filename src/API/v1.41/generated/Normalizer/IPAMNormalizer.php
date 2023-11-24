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

class IPAMNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\IPAM';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\IPAM';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\IPAM();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        if (\array_key_exists('Config', $data)) {
            $values = [];
            foreach ($data['Config'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_41\\Model\\IPAMConfig', 'json', $context);
            }
            $object->setConfig($values);
            unset($data['Config']);
        }
        if (\array_key_exists('Options', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setOptions($values_1);
            unset($data['Options']);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
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
        if ($object->isInitialized('driver') && $object->getDriver() !== null) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('config') && $object->getConfig() !== null) {
            $values = [];
            foreach ($object->getConfig() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Config'] = $values;
        }
        if ($object->isInitialized('options') && $object->getOptions() !== null) {
            $values_1 = [];
            foreach ($object->getOptions() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $data['Options'] = $values_1;
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_2;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\IPAM' => false];
    }
}
