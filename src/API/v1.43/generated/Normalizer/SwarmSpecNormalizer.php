<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SwarmSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpec';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpec';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\SwarmSpec();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        }
        if (\array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
            $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecOrchestration', 'json', $context));
            unset($data['Orchestration']);
        } elseif (\array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
            $object->setOrchestration(null);
        }
        if (\array_key_exists('Raft', $data)) {
            $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecRaft', 'json', $context));
            unset($data['Raft']);
        }
        if (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
            $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecDispatcher', 'json', $context));
            unset($data['Dispatcher']);
        } elseif (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
            $object->setDispatcher(null);
        }
        if (\array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
            $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecCAConfig', 'json', $context));
            unset($data['CAConfig']);
        } elseif (\array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
            $object->setCAConfig(null);
        }
        if (\array_key_exists('EncryptionConfig', $data)) {
            $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecEncryptionConfig', 'json', $context));
            unset($data['EncryptionConfig']);
        }
        if (\array_key_exists('TaskDefaults', $data)) {
            $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpecTaskDefaults', 'json', $context));
            unset($data['TaskDefaults']);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
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
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values = [];
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('orchestration') && $object->getOrchestration() !== null) {
            $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
        }
        if ($object->isInitialized('raft') && $object->getRaft() !== null) {
            $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
        }
        if ($object->isInitialized('dispatcher') && $object->getDispatcher() !== null) {
            $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
        }
        if ($object->isInitialized('cAConfig') && $object->getCAConfig() !== null) {
            $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
        }
        if ($object->isInitialized('encryptionConfig') && $object->getEncryptionConfig() !== null) {
            $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
        }
        if ($object->isInitialized('taskDefaults') && $object->getTaskDefaults() !== null) {
            $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_43\\Model\\SwarmSpec' => false];
    }
}
