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

class ClusterVolumeInfoNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\ClusterVolumeInfo';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\ClusterVolumeInfo';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\ClusterVolumeInfo();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('CapacityBytes', $data)) {
            $object->setCapacityBytes($data['CapacityBytes']);
            unset($data['CapacityBytes']);
        }
        if (\array_key_exists('VolumeContext', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['VolumeContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setVolumeContext($values);
            unset($data['VolumeContext']);
        }
        if (\array_key_exists('VolumeID', $data)) {
            $object->setVolumeID($data['VolumeID']);
            unset($data['VolumeID']);
        }
        if (\array_key_exists('AccessibleTopology', $data)) {
            $values_1 = [];
            foreach ($data['AccessibleTopology'] as $value_1) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $object->setAccessibleTopology($values_1);
            unset($data['AccessibleTopology']);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_3;
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
        if ($object->isInitialized('capacityBytes') && $object->getCapacityBytes() !== null) {
            $data['CapacityBytes'] = $object->getCapacityBytes();
        }
        if ($object->isInitialized('volumeContext') && $object->getVolumeContext() !== null) {
            $values = [];
            foreach ($object->getVolumeContext() as $key => $value) {
                $values[$key] = $value;
            }
            $data['VolumeContext'] = $values;
        }
        if ($object->isInitialized('volumeID') && $object->getVolumeID() !== null) {
            $data['VolumeID'] = $object->getVolumeID();
        }
        if ($object->isInitialized('accessibleTopology') && $object->getAccessibleTopology() !== null) {
            $values_1 = [];
            foreach ($object->getAccessibleTopology() as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $data['AccessibleTopology'] = $values_1;
        }
        foreach ($object as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_43\\Model\\ClusterVolumeInfo' => false];
    }
}
