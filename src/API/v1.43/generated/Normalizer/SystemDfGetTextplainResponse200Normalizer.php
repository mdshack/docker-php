<?php

namespace Mdshack\Docker\API$NAMESPACE\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API$NAMESPACE\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API$NAMESPACE\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class SystemDfGetTextplainResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\SystemDfGetTextplainResponse200';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\SystemDfGetTextplainResponse200';
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
        $object = new \Mdshack\Docker\API$NAMESPACE\Model\SystemDfGetTextplainResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('LayersSize', $data)) {
            $object->setLayersSize($data['LayersSize']);
            unset($data['LayersSize']);
        }
        if (\array_key_exists('Images', $data)) {
            $values = array();
            foreach ($data['Images'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ImageSummary', 'json', $context);
            }
            $object->setImages($values);
            unset($data['Images']);
        }
        if (\array_key_exists('Containers', $data)) {
            $values_1 = array();
            foreach ($data['Containers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ContainerSummary', 'json', $context);
            }
            $object->setContainers($values_1);
            unset($data['Containers']);
        }
        if (\array_key_exists('Volumes', $data)) {
            $values_2 = array();
            foreach ($data['Volumes'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\Volume', 'json', $context);
            }
            $object->setVolumes($values_2);
            unset($data['Volumes']);
        }
        if (\array_key_exists('BuildCache', $data)) {
            $values_3 = array();
            foreach ($data['BuildCache'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\BuildCache', 'json', $context);
            }
            $object->setBuildCache($values_3);
            unset($data['BuildCache']);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
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
        if ($object->isInitialized('layersSize') && null !== $object->getLayersSize()) {
            $data['LayersSize'] = $object->getLayersSize();
        }
        if ($object->isInitialized('images') && null !== $object->getImages()) {
            $values = array();
            foreach ($object->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Images'] = $values;
        }
        if ($object->isInitialized('containers') && null !== $object->getContainers()) {
            $values_1 = array();
            foreach ($object->getContainers() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Containers'] = $values_1;
        }
        if ($object->isInitialized('volumes') && null !== $object->getVolumes()) {
            $values_2 = array();
            foreach ($object->getVolumes() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Volumes'] = $values_2;
        }
        if ($object->isInitialized('buildCache') && null !== $object->getBuildCache()) {
            $values_3 = array();
            foreach ($object->getBuildCache() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['BuildCache'] = $values_3;
        }
        foreach ($object as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_4;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API$NAMESPACE\\Model\\SystemDfGetTextplainResponse200' => false);
    }
}