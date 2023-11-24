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
class ClusterVolumePublishStatusItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumePublishStatusItem';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumePublishStatusItem';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ClusterVolumePublishStatusItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeID', $data)) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        }
        if (\array_key_exists('State', $data)) {
            $object->setState($data['State']);
            unset($data['State']);
        }
        if (\array_key_exists('PublishContext', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['PublishContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setPublishContext($values);
            unset($data['PublishContext']);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('nodeID') && null !== $object->getNodeID()) {
            $data['NodeID'] = $object->getNodeID();
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('publishContext') && null !== $object->getPublishContext()) {
            $values = array();
            foreach ($object->getPublishContext() as $key => $value) {
                $values[$key] = $value;
            }
            $data['PublishContext'] = $values;
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumePublishStatusItem' => false);
    }
}