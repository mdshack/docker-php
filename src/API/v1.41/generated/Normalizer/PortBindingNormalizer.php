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

class PortBindingNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\PortBinding';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\PortBinding';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\PortBinding();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('HostIp', $data)) {
            $object->setHostIp($data['HostIp']);
            unset($data['HostIp']);
        }
        if (\array_key_exists('HostPort', $data)) {
            $object->setHostPort($data['HostPort']);
            unset($data['HostPort']);
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
        if ($object->isInitialized('hostIp') && $object->getHostIp() !== null) {
            $data['HostIp'] = $object->getHostIp();
        }
        if ($object->isInitialized('hostPort') && $object->getHostPort() !== null) {
            $data['HostPort'] = $object->getHostPort();
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
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\PortBinding' => false];
    }
}
