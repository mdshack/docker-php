<?php

namespace Mdshack\Docker\API$NAMESPACE\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API$NAMESPACE\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API$NAMESPACE\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskStatus';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskStatus';
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
        $object = new \Mdshack\Docker\API$NAMESPACE\Model\TaskStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Timestamp', $data)) {
            $object->setTimestamp($data['Timestamp']);
            unset($data['Timestamp']);
        }
        if (\array_key_exists('State', $data)) {
            $object->setState($data['State']);
            unset($data['State']);
        }
        if (\array_key_exists('Message', $data)) {
            $object->setMessage($data['Message']);
            unset($data['Message']);
        }
        if (\array_key_exists('Err', $data)) {
            $object->setErr($data['Err']);
            unset($data['Err']);
        }
        if (\array_key_exists('ContainerStatus', $data)) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskStatusContainerStatus', 'json', $context));
            unset($data['ContainerStatus']);
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
        if ($object->isInitialized('timestamp') && null !== $object->getTimestamp()) {
            $data['Timestamp'] = $object->getTimestamp();
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('message') && null !== $object->getMessage()) {
            $data['Message'] = $object->getMessage();
        }
        if ($object->isInitialized('err') && null !== $object->getErr()) {
            $data['Err'] = $object->getErr();
        }
        if ($object->isInitialized('containerStatus') && null !== $object->getContainerStatus()) {
            $data['ContainerStatus'] = $this->normalizer->normalize($object->getContainerStatus(), 'json', $context);
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
        return array('Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskStatus' => false);
    }
}