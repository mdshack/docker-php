<?php

namespace Mdshack\Docker\API\v1_42\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ServiceSpecModeNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecMode';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecMode';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ServiceSpecMode();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Replicated', $data)) {
            $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecModeReplicated', 'json', $context));
            unset($data['Replicated']);
        }
        if (\array_key_exists('Global', $data)) {
            $object->setGlobal($this->denormalizer->denormalize($data['Global'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecModeGlobal', 'json', $context));
            unset($data['Global']);
        }
        if (\array_key_exists('ReplicatedJob', $data)) {
            $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
            unset($data['ReplicatedJob']);
        }
        if (\array_key_exists('GlobalJob', $data)) {
            $object->setGlobalJob($this->denormalizer->denormalize($data['GlobalJob'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecModeGlobalJob', 'json', $context));
            unset($data['GlobalJob']);
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
        if ($object->isInitialized('replicated') && $object->getReplicated() !== null) {
            $data['Replicated'] = $this->normalizer->normalize($object->getReplicated(), 'json', $context);
        }
        if ($object->isInitialized('global') && $object->getGlobal() !== null) {
            $data['Global'] = $this->normalizer->normalize($object->getGlobal(), 'json', $context);
        }
        if ($object->isInitialized('replicatedJob') && $object->getReplicatedJob() !== null) {
            $data['ReplicatedJob'] = $this->normalizer->normalize($object->getReplicatedJob(), 'json', $context);
        }
        if ($object->isInitialized('globalJob') && $object->getGlobalJob() !== null) {
            $data['GlobalJob'] = $this->normalizer->normalize($object->getGlobalJob(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ServiceSpecMode' => false];
    }
}
