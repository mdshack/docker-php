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
class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfig';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfig';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\PluginConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('DockerVersion', $data)) {
            $object->setDockerVersion($data['DockerVersion']);
            unset($data['DockerVersion']);
        }
        if (\array_key_exists('Description', $data)) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        }
        if (\array_key_exists('Documentation', $data)) {
            $object->setDocumentation($data['Documentation']);
            unset($data['Documentation']);
        }
        if (\array_key_exists('Interface', $data)) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigInterface', 'json', $context));
            unset($data['Interface']);
        }
        if (\array_key_exists('Entrypoint', $data)) {
            $values = array();
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
            unset($data['Entrypoint']);
        }
        if (\array_key_exists('WorkDir', $data)) {
            $object->setWorkDir($data['WorkDir']);
            unset($data['WorkDir']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($this->denormalizer->denormalize($data['User'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigUser', 'json', $context));
            unset($data['User']);
        }
        if (\array_key_exists('Network', $data)) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigNetwork', 'json', $context));
            unset($data['Network']);
        }
        if (\array_key_exists('Linux', $data)) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigLinux', 'json', $context));
            unset($data['Linux']);
        }
        if (\array_key_exists('PropagatedMount', $data)) {
            $object->setPropagatedMount($data['PropagatedMount']);
            unset($data['PropagatedMount']);
        }
        if (\array_key_exists('IpcHost', $data)) {
            $object->setIpcHost($data['IpcHost']);
            unset($data['IpcHost']);
        }
        if (\array_key_exists('PidHost', $data)) {
            $object->setPidHost($data['PidHost']);
            unset($data['PidHost']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_1 = array();
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginMount', 'json', $context);
            }
            $object->setMounts($values_1);
            unset($data['Mounts']);
        }
        if (\array_key_exists('Env', $data)) {
            $values_2 = array();
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginEnv', 'json', $context);
            }
            $object->setEnv($values_2);
            unset($data['Env']);
        }
        if (\array_key_exists('Args', $data)) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigArgs', 'json', $context));
            unset($data['Args']);
        }
        if (\array_key_exists('rootfs', $data)) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfigRootfs', 'json', $context));
            unset($data['rootfs']);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
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
        if ($object->isInitialized('dockerVersion') && null !== $object->getDockerVersion()) {
            $data['DockerVersion'] = $object->getDockerVersion();
        }
        $data['Description'] = $object->getDescription();
        $data['Documentation'] = $object->getDocumentation();
        $data['Interface'] = $this->normalizer->normalize($object->getInterface(), 'json', $context);
        $values = array();
        foreach ($object->getEntrypoint() as $value) {
            $values[] = $value;
        }
        $data['Entrypoint'] = $values;
        $data['WorkDir'] = $object->getWorkDir();
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }
        $data['Network'] = $this->normalizer->normalize($object->getNetwork(), 'json', $context);
        $data['Linux'] = $this->normalizer->normalize($object->getLinux(), 'json', $context);
        $data['PropagatedMount'] = $object->getPropagatedMount();
        $data['IpcHost'] = $object->getIpcHost();
        $data['PidHost'] = $object->getPidHost();
        $values_1 = array();
        foreach ($object->getMounts() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $data['Mounts'] = $values_1;
        $values_2 = array();
        foreach ($object->getEnv() as $value_2) {
            $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
        }
        $data['Env'] = $values_2;
        $data['Args'] = $this->normalizer->normalize($object->getArgs(), 'json', $context);
        if ($object->isInitialized('rootfs') && null !== $object->getRootfs()) {
            $data['rootfs'] = $this->normalizer->normalize($object->getRootfs(), 'json', $context);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_42\\Model\\PluginConfig' => false);
    }
}