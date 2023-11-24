<?php

namespace Mdshack\Docker\API\v1_42\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ContainerSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerSummary';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerSummary';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ContainerSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        if (\array_key_exists('Names', $data)) {
            $values = array();
            foreach ($data['Names'] as $value) {
                $values[] = $value;
            }
            $object->setNames($values);
            unset($data['Names']);
        }
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        if (\array_key_exists('ImageID', $data)) {
            $object->setImageID($data['ImageID']);
            unset($data['ImageID']);
        }
        if (\array_key_exists('Command', $data)) {
            $object->setCommand($data['Command']);
            unset($data['Command']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        if (\array_key_exists('Ports', $data)) {
            $values_1 = array();
            foreach ($data['Ports'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API\\v1_42\\Model\\Port', 'json', $context);
            }
            $object->setPorts($values_1);
            unset($data['Ports']);
        }
        if (\array_key_exists('SizeRw', $data)) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        }
        if (\array_key_exists('SizeRootFs', $data)) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        }
        if (\array_key_exists('State', $data)) {
            $object->setState($data['State']);
            unset($data['State']);
        }
        if (\array_key_exists('Status', $data)) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        }
        if (\array_key_exists('HostConfig', $data)) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerSummaryHostConfig', 'json', $context));
            unset($data['HostConfig']);
        }
        if (\array_key_exists('NetworkSettings', $data)) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ContainerSummaryNetworkSettings', 'json', $context));
            unset($data['NetworkSettings']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_3 = array();
            foreach ($data['Mounts'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_42\\Model\\MountPoint', 'json', $context);
            }
            $object->setMounts($values_3);
            unset($data['Mounts']);
        }
        foreach ($data as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_4;
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
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('names') && null !== $object->getNames()) {
            $values = array();
            foreach ($object->getNames() as $value) {
                $values[] = $value;
            }
            $data['Names'] = $values;
        }
        if ($object->isInitialized('image') && null !== $object->getImage()) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('imageID') && null !== $object->getImageID()) {
            $data['ImageID'] = $object->getImageID();
        }
        if ($object->isInitialized('command') && null !== $object->getCommand()) {
            $data['Command'] = $object->getCommand();
        }
        if ($object->isInitialized('created') && null !== $object->getCreated()) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('ports') && null !== $object->getPorts()) {
            $values_1 = array();
            foreach ($object->getPorts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Ports'] = $values_1;
        }
        if ($object->isInitialized('sizeRw') && null !== $object->getSizeRw()) {
            $data['SizeRw'] = $object->getSizeRw();
        }
        if ($object->isInitialized('sizeRootFs') && null !== $object->getSizeRootFs()) {
            $data['SizeRootFs'] = $object->getSizeRootFs();
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values_2 = array();
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('hostConfig') && null !== $object->getHostConfig()) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkSettings') && null !== $object->getNetworkSettings()) {
            $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
        }
        if ($object->isInitialized('mounts') && null !== $object->getMounts()) {
            $values_3 = array();
            foreach ($object->getMounts() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Mounts'] = $values_3;
        }
        foreach ($object as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_4;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_42\\Model\\ContainerSummary' => false);
    }
}