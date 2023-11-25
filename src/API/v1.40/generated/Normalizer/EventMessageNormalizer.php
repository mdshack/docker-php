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

class EventMessageNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\EventMessage';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\EventMessage';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\EventMessage();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
            unset($data['Type']);
        }
        if (\array_key_exists('Action', $data)) {
            $object->setAction($data['Action']);
            unset($data['Action']);
        }
        if (\array_key_exists('Actor', $data)) {
            $object->setActor($this->denormalizer->denormalize($data['Actor'], 'Mdshack\\Docker\\API\\v1_40\\Model\\EventActor', 'json', $context));
            unset($data['Actor']);
        }
        if (\array_key_exists('scope', $data)) {
            $object->setScope($data['scope']);
            unset($data['scope']);
        }
        if (\array_key_exists('time', $data)) {
            $object->setTime($data['time']);
            unset($data['time']);
        }
        if (\array_key_exists('timeNano', $data)) {
            $object->setTimeNano($data['timeNano']);
            unset($data['timeNano']);
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('type') && $object->getType() !== null) {
            $data['Type'] = $object->getType();
        }
        if ($object->isInitialized('action') && $object->getAction() !== null) {
            $data['Action'] = $object->getAction();
        }
        if ($object->isInitialized('actor') && $object->getActor() !== null) {
            $data['Actor'] = $this->normalizer->normalize($object->getActor(), 'json', $context);
        }
        if ($object->isInitialized('scope') && $object->getScope() !== null) {
            $data['scope'] = $object->getScope();
        }
        if ($object->isInitialized('time') && $object->getTime() !== null) {
            $data['time'] = $object->getTime();
        }
        if ($object->isInitialized('timeNano') && $object->getTimeNano() !== null) {
            $data['timeNano'] = $object->getTimeNano();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\EventMessage' => false];
    }
}
