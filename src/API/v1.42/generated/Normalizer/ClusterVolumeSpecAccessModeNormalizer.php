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

class ClusterVolumeSpecAccessModeNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\ClusterVolumeSpecAccessMode();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Scope', $data)) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        }
        if (\array_key_exists('Sharing', $data)) {
            $object->setSharing($data['Sharing']);
            unset($data['Sharing']);
        }
        if (\array_key_exists('MountVolume', $data)) {
            $object->setMountVolume($this->denormalizer->denormalize($data['MountVolume'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessModeMountVolume', 'json', $context));
            unset($data['MountVolume']);
        }
        if (\array_key_exists('Secrets', $data)) {
            $values = [];
            foreach ($data['Secrets'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessModeSecretsItem', 'json', $context);
            }
            $object->setSecrets($values);
            unset($data['Secrets']);
        }
        if (\array_key_exists('AccessibilityRequirements', $data)) {
            $object->setAccessibilityRequirements($this->denormalizer->denormalize($data['AccessibilityRequirements'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessModeAccessibilityRequirements', 'json', $context));
            unset($data['AccessibilityRequirements']);
        }
        if (\array_key_exists('CapacityRange', $data)) {
            $object->setCapacityRange($this->denormalizer->denormalize($data['CapacityRange'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessModeCapacityRange', 'json', $context));
            unset($data['CapacityRange']);
        }
        if (\array_key_exists('Availability', $data)) {
            $object->setAvailability($data['Availability']);
            unset($data['Availability']);
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
        if ($object->isInitialized('scope') && $object->getScope() !== null) {
            $data['Scope'] = $object->getScope();
        }
        if ($object->isInitialized('sharing') && $object->getSharing() !== null) {
            $data['Sharing'] = $object->getSharing();
        }
        if ($object->isInitialized('mountVolume') && $object->getMountVolume() !== null) {
            $data['MountVolume'] = $this->normalizer->normalize($object->getMountVolume(), 'json', $context);
        }
        if ($object->isInitialized('secrets') && $object->getSecrets() !== null) {
            $values = [];
            foreach ($object->getSecrets() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Secrets'] = $values;
        }
        if ($object->isInitialized('accessibilityRequirements') && $object->getAccessibilityRequirements() !== null) {
            $data['AccessibilityRequirements'] = $this->normalizer->normalize($object->getAccessibilityRequirements(), 'json', $context);
        }
        if ($object->isInitialized('capacityRange') && $object->getCapacityRange() !== null) {
            $data['CapacityRange'] = $this->normalizer->normalize($object->getCapacityRange(), 'json', $context);
        }
        if ($object->isInitialized('availability') && $object->getAvailability() !== null) {
            $data['Availability'] = $object->getAvailability();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode' => false];
    }
}
