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

class ServiceServiceStatusNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceServiceStatus';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ServiceServiceStatus';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ServiceServiceStatus();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('RunningTasks', $data)) {
            $object->setRunningTasks($data['RunningTasks']);
            unset($data['RunningTasks']);
        }
        if (\array_key_exists('DesiredTasks', $data)) {
            $object->setDesiredTasks($data['DesiredTasks']);
            unset($data['DesiredTasks']);
        }
        if (\array_key_exists('CompletedTasks', $data)) {
            $object->setCompletedTasks($data['CompletedTasks']);
            unset($data['CompletedTasks']);
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
        if ($object->isInitialized('runningTasks') && $object->getRunningTasks() !== null) {
            $data['RunningTasks'] = $object->getRunningTasks();
        }
        if ($object->isInitialized('desiredTasks') && $object->getDesiredTasks() !== null) {
            $data['DesiredTasks'] = $object->getDesiredTasks();
        }
        if ($object->isInitialized('completedTasks') && $object->getCompletedTasks() !== null) {
            $data['CompletedTasks'] = $object->getCompletedTasks();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ServiceServiceStatus' => false];
    }
}
