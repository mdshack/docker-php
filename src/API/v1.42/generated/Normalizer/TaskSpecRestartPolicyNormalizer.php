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

class TaskSpecRestartPolicyNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecRestartPolicy';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecRestartPolicy';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\TaskSpecRestartPolicy();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Condition', $data)) {
            $object->setCondition($data['Condition']);
            unset($data['Condition']);
        }
        if (\array_key_exists('Delay', $data)) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        }
        if (\array_key_exists('MaxAttempts', $data)) {
            $object->setMaxAttempts($data['MaxAttempts']);
            unset($data['MaxAttempts']);
        }
        if (\array_key_exists('Window', $data)) {
            $object->setWindow($data['Window']);
            unset($data['Window']);
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
        if ($object->isInitialized('condition') && $object->getCondition() !== null) {
            $data['Condition'] = $object->getCondition();
        }
        if ($object->isInitialized('delay') && $object->getDelay() !== null) {
            $data['Delay'] = $object->getDelay();
        }
        if ($object->isInitialized('maxAttempts') && $object->getMaxAttempts() !== null) {
            $data['MaxAttempts'] = $object->getMaxAttempts();
        }
        if ($object->isInitialized('window') && $object->getWindow() !== null) {
            $data['Window'] = $object->getWindow();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecRestartPolicy' => false];
    }
}
