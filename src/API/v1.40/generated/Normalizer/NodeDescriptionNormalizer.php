<?php

namespace Mdshack\Docker\API\v1_40\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_40\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NodeDescriptionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\NodeDescription';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\NodeDescription';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\NodeDescription();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Hostname', $data)) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        }
        if (\array_key_exists('Platform', $data)) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Mdshack\\Docker\\API\\v1_40\\Model\\Platform', 'json', $context));
            unset($data['Platform']);
        }
        if (\array_key_exists('Resources', $data)) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ResourceObject', 'json', $context));
            unset($data['Resources']);
        }
        if (\array_key_exists('Engine', $data)) {
            $object->setEngine($this->denormalizer->denormalize($data['Engine'], 'Mdshack\\Docker\\API\\v1_40\\Model\\EngineDescription', 'json', $context));
            unset($data['Engine']);
        }
        if (\array_key_exists('TLSInfo', $data)) {
            $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Mdshack\\Docker\\API\\v1_40\\Model\\TLSInfo', 'json', $context));
            unset($data['TLSInfo']);
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
        if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
            $data['Hostname'] = $object->getHostname();
        }
        if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
            $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
        }
        if ($object->isInitialized('resources') && $object->getResources() !== null) {
            $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
        }
        if ($object->isInitialized('engine') && $object->getEngine() !== null) {
            $data['Engine'] = $this->normalizer->normalize($object->getEngine(), 'json', $context);
        }
        if ($object->isInitialized('tLSInfo') && $object->getTLSInfo() !== null) {
            $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\NodeDescription' => false];
    }
}
