<?php

namespace Mdshack\Docker\API\_____\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\_____\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\_____\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskSpecContainerSpecConfigsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\_____\\Model\\TaskSpecContainerSpecConfigsItem';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\_____\\Model\\TaskSpecContainerSpecConfigsItem';
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
        $object = new \Mdshack\Docker\API\_____\Model\TaskSpecContainerSpecConfigsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('File', $data)) {
            $object->setFile($this->denormalizer->denormalize($data['File'], 'Mdshack\\Docker\\API\\_____\\Model\\TaskSpecContainerSpecConfigsItemFile', 'json', $context));
            unset($data['File']);
        }
        if (\array_key_exists('Runtime', $data)) {
            $object->setRuntime($this->denormalizer->denormalize($data['Runtime'], 'Mdshack\\Docker\\API\\_____\\Model\\TaskSpecContainerSpecConfigsItemRuntime', 'json', $context));
            unset($data['Runtime']);
        }
        if (\array_key_exists('ConfigID', $data)) {
            $object->setConfigID($data['ConfigID']);
            unset($data['ConfigID']);
        }
        if (\array_key_exists('ConfigName', $data)) {
            $object->setConfigName($data['ConfigName']);
            unset($data['ConfigName']);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('file') && null !== $object->getFile()) {
            $data['File'] = $this->normalizer->normalize($object->getFile(), 'json', $context);
        }
        if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
            $data['Runtime'] = $this->normalizer->normalize($object->getRuntime(), 'json', $context);
        }
        if ($object->isInitialized('configID') && null !== $object->getConfigID()) {
            $data['ConfigID'] = $object->getConfigID();
        }
        if ($object->isInitialized('configName') && null !== $object->getConfigName()) {
            $data['ConfigName'] = $object->getConfigName();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\_____\\Model\\TaskSpecContainerSpecConfigsItem' => false);
    }
}