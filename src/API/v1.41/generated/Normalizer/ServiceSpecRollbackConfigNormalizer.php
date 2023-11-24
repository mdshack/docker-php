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

class ServiceSpecRollbackConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\ServiceSpecRollbackConfig';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\ServiceSpecRollbackConfig';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\ServiceSpecRollbackConfig();
        if (\array_key_exists('MaxFailureRatio', $data) && \is_int($data['MaxFailureRatio'])) {
            $data['MaxFailureRatio'] = (float) $data['MaxFailureRatio'];
        }
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Parallelism', $data)) {
            $object->setParallelism($data['Parallelism']);
            unset($data['Parallelism']);
        }
        if (\array_key_exists('Delay', $data)) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        }
        if (\array_key_exists('FailureAction', $data)) {
            $object->setFailureAction($data['FailureAction']);
            unset($data['FailureAction']);
        }
        if (\array_key_exists('Monitor', $data)) {
            $object->setMonitor($data['Monitor']);
            unset($data['Monitor']);
        }
        if (\array_key_exists('MaxFailureRatio', $data)) {
            $object->setMaxFailureRatio($data['MaxFailureRatio']);
            unset($data['MaxFailureRatio']);
        }
        if (\array_key_exists('Order', $data)) {
            $object->setOrder($data['Order']);
            unset($data['Order']);
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
        if ($object->isInitialized('parallelism') && $object->getParallelism() !== null) {
            $data['Parallelism'] = $object->getParallelism();
        }
        if ($object->isInitialized('delay') && $object->getDelay() !== null) {
            $data['Delay'] = $object->getDelay();
        }
        if ($object->isInitialized('failureAction') && $object->getFailureAction() !== null) {
            $data['FailureAction'] = $object->getFailureAction();
        }
        if ($object->isInitialized('monitor') && $object->getMonitor() !== null) {
            $data['Monitor'] = $object->getMonitor();
        }
        if ($object->isInitialized('maxFailureRatio') && $object->getMaxFailureRatio() !== null) {
            $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
        }
        if ($object->isInitialized('order') && $object->getOrder() !== null) {
            $data['Order'] = $object->getOrder();
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
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\ServiceSpecRollbackConfig' => false];
    }
}
