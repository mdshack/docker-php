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

class OCIPlatformNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\OCIPlatform';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\OCIPlatform';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\OCIPlatform();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('architecture', $data)) {
            $object->setArchitecture($data['architecture']);
            unset($data['architecture']);
        }
        if (\array_key_exists('os', $data)) {
            $object->setOs($data['os']);
            unset($data['os']);
        }
        if (\array_key_exists('os.version', $data)) {
            $object->setOsVersion($data['os.version']);
            unset($data['os.version']);
        }
        if (\array_key_exists('os.features', $data)) {
            $values = [];
            foreach ($data['os.features'] as $value) {
                $values[] = $value;
            }
            $object->setOsFeatures($values);
            unset($data['os.features']);
        }
        if (\array_key_exists('variant', $data)) {
            $object->setVariant($data['variant']);
            unset($data['variant']);
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
        if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
            $data['architecture'] = $object->getArchitecture();
        }
        if ($object->isInitialized('os') && $object->getOs() !== null) {
            $data['os'] = $object->getOs();
        }
        if ($object->isInitialized('osVersion') && $object->getOsVersion() !== null) {
            $data['os.version'] = $object->getOsVersion();
        }
        if ($object->isInitialized('osFeatures') && $object->getOsFeatures() !== null) {
            $values = [];
            foreach ($object->getOsFeatures() as $value) {
                $values[] = $value;
            }
            $data['os.features'] = $values;
        }
        if ($object->isInitialized('variant') && $object->getVariant() !== null) {
            $data['variant'] = $object->getVariant();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\OCIPlatform' => false];
    }
}
