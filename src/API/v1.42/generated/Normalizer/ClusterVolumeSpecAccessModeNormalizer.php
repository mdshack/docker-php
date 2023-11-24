<?php

namespace Mdshack\Docker\API\v1_42\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_42\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ClusterVolumeSpecAccessModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Mdshack\Docker\API\v1_42\Model\ClusterVolumeSpecAccessMode();
        if (null === $data || false === \is_array($data)) {
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
            $values = array();
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('scope') && null !== $object->getScope()) {
            $data['Scope'] = $object->getScope();
        }
        if ($object->isInitialized('sharing') && null !== $object->getSharing()) {
            $data['Sharing'] = $object->getSharing();
        }
        if ($object->isInitialized('mountVolume') && null !== $object->getMountVolume()) {
            $data['MountVolume'] = $this->normalizer->normalize($object->getMountVolume(), 'json', $context);
        }
        if ($object->isInitialized('secrets') && null !== $object->getSecrets()) {
            $values = array();
            foreach ($object->getSecrets() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Secrets'] = $values;
        }
        if ($object->isInitialized('accessibilityRequirements') && null !== $object->getAccessibilityRequirements()) {
            $data['AccessibilityRequirements'] = $this->normalizer->normalize($object->getAccessibilityRequirements(), 'json', $context);
        }
        if ($object->isInitialized('capacityRange') && null !== $object->getCapacityRange()) {
            $data['CapacityRange'] = $this->normalizer->normalize($object->getCapacityRange(), 'json', $context);
        }
        if ($object->isInitialized('availability') && null !== $object->getAvailability()) {
            $data['Availability'] = $object->getAvailability();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_42\\Model\\ClusterVolumeSpecAccessMode' => false);
    }
}