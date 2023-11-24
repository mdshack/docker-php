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

class SystemDfGetTextplainResponse200Normalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemDfGetTextplainResponse200';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\SystemDfGetTextplainResponse200';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\SystemDfGetTextplainResponse200();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('LayersSize', $data)) {
            $object->setLayersSize($data['LayersSize']);
            unset($data['LayersSize']);
        }
        if (\array_key_exists('Images', $data)) {
            $values = [];
            foreach ($data['Images'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_41\\Model\\ImageSummary', 'json', $context);
            }
            $object->setImages($values);
            unset($data['Images']);
        }
        if (\array_key_exists('Containers', $data)) {
            $values_1 = [];
            foreach ($data['Containers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API\\v1_41\\Model\\ContainerSummary', 'json', $context);
            }
            $object->setContainers($values_1);
            unset($data['Containers']);
        }
        if (\array_key_exists('Volumes', $data)) {
            $values_2 = [];
            foreach ($data['Volumes'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API\\v1_41\\Model\\Volume', 'json', $context);
            }
            $object->setVolumes($values_2);
            unset($data['Volumes']);
        }
        if (\array_key_exists('BuildCache', $data)) {
            $values_3 = [];
            foreach ($data['BuildCache'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_41\\Model\\BuildCache', 'json', $context);
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('layersSize') && $object->getLayersSize() !== null) {
            $data['LayersSize'] = $object->getLayersSize();
        }
        if ($object->isInitialized('images') && $object->getImages() !== null) {
            $values = [];
            foreach ($object->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Images'] = $values;
        }
        if ($object->isInitialized('containers') && $object->getContainers() !== null) {
            $values_1 = [];
            foreach ($object->getContainers() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['Containers'] = $values_1;
        }
        if ($object->isInitialized('volumes') && $object->getVolumes() !== null) {
            $values_2 = [];
            foreach ($object->getVolumes() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Volumes'] = $values_2;
        }
        if ($object->isInitialized('buildCache') && $object->getBuildCache() !== null) {
            $values_3 = [];
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

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\SystemDfGetTextplainResponse200' => false];
    }
}
