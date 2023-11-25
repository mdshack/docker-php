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

class TaskSpecContainerSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpec';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpec';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\TaskSpecContainerSpec();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Image', $data)) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        }
        if (\array_key_exists('Command', $data)) {
            $values_1 = [];
            foreach ($data['Command'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCommand($values_1);
            unset($data['Command']);
        }
        if (\array_key_exists('Args', $data)) {
            $values_2 = [];
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
            $values_3 = [];
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
            $values_4 = [];
            foreach ($data['Groups'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setGroups($values_4);
            unset($data['Groups']);
        }
        if (\array_key_exists('Privileges', $data)) {
            $object->setPrivileges($this->denormalizer->denormalize($data['Privileges'], 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpecPrivileges', 'json', $context));
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
            $values_5 = [];
            foreach ($data['Mounts'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Mdshack\\Docker\\API\\v1_40\\Model\\Mount', 'json', $context);
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
            $object->setHealthCheck($this->denormalizer->denormalize($data['HealthCheck'], 'Mdshack\\Docker\\API\\v1_40\\Model\\HealthConfig', 'json', $context));
            unset($data['HealthCheck']);
        }
        if (\array_key_exists('Hosts', $data)) {
            $values_6 = [];
            foreach ($data['Hosts'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setHosts($values_6);
            unset($data['Hosts']);
        }
        if (\array_key_exists('DNSConfig', $data)) {
            $object->setDNSConfig($this->denormalizer->denormalize($data['DNSConfig'], 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpecDNSConfig', 'json', $context));
            unset($data['DNSConfig']);
        }
        if (\array_key_exists('Secrets', $data)) {
            $values_7 = [];
            foreach ($data['Secrets'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpecSecretsItem', 'json', $context);
            }
            $object->setSecrets($values_7);
            unset($data['Secrets']);
        }
        if (\array_key_exists('Configs', $data)) {
            $values_8 = [];
            foreach ($data['Configs'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpecConfigsItem', 'json', $context);
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
        } elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('Sysctls', $data)) {
            $values_9 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $object->setSysctls($values_9);
            unset($data['Sysctls']);
        }
        foreach ($data as $key_2 => $value_10) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_10;
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
        if ($object->isInitialized('image') && $object->getImage() !== null) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('labels') && $object->getLabels() !== null) {
            $values = [];
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('command') && $object->getCommand() !== null) {
            $values_1 = [];
            foreach ($object->getCommand() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Command'] = $values_1;
        }
        if ($object->isInitialized('args') && $object->getArgs() !== null) {
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
        }
        if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
            $data['Hostname'] = $object->getHostname();
        }
        if ($object->isInitialized('env') && $object->getEnv() !== null) {
            $values_3 = [];
            foreach ($object->getEnv() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Env'] = $values_3;
        }
        if ($object->isInitialized('dir') && $object->getDir() !== null) {
            $data['Dir'] = $object->getDir();
        }
        if ($object->isInitialized('user') && $object->getUser() !== null) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('groups') && $object->getGroups() !== null) {
            $values_4 = [];
            foreach ($object->getGroups() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['Groups'] = $values_4;
        }
        if ($object->isInitialized('privileges') && $object->getPrivileges() !== null) {
            $data['Privileges'] = $this->normalizer->normalize($object->getPrivileges(), 'json', $context);
        }
        if ($object->isInitialized('tTY') && $object->getTTY() !== null) {
            $data['TTY'] = $object->getTTY();
        }
        if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
            $data['OpenStdin'] = $object->getOpenStdin();
        }
        if ($object->isInitialized('readOnly') && $object->getReadOnly() !== null) {
            $data['ReadOnly'] = $object->getReadOnly();
        }
        if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
            $values_5 = [];
            foreach ($object->getMounts() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Mounts'] = $values_5;
        }
        if ($object->isInitialized('stopSignal') && $object->getStopSignal() !== null) {
            $data['StopSignal'] = $object->getStopSignal();
        }
        if ($object->isInitialized('stopGracePeriod') && $object->getStopGracePeriod() !== null) {
            $data['StopGracePeriod'] = $object->getStopGracePeriod();
        }
        if ($object->isInitialized('healthCheck') && $object->getHealthCheck() !== null) {
            $data['HealthCheck'] = $this->normalizer->normalize($object->getHealthCheck(), 'json', $context);
        }
        if ($object->isInitialized('hosts') && $object->getHosts() !== null) {
            $values_6 = [];
            foreach ($object->getHosts() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['Hosts'] = $values_6;
        }
        if ($object->isInitialized('dNSConfig') && $object->getDNSConfig() !== null) {
            $data['DNSConfig'] = $this->normalizer->normalize($object->getDNSConfig(), 'json', $context);
        }
        if ($object->isInitialized('secrets') && $object->getSecrets() !== null) {
            $values_7 = [];
            foreach ($object->getSecrets() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['Secrets'] = $values_7;
        }
        if ($object->isInitialized('configs') && $object->getConfigs() !== null) {
            $values_8 = [];
            foreach ($object->getConfigs() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Configs'] = $values_8;
        }
        if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('init') && $object->getInit() !== null) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('sysctls') && $object->getSysctls() !== null) {
            $values_9 = [];
            foreach ($object->getSysctls() as $key_1 => $value_9) {
                $values_9[$key_1] = $value_9;
            }
            $data['Sysctls'] = $values_9;
        }
        foreach ($object as $key_2 => $value_10) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_10;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\TaskSpecContainerSpec' => false];
    }
}
