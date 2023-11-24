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

class BuildCacheNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\BuildCache';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\BuildCache';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\BuildCache();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('ID', $data)) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        if (\array_key_exists('Parent', $data) && $data['Parent'] !== null) {
            $object->setParent($data['Parent']);
            unset($data['Parent']);
        } elseif (\array_key_exists('Parent', $data) && $data['Parent'] === null) {
            $object->setParent(null);
        }
        if (\array_key_exists('Parents', $data) && $data['Parents'] !== null) {
            $values = [];
            foreach ($data['Parents'] as $value) {
                $values[] = $value;
            }
            $object->setParents($values);
            unset($data['Parents']);
        } elseif (\array_key_exists('Parents', $data) && $data['Parents'] === null) {
            $object->setParents(null);
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
            unset($data['Type']);
        }
        if (\array_key_exists('Description', $data)) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        }
        if (\array_key_exists('InUse', $data)) {
            $object->setInUse($data['InUse']);
            unset($data['InUse']);
        }
        if (\array_key_exists('Shared', $data)) {
            $object->setShared($data['Shared']);
            unset($data['Shared']);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        if (\array_key_exists('CreatedAt', $data)) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        }
        if (\array_key_exists('LastUsedAt', $data) && $data['LastUsedAt'] !== null) {
            $object->setLastUsedAt($data['LastUsedAt']);
            unset($data['LastUsedAt']);
        } elseif (\array_key_exists('LastUsedAt', $data) && $data['LastUsedAt'] === null) {
            $object->setLastUsedAt(null);
        }
        if (\array_key_exists('UsageCount', $data)) {
            $object->setUsageCount($data['UsageCount']);
            unset($data['UsageCount']);
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
        if ($object->isInitialized('iD') && $object->getID() !== null) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('parent') && $object->getParent() !== null) {
            $data['Parent'] = $object->getParent();
        }
        if ($object->isInitialized('parents') && $object->getParents() !== null) {
            $values = [];
            foreach ($object->getParents() as $value) {
                $values[] = $value;
            }
            $data['Parents'] = $values;
        }
        if ($object->isInitialized('type') && $object->getType() !== null) {
            $data['Type'] = $object->getType();
        }
        if ($object->isInitialized('description') && $object->getDescription() !== null) {
            $data['Description'] = $object->getDescription();
        }
        if ($object->isInitialized('inUse') && $object->getInUse() !== null) {
            $data['InUse'] = $object->getInUse();
        }
        if ($object->isInitialized('shared') && $object->getShared() !== null) {
            $data['Shared'] = $object->getShared();
        }
        if ($object->isInitialized('size') && $object->getSize() !== null) {
            $data['Size'] = $object->getSize();
        }
        if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('lastUsedAt') && $object->getLastUsedAt() !== null) {
            $data['LastUsedAt'] = $object->getLastUsedAt();
        }
        if ($object->isInitialized('usageCount') && $object->getUsageCount() !== null) {
            $data['UsageCount'] = $object->getUsageCount();
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\BuildCache' => false];
    }
}
