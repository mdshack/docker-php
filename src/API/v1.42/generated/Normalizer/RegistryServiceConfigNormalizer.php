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
class RegistryServiceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\RegistryServiceConfig';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\RegistryServiceConfig';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\RegistryServiceConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data)) {
            $values = array();
            foreach ($data['AllowNondistributableArtifactsCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setAllowNondistributableArtifactsCIDRs($values);
            unset($data['AllowNondistributableArtifactsCIDRs']);
        }
        if (\array_key_exists('AllowNondistributableArtifactsHostnames', $data)) {
            $values_1 = array();
            foreach ($data['AllowNondistributableArtifactsHostnames'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAllowNondistributableArtifactsHostnames($values_1);
            unset($data['AllowNondistributableArtifactsHostnames']);
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data)) {
            $values_2 = array();
            foreach ($data['InsecureRegistryCIDRs'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setInsecureRegistryCIDRs($values_2);
            unset($data['InsecureRegistryCIDRs']);
        }
        if (\array_key_exists('IndexConfigs', $data)) {
            $values_3 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['IndexConfigs'] as $key => $value_3) {
                $values_3[$key] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_42\\Model\\IndexInfo', 'json', $context);
            }
            $object->setIndexConfigs($values_3);
            unset($data['IndexConfigs']);
        }
        if (\array_key_exists('Mirrors', $data)) {
            $values_4 = array();
            foreach ($data['Mirrors'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setMirrors($values_4);
            unset($data['Mirrors']);
        }
        foreach ($data as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_5;
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
        if ($object->isInitialized('allowNondistributableArtifactsCIDRs') && null !== $object->getAllowNondistributableArtifactsCIDRs()) {
            $values = array();
            foreach ($object->getAllowNondistributableArtifactsCIDRs() as $value) {
                $values[] = $value;
            }
            $data['AllowNondistributableArtifactsCIDRs'] = $values;
        }
        if ($object->isInitialized('allowNondistributableArtifactsHostnames') && null !== $object->getAllowNondistributableArtifactsHostnames()) {
            $values_1 = array();
            foreach ($object->getAllowNondistributableArtifactsHostnames() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['AllowNondistributableArtifactsHostnames'] = $values_1;
        }
        if ($object->isInitialized('insecureRegistryCIDRs') && null !== $object->getInsecureRegistryCIDRs()) {
            $values_2 = array();
            foreach ($object->getInsecureRegistryCIDRs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['InsecureRegistryCIDRs'] = $values_2;
        }
        if ($object->isInitialized('indexConfigs') && null !== $object->getIndexConfigs()) {
            $values_3 = array();
            foreach ($object->getIndexConfigs() as $key => $value_3) {
                $values_3[$key] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['IndexConfigs'] = $values_3;
        }
        if ($object->isInitialized('mirrors') && null !== $object->getMirrors()) {
            $values_4 = array();
            foreach ($object->getMirrors() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Mirrors'] = $values_4;
        }
        foreach ($object as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_5;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_42\\Model\\RegistryServiceConfig' => false);
    }
}