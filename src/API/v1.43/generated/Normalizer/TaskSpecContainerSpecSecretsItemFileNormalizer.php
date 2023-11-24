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
class TaskSpecContainerSpecSecretsItemFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskSpecContainerSpecSecretsItemFile';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskSpecContainerSpecSecretsItemFile';
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
        $object = new \Mdshack\Docker\API$NAMESPACE\Model\TaskSpecContainerSpecSecretsItemFile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('UID', $data)) {
            $object->setUID($data['UID']);
            unset($data['UID']);
        }
        if (\array_key_exists('GID', $data)) {
            $object->setGID($data['GID']);
            unset($data['GID']);
        }
        if (\array_key_exists('Mode', $data)) {
            $object->setMode($data['Mode']);
            unset($data['Mode']);
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
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('uID') && null !== $object->getUID()) {
            $data['UID'] = $object->getUID();
        }
        if ($object->isInitialized('gID') && null !== $object->getGID()) {
            $data['GID'] = $object->getGID();
        }
        if ($object->isInitialized('mode') && null !== $object->getMode()) {
            $data['Mode'] = $object->getMode();
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
        return array('Mdshack\\Docker\\API$NAMESPACE\\Model\\TaskSpecContainerSpecSecretsItemFile' => false);
    }
}