<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\Volume';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\Volume';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Mdshack\Docker\API\v1_43\Model\Volume();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        if (\array_key_exists('Mountpoint', $data)) {
            $object->setMountpoint($data['Mountpoint']);
            unset($data['Mountpoint']);
        }
        if (\array_key_exists('CreatedAt', $data)) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        }
        if (\array_key_exists('Status', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Status'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_43\\Model\\VolumeStatusItem', 'json', $context);
            }
            $object->setStatus($values);
            unset($data['Status']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setLabels($values_1);
            unset($data['Labels']);
        }
        if (\array_key_exists('Scope', $data)) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        }
        if (\array_key_exists('ClusterVolume', $data)) {
            $object->setClusterVolume($this->denormalizer->denormalize($data['ClusterVolume'], 'Mdshack\\Docker\\API\\v1_43\\Model\\ClusterVolume', 'json', $context));
            unset($data['ClusterVolume']);
        }
        if (\array_key_exists('Options', $data)) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setOptions($values_2);
            unset($data['Options']);
        }
        if (\array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
            $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], 'Mdshack\\Docker\\API\\v1_43\\Model\\VolumeUsageData', 'json', $context));
            unset($data['UsageData']);
        }
        elseif (\array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
            $object->setUsageData(null);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['Name'] = $object->getName();
        $data['Driver'] = $object->getDriver();
        $data['Mountpoint'] = $object->getMountpoint();
        if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $values = array();
            foreach ($object->getStatus() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Status'] = $values;
        }
        $values_1 = array();
        foreach ($object->getLabels() as $key_1 => $value_1) {
            $values_1[$key_1] = $value_1;
        }
        $data['Labels'] = $values_1;
        $data['Scope'] = $object->getScope();
        if ($object->isInitialized('clusterVolume') && null !== $object->getClusterVolume()) {
            $data['ClusterVolume'] = $this->normalizer->normalize($object->getClusterVolume(), 'json', $context);
        }
        $values_2 = array();
        foreach ($object->getOptions() as $key_2 => $value_2) {
            $values_2[$key_2] = $value_2;
        }
        $data['Options'] = $values_2;
        if ($object->isInitialized('usageData') && null !== $object->getUsageData()) {
            $data['UsageData'] = $this->normalizer->normalize($object->getUsageData(), 'json', $context);
        }
        foreach ($object as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $data[$key_3] = $value_3;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_43\\Model\\Volume' => false);
    }
}