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

class TaskSpecPluginSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecPluginSpec';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecPluginSpec';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\TaskSpecPluginSpec();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('Remote', $data)) {
            $object->setRemote($data['Remote']);
            unset($data['Remote']);
        }
        if (\array_key_exists('Disabled', $data)) {
            $object->setDisabled($data['Disabled']);
            unset($data['Disabled']);
        }
        if (\array_key_exists('PluginPrivilege', $data)) {
            $values = [];
            foreach ($data['PluginPrivilege'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginPrivilege', 'json', $context);
            }
            $object->setPluginPrivilege($values);
            unset($data['PluginPrivilege']);
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
        if ($object->isInitialized('name') && $object->getName() !== null) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('remote') && $object->getRemote() !== null) {
            $data['Remote'] = $object->getRemote();
        }
        if ($object->isInitialized('disabled') && $object->getDisabled() !== null) {
            $data['Disabled'] = $object->getDisabled();
        }
        if ($object->isInitialized('pluginPrivilege') && $object->getPluginPrivilege() !== null) {
            $values = [];
            foreach ($object->getPluginPrivilege() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['PluginPrivilege'] = $values;
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\TaskSpecPluginSpec' => false];
    }
}
