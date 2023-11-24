<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HealthConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\HealthConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\HealthConfig';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\HealthConfig();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Test', $data)) {
            $values = [];
            foreach ($data['Test'] as $value) {
                $values[] = $value;
            }
            $object->setTest($values);
            unset($data['Test']);
        }
        if (\array_key_exists('Interval', $data)) {
            $object->setInterval($data['Interval']);
            unset($data['Interval']);
        }
        if (\array_key_exists('Timeout', $data)) {
            $object->setTimeout($data['Timeout']);
            unset($data['Timeout']);
        }
        if (\array_key_exists('Retries', $data)) {
            $object->setRetries($data['Retries']);
            unset($data['Retries']);
        }
        if (\array_key_exists('StartPeriod', $data)) {
            $object->setStartPeriod($data['StartPeriod']);
            unset($data['StartPeriod']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('test') && $object->getTest() !== null) {
            $values = [];
            foreach ($object->getTest() as $value) {
                $values[] = $value;
            }
            $data['Test'] = $values;
        }
        if ($object->isInitialized('interval') && $object->getInterval() !== null) {
            $data['Interval'] = $object->getInterval();
        }
        if ($object->isInitialized('timeout') && $object->getTimeout() !== null) {
            $data['Timeout'] = $object->getTimeout();
        }
        if ($object->isInitialized('retries') && $object->getRetries() !== null) {
            $data['Retries'] = $object->getRetries();
        }
        if ($object->isInitialized('startPeriod') && $object->getStartPeriod() !== null) {
            $data['StartPeriod'] = $object->getStartPeriod();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_43\\Model\\HealthConfig' => false];
    }
}
