<?php

namespace Mdshack\Docker\API\v1_41\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BuildInfoNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\BuildInfo';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\BuildInfo';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\BuildInfo();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('id', $data)) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        if (\array_key_exists('stream', $data)) {
            $object->setStream($data['stream']);
            unset($data['stream']);
        }
        if (\array_key_exists('error', $data)) {
            $object->setError($data['error']);
            unset($data['error']);
        }
        if (\array_key_exists('errorDetail', $data)) {
            $object->setErrorDetail($this->denormalizer->denormalize($data['errorDetail'], 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorDetail', 'json', $context));
            unset($data['errorDetail']);
        }
        if (\array_key_exists('status', $data)) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        if (\array_key_exists('progress', $data)) {
            $object->setProgress($data['progress']);
            unset($data['progress']);
        }
        if (\array_key_exists('progressDetail', $data)) {
            $object->setProgressDetail($this->denormalizer->denormalize($data['progressDetail'], 'Mdshack\\Docker\\API\\v1_41\\Model\\ProgressDetail', 'json', $context));
            unset($data['progressDetail']);
        }
        if (\array_key_exists('aux', $data)) {
            $object->setAux($this->denormalizer->denormalize($data['aux'], 'Mdshack\\Docker\\API\\v1_41\\Model\\ImageID', 'json', $context));
            unset($data['aux']);
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('stream') && $object->getStream() !== null) {
            $data['stream'] = $object->getStream();
        }
        if ($object->isInitialized('error') && $object->getError() !== null) {
            $data['error'] = $object->getError();
        }
        if ($object->isInitialized('errorDetail') && $object->getErrorDetail() !== null) {
            $data['errorDetail'] = $this->normalizer->normalize($object->getErrorDetail(), 'json', $context);
        }
        if ($object->isInitialized('status') && $object->getStatus() !== null) {
            $data['status'] = $object->getStatus();
        }
        if ($object->isInitialized('progress') && $object->getProgress() !== null) {
            $data['progress'] = $object->getProgress();
        }
        if ($object->isInitialized('progressDetail') && $object->getProgressDetail() !== null) {
            $data['progressDetail'] = $this->normalizer->normalize($object->getProgressDetail(), 'json', $context);
        }
        if ($object->isInitialized('aux') && $object->getAux() !== null) {
            $data['aux'] = $this->normalizer->normalize($object->getAux(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\BuildInfo' => false];
    }
}
