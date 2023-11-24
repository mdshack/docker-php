<?php

namespace Mdshack\Docker\API${NAMESPACE}\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API${NAMESPACE}\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API${NAMESPACE}\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ImageSummary';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ImageSummary';
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
        $object = new \Mdshack\Docker\API${NAMESPACE}\Model\ImageSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        if (\array_key_exists('ParentId', $data)) {
            $object->setParentId($data['ParentId']);
            unset($data['ParentId']);
        }
        if (\array_key_exists('RepoTags', $data)) {
            $values = array();
            foreach ($data['RepoTags'] as $value) {
                $values[] = $value;
            }
            $object->setRepoTags($values);
            unset($data['RepoTags']);
        }
        if (\array_key_exists('RepoDigests', $data)) {
            $values_1 = array();
            foreach ($data['RepoDigests'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoDigests($values_1);
            unset($data['RepoDigests']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        if (\array_key_exists('SharedSize', $data)) {
            $object->setSharedSize($data['SharedSize']);
            unset($data['SharedSize']);
        }
        if (\array_key_exists('VirtualSize', $data)) {
            $object->setVirtualSize($data['VirtualSize']);
            unset($data['VirtualSize']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        }
        if (\array_key_exists('Containers', $data)) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['Id'] = $object->getId();
        $data['ParentId'] = $object->getParentId();
        $values = array();
        foreach ($object->getRepoTags() as $value) {
            $values[] = $value;
        }
        $data['RepoTags'] = $values;
        $values_1 = array();
        foreach ($object->getRepoDigests() as $value_1) {
            $values_1[] = $value_1;
        }
        $data['RepoDigests'] = $values_1;
        $data['Created'] = $object->getCreated();
        $data['Size'] = $object->getSize();
        $data['SharedSize'] = $object->getSharedSize();
        if ($object->isInitialized('virtualSize') && null !== $object->getVirtualSize()) {
            $data['VirtualSize'] = $object->getVirtualSize();
        }
        $values_2 = array();
        foreach ($object->getLabels() as $key => $value_2) {
            $values_2[$key] = $value_2;
        }
        $data['Labels'] = $values_2;
        $data['Containers'] = $object->getContainers();
        foreach ($object as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_3;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API${NAMESPACE}\\Model\\ImageSummary' => false);
    }
}