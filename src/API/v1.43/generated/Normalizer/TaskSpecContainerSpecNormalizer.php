<?php

namespace Mdshack\Docker\API\v1_43\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_43\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskSpecContainerSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpec';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpec';
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
        $object = new \Mdshack\Docker\API\v1_43\Model\TaskSpecContainerSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        }
        if (\array_key_exists('Command', $data)) {
            $values_1 = array();
            foreach ($data['Command'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCommand($values_1);
            unset($data['Command']);
        }
        if (\array_key_exists('Args', $data)) {
            $values_2 = array();
            foreach ($data['Args'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setArgs($values_2);
            unset($data['Args']);
        }
        if (\array_key_exists('Hostname', $data)) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        }
        if (\array_key_exists('Env', $data)) {
            $values_3 = array();
            foreach ($data['Env'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setEnv($values_3);
            unset($data['Env']);
        }
        if (\array_key_exists('Dir', $data)) {
            $object->setDir($data['Dir']);
            unset($data['Dir']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($data['User']);
            unset($data['User']);
        }
        if (\array_key_exists('Groups', $data)) {
            $values_4 = array();
            foreach ($data['Groups'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setGroups($values_4);
            unset($data['Groups']);
        }
        if (\array_key_exists('Privileges', $data)) {
            $object->setPrivileges($this->denormalizer->denormalize($data['Privileges'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpecPrivileges', 'json', $context));
            unset($data['Privileges']);
        }
        if (\array_key_exists('TTY', $data)) {
            $object->setTTY($data['TTY']);
            unset($data['TTY']);
        }
        if (\array_key_exists('OpenStdin', $data)) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        }
        if (\array_key_exists('ReadOnly', $data)) {
            $object->setReadOnly($data['ReadOnly']);
            unset($data['ReadOnly']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_5 = array();
            foreach ($data['Mounts'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Mdshack\\Docker\\API\\v1_43\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_5);
            unset($data['Mounts']);
        }
        if (\array_key_exists('StopSignal', $data)) {
            $object->setStopSignal($data['StopSignal']);
            unset($data['StopSignal']);
        }
        if (\array_key_exists('StopGracePeriod', $data)) {
            $object->setStopGracePeriod($data['StopGracePeriod']);
            unset($data['StopGracePeriod']);
        }
        if (\array_key_exists('HealthCheck', $data)) {
            $object->setHealthCheck($this->denormalizer->denormalize($data['HealthCheck'], 'Mdshack\\Docker\\API\\v1_43\\Model\\HealthConfig', 'json', $context));
            unset($data['HealthCheck']);
        }
        if (\array_key_exists('Hosts', $data)) {
            $values_6 = array();
            foreach ($data['Hosts'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setHosts($values_6);
            unset($data['Hosts']);
        }
        if (\array_key_exists('DNSConfig', $data)) {
            $object->setDNSConfig($this->denormalizer->denormalize($data['DNSConfig'], 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpecDNSConfig', 'json', $context));
            unset($data['DNSConfig']);
        }
        if (\array_key_exists('Secrets', $data)) {
            $values_7 = array();
            foreach ($data['Secrets'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpecSecretsItem', 'json', $context);
            }
            $object->setSecrets($values_7);
            unset($data['Secrets']);
        }
        if (\array_key_exists('Configs', $data)) {
            $values_8 = array();
            foreach ($data['Configs'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpecConfigsItem', 'json', $context);
            }
            $object->setConfigs($values_8);
            unset($data['Configs']);
        }
        if (\array_key_exists('Isolation', $data)) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        }
        if (\array_key_exists('Init', $data) && $data['Init'] !== null) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        }
        elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('Sysctls', $data)) {
            $values_9 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $object->setSysctls($values_9);
            unset($data['Sysctls']);
        }
        if (\array_key_exists('CapabilityAdd', $data)) {
            $values_10 = array();
            foreach ($data['CapabilityAdd'] as $value_10) {
                $values_10[] = $value_10;
            }
            $object->setCapabilityAdd($values_10);
            unset($data['CapabilityAdd']);
        }
        if (\array_key_exists('CapabilityDrop', $data)) {
            $values_11 = array();
            foreach ($data['CapabilityDrop'] as $value_11) {
                $values_11[] = $value_11;
            }
            $object->setCapabilityDrop($values_11);
            unset($data['CapabilityDrop']);
        }
        if (\array_key_exists('Ulimits', $data)) {
            $values_12 = array();
            foreach ($data['Ulimits'] as $value_12) {
                $values_12[] = $this->denormalizer->denormalize($value_12, 'Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpecUlimitsItem', 'json', $context);
            }
            $object->setUlimits($values_12);
            unset($data['Ulimits']);
        }
        foreach ($data as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_13;
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
        if ($object->isInitialized('image') && null !== $object->getImage()) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values = array();
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('command') && null !== $object->getCommand()) {
            $values_1 = array();
            foreach ($object->getCommand() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Command'] = $values_1;
        }
        if ($object->isInitialized('args') && null !== $object->getArgs()) {
            $values_2 = array();
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
        }
        if ($object->isInitialized('hostname') && null !== $object->getHostname()) {
            $data['Hostname'] = $object->getHostname();
        }
        if ($object->isInitialized('env') && null !== $object->getEnv()) {
            $values_3 = array();
            foreach ($object->getEnv() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Env'] = $values_3;
        }
        if ($object->isInitialized('dir') && null !== $object->getDir()) {
            $data['Dir'] = $object->getDir();
        }
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('groups') && null !== $object->getGroups()) {
            $values_4 = array();
            foreach ($object->getGroups() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Groups'] = $values_4;
        }
        if ($object->isInitialized('privileges') && null !== $object->getPrivileges()) {
            $data['Privileges'] = $this->normalizer->normalize($object->getPrivileges(), 'json', $context);
        }
        if ($object->isInitialized('tTY') && null !== $object->getTTY()) {
            $data['TTY'] = $object->getTTY();
        }
        if ($object->isInitialized('openStdin') && null !== $object->getOpenStdin()) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('readOnly') && null !== $object->getReadOnly()) {
            $data['ReadOnly'] = $object->getReadOnly();
        }
        if ($object->isInitialized('mounts') && null !== $object->getMounts()) {
            $values_5 = array();
            foreach ($object->getMounts() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Mounts'] = $values_5;
        }
        if ($object->isInitialized('stopSignal') && null !== $object->getStopSignal()) {
            $data['StopSignal'] = $object->getStopSignal();
        }
        if ($object->isInitialized('stopGracePeriod') && null !== $object->getStopGracePeriod()) {
            $data['StopGracePeriod'] = $object->getStopGracePeriod();
        }
        if ($object->isInitialized('healthCheck') && null !== $object->getHealthCheck()) {
            $data['HealthCheck'] = $this->normalizer->normalize($object->getHealthCheck(), 'json', $context);
        }
        if ($object->isInitialized('hosts') && null !== $object->getHosts()) {
            $values_6 = array();
            foreach ($object->getHosts() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['Hosts'] = $values_6;
        }
        if ($object->isInitialized('dNSConfig') && null !== $object->getDNSConfig()) {
            $data['DNSConfig'] = $this->normalizer->normalize($object->getDNSConfig(), 'json', $context);
        }
        if ($object->isInitialized('secrets') && null !== $object->getSecrets()) {
            $values_7 = array();
            foreach ($object->getSecrets() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['Secrets'] = $values_7;
        }
        if ($object->isInitialized('configs') && null !== $object->getConfigs()) {
            $values_8 = array();
            foreach ($object->getConfigs() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Configs'] = $values_8;
        }
        if ($object->isInitialized('isolation') && null !== $object->getIsolation()) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('init') && null !== $object->getInit()) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('sysctls') && null !== $object->getSysctls()) {
            $values_9 = array();
            foreach ($object->getSysctls() as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $data['Sysctls'] = $values_9;
        }
        if ($object->isInitialized('capabilityAdd') && null !== $object->getCapabilityAdd()) {
            $values_10 = array();
            foreach ($object->getCapabilityAdd() as $value_10) {
                $values_10[] = $value_10;
            }
            $data['CapabilityAdd'] = $values_10;
        }
        if ($object->isInitialized('capabilityDrop') && null !== $object->getCapabilityDrop()) {
            $values_11 = array();
            foreach ($object->getCapabilityDrop() as $value_11) {
                $values_11[] = $value_11;
            }
            $data['CapabilityDrop'] = $values_11;
        }
        if ($object->isInitialized('ulimits') && null !== $object->getUlimits()) {
            $values_12 = array();
            foreach ($object->getUlimits() as $value_12) {
                $values_12[] = $this->normalizer->normalize($value_12, 'json', $context);
            }
            $data['Ulimits'] = $values_12;
        }
        foreach ($object as $key_2 => $value_13) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_13;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API\\v1_43\\Model\\TaskSpecContainerSpec' => false);
    }
}