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
class HostConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\HostConfig';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API$NAMESPACE\\Model\\HostConfig';
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
        $object = new \Mdshack\Docker\API$NAMESPACE\Model\HostConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CpuShares', $data)) {
            $object->setCpuShares($data['CpuShares']);
            unset($data['CpuShares']);
        }
        if (\array_key_exists('Memory', $data)) {
            $object->setMemory($data['Memory']);
            unset($data['Memory']);
        }
        if (\array_key_exists('CgroupParent', $data)) {
            $object->setCgroupParent($data['CgroupParent']);
            unset($data['CgroupParent']);
        }
        if (\array_key_exists('BlkioWeight', $data)) {
            $object->setBlkioWeight($data['BlkioWeight']);
            unset($data['BlkioWeight']);
        }
        if (\array_key_exists('BlkioWeightDevice', $data)) {
            $values = array();
            foreach ($data['BlkioWeightDevice'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ResourcesBlkioWeightDeviceItem', 'json', $context);
            }
            $object->setBlkioWeightDevice($values);
            unset($data['BlkioWeightDevice']);
        }
        if (\array_key_exists('BlkioDeviceReadBps', $data)) {
            $values_1 = array();
            foreach ($data['BlkioDeviceReadBps'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadBps($values_1);
            unset($data['BlkioDeviceReadBps']);
        }
        if (\array_key_exists('BlkioDeviceWriteBps', $data)) {
            $values_2 = array();
            foreach ($data['BlkioDeviceWriteBps'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceWriteBps($values_2);
            unset($data['BlkioDeviceWriteBps']);
        }
        if (\array_key_exists('BlkioDeviceReadIOps', $data)) {
            $values_3 = array();
            foreach ($data['BlkioDeviceReadIOps'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadIOps($values_3);
            unset($data['BlkioDeviceReadIOps']);
        }
        if (\array_key_exists('BlkioDeviceWriteIOps', $data)) {
            $values_4 = array();
            foreach ($data['BlkioDeviceWriteIOps'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceWriteIOps($values_4);
            unset($data['BlkioDeviceWriteIOps']);
        }
        if (\array_key_exists('CpuPeriod', $data)) {
            $object->setCpuPeriod($data['CpuPeriod']);
            unset($data['CpuPeriod']);
        }
        if (\array_key_exists('CpuQuota', $data)) {
            $object->setCpuQuota($data['CpuQuota']);
            unset($data['CpuQuota']);
        }
        if (\array_key_exists('CpuRealtimePeriod', $data)) {
            $object->setCpuRealtimePeriod($data['CpuRealtimePeriod']);
            unset($data['CpuRealtimePeriod']);
        }
        if (\array_key_exists('CpuRealtimeRuntime', $data)) {
            $object->setCpuRealtimeRuntime($data['CpuRealtimeRuntime']);
            unset($data['CpuRealtimeRuntime']);
        }
        if (\array_key_exists('CpusetCpus', $data)) {
            $object->setCpusetCpus($data['CpusetCpus']);
            unset($data['CpusetCpus']);
        }
        if (\array_key_exists('CpusetMems', $data)) {
            $object->setCpusetMems($data['CpusetMems']);
            unset($data['CpusetMems']);
        }
        if (\array_key_exists('Devices', $data)) {
            $values_5 = array();
            foreach ($data['Devices'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\DeviceMapping', 'json', $context);
            }
            $object->setDevices($values_5);
            unset($data['Devices']);
        }
        if (\array_key_exists('DeviceCgroupRules', $data)) {
            $values_6 = array();
            foreach ($data['DeviceCgroupRules'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setDeviceCgroupRules($values_6);
            unset($data['DeviceCgroupRules']);
        }
        if (\array_key_exists('DeviceRequests', $data)) {
            $values_7 = array();
            foreach ($data['DeviceRequests'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\DeviceRequest', 'json', $context);
            }
            $object->setDeviceRequests($values_7);
            unset($data['DeviceRequests']);
        }
        if (\array_key_exists('KernelMemoryTCP', $data)) {
            $object->setKernelMemoryTCP($data['KernelMemoryTCP']);
            unset($data['KernelMemoryTCP']);
        }
        if (\array_key_exists('MemoryReservation', $data)) {
            $object->setMemoryReservation($data['MemoryReservation']);
            unset($data['MemoryReservation']);
        }
        if (\array_key_exists('MemorySwap', $data)) {
            $object->setMemorySwap($data['MemorySwap']);
            unset($data['MemorySwap']);
        }
        if (\array_key_exists('MemorySwappiness', $data)) {
            $object->setMemorySwappiness($data['MemorySwappiness']);
            unset($data['MemorySwappiness']);
        }
        if (\array_key_exists('NanoCpus', $data)) {
            $object->setNanoCpus($data['NanoCpus']);
            unset($data['NanoCpus']);
        }
        if (\array_key_exists('OomKillDisable', $data)) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        }
        if (\array_key_exists('Init', $data) && $data['Init'] !== null) {
            $object->setInit($data['Init']);
            unset($data['Init']);
        }
        elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] !== null) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        }
        elseif (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] === null) {
            $object->setPidsLimit(null);
        }
        if (\array_key_exists('Ulimits', $data)) {
            $values_8 = array();
            foreach ($data['Ulimits'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ResourcesUlimitsItem', 'json', $context);
            }
            $object->setUlimits($values_8);
            unset($data['Ulimits']);
        }
        if (\array_key_exists('CpuCount', $data)) {
            $object->setCpuCount($data['CpuCount']);
            unset($data['CpuCount']);
        }
        if (\array_key_exists('CpuPercent', $data)) {
            $object->setCpuPercent($data['CpuPercent']);
            unset($data['CpuPercent']);
        }
        if (\array_key_exists('IOMaximumIOps', $data)) {
            $object->setIOMaximumIOps($data['IOMaximumIOps']);
            unset($data['IOMaximumIOps']);
        }
        if (\array_key_exists('IOMaximumBandwidth', $data)) {
            $object->setIOMaximumBandwidth($data['IOMaximumBandwidth']);
            unset($data['IOMaximumBandwidth']);
        }
        if (\array_key_exists('Binds', $data)) {
            $values_9 = array();
            foreach ($data['Binds'] as $value_9) {
                $values_9[] = $value_9;
            }
            $object->setBinds($values_9);
            unset($data['Binds']);
        }
        if (\array_key_exists('ContainerIDFile', $data)) {
            $object->setContainerIDFile($data['ContainerIDFile']);
            unset($data['ContainerIDFile']);
        }
        if (\array_key_exists('LogConfig', $data)) {
            $object->setLogConfig($this->denormalizer->denormalize($data['LogConfig'], 'Mdshack\\Docker\\API$NAMESPACE\\Model\\HostConfigLogConfig', 'json', $context));
            unset($data['LogConfig']);
        }
        if (\array_key_exists('NetworkMode', $data)) {
            $object->setNetworkMode($data['NetworkMode']);
            unset($data['NetworkMode']);
        }
        if (\array_key_exists('PortBindings', $data)) {
            $values_10 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['PortBindings'] as $key => $value_10) {
                $values_11 = array();
                foreach ($value_10 as $value_11) {
                    $values_11[] = $this->denormalizer->denormalize($value_11, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\PortBinding', 'json', $context);
                }
                $values_10[$key] = $values_11;
            }
            $object->setPortBindings($values_10);
            unset($data['PortBindings']);
        }
        if (\array_key_exists('RestartPolicy', $data)) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Mdshack\\Docker\\API$NAMESPACE\\Model\\RestartPolicy', 'json', $context));
            unset($data['RestartPolicy']);
        }
        if (\array_key_exists('AutoRemove', $data)) {
            $object->setAutoRemove($data['AutoRemove']);
            unset($data['AutoRemove']);
        }
        if (\array_key_exists('VolumeDriver', $data)) {
            $object->setVolumeDriver($data['VolumeDriver']);
            unset($data['VolumeDriver']);
        }
        if (\array_key_exists('VolumesFrom', $data)) {
            $values_12 = array();
            foreach ($data['VolumesFrom'] as $value_12) {
                $values_12[] = $value_12;
            }
            $object->setVolumesFrom($values_12);
            unset($data['VolumesFrom']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_13 = array();
            foreach ($data['Mounts'] as $value_13) {
                $values_13[] = $this->denormalizer->denormalize($value_13, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\Mount', 'json', $context);
            }
            $object->setMounts($values_13);
            unset($data['Mounts']);
        }
        if (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] !== null) {
            $values_14 = array();
            foreach ($data['ConsoleSize'] as $value_14) {
                $values_14[] = $value_14;
            }
            $object->setConsoleSize($values_14);
            unset($data['ConsoleSize']);
        }
        elseif (\array_key_exists('ConsoleSize', $data) && $data['ConsoleSize'] === null) {
            $object->setConsoleSize(null);
        }
        if (\array_key_exists('Annotations', $data)) {
            $values_15 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Annotations'] as $key_1 => $value_15) {
                $values_15[$key_1] = $value_15;
            }
            $object->setAnnotations($values_15);
            unset($data['Annotations']);
        }
        if (\array_key_exists('CapAdd', $data)) {
            $values_16 = array();
            foreach ($data['CapAdd'] as $value_16) {
                $values_16[] = $value_16;
            }
            $object->setCapAdd($values_16);
            unset($data['CapAdd']);
        }
        if (\array_key_exists('CapDrop', $data)) {
            $values_17 = array();
            foreach ($data['CapDrop'] as $value_17) {
                $values_17[] = $value_17;
            }
            $object->setCapDrop($values_17);
            unset($data['CapDrop']);
        }
        if (\array_key_exists('CgroupnsMode', $data)) {
            $object->setCgroupnsMode($data['CgroupnsMode']);
            unset($data['CgroupnsMode']);
        }
        if (\array_key_exists('Dns', $data)) {
            $values_18 = array();
            foreach ($data['Dns'] as $value_18) {
                $values_18[] = $value_18;
            }
            $object->setDns($values_18);
            unset($data['Dns']);
        }
        if (\array_key_exists('DnsOptions', $data)) {
            $values_19 = array();
            foreach ($data['DnsOptions'] as $value_19) {
                $values_19[] = $value_19;
            }
            $object->setDnsOptions($values_19);
            unset($data['DnsOptions']);
        }
        if (\array_key_exists('DnsSearch', $data)) {
            $values_20 = array();
            foreach ($data['DnsSearch'] as $value_20) {
                $values_20[] = $value_20;
            }
            $object->setDnsSearch($values_20);
            unset($data['DnsSearch']);
        }
        if (\array_key_exists('ExtraHosts', $data)) {
            $values_21 = array();
            foreach ($data['ExtraHosts'] as $value_21) {
                $values_21[] = $value_21;
            }
            $object->setExtraHosts($values_21);
            unset($data['ExtraHosts']);
        }
        if (\array_key_exists('GroupAdd', $data)) {
            $values_22 = array();
            foreach ($data['GroupAdd'] as $value_22) {
                $values_22[] = $value_22;
            }
            $object->setGroupAdd($values_22);
            unset($data['GroupAdd']);
        }
        if (\array_key_exists('IpcMode', $data)) {
            $object->setIpcMode($data['IpcMode']);
            unset($data['IpcMode']);
        }
        if (\array_key_exists('Cgroup', $data)) {
            $object->setCgroup($data['Cgroup']);
            unset($data['Cgroup']);
        }
        if (\array_key_exists('Links', $data)) {
            $values_23 = array();
            foreach ($data['Links'] as $value_23) {
                $values_23[] = $value_23;
            }
            $object->setLinks($values_23);
            unset($data['Links']);
        }
        if (\array_key_exists('OomScoreAdj', $data)) {
            $object->setOomScoreAdj($data['OomScoreAdj']);
            unset($data['OomScoreAdj']);
        }
        if (\array_key_exists('PidMode', $data)) {
            $object->setPidMode($data['PidMode']);
            unset($data['PidMode']);
        }
        if (\array_key_exists('Privileged', $data)) {
            $object->setPrivileged($data['Privileged']);
            unset($data['Privileged']);
        }
        if (\array_key_exists('PublishAllPorts', $data)) {
            $object->setPublishAllPorts($data['PublishAllPorts']);
            unset($data['PublishAllPorts']);
        }
        if (\array_key_exists('ReadonlyRootfs', $data)) {
            $object->setReadonlyRootfs($data['ReadonlyRootfs']);
            unset($data['ReadonlyRootfs']);
        }
        if (\array_key_exists('SecurityOpt', $data)) {
            $values_24 = array();
            foreach ($data['SecurityOpt'] as $value_24) {
                $values_24[] = $value_24;
            }
            $object->setSecurityOpt($values_24);
            unset($data['SecurityOpt']);
        }
        if (\array_key_exists('StorageOpt', $data)) {
            $values_25 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['StorageOpt'] as $key_2 => $value_25) {
                $values_25[$key_2] = $value_25;
            }
            $object->setStorageOpt($values_25);
            unset($data['StorageOpt']);
        }
        if (\array_key_exists('Tmpfs', $data)) {
            $values_26 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Tmpfs'] as $key_3 => $value_26) {
                $values_26[$key_3] = $value_26;
            }
            $object->setTmpfs($values_26);
            unset($data['Tmpfs']);
        }
        if (\array_key_exists('UTSMode', $data)) {
            $object->setUTSMode($data['UTSMode']);
            unset($data['UTSMode']);
        }
        if (\array_key_exists('UsernsMode', $data)) {
            $object->setUsernsMode($data['UsernsMode']);
            unset($data['UsernsMode']);
        }
        if (\array_key_exists('ShmSize', $data)) {
            $object->setShmSize($data['ShmSize']);
            unset($data['ShmSize']);
        }
        if (\array_key_exists('Sysctls', $data)) {
            $values_27 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Sysctls'] as $key_4 => $value_27) {
                $values_27[$key_4] = $value_27;
            }
            $object->setSysctls($values_27);
            unset($data['Sysctls']);
        }
        if (\array_key_exists('Runtime', $data)) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        }
        if (\array_key_exists('Isolation', $data)) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        }
        if (\array_key_exists('MaskedPaths', $data)) {
            $values_28 = array();
            foreach ($data['MaskedPaths'] as $value_28) {
                $values_28[] = $value_28;
            }
            $object->setMaskedPaths($values_28);
            unset($data['MaskedPaths']);
        }
        if (\array_key_exists('ReadonlyPaths', $data)) {
            $values_29 = array();
            foreach ($data['ReadonlyPaths'] as $value_29) {
                $values_29[] = $value_29;
            }
            $object->setReadonlyPaths($values_29);
            unset($data['ReadonlyPaths']);
        }
        foreach ($data as $key_5 => $value_30) {
            if (preg_match('/.*/', (string) $key_5)) {
                $object[$key_5] = $value_30;
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
        if ($object->isInitialized('cpuShares') && null !== $object->getCpuShares()) {
            $data['CpuShares'] = $object->getCpuShares();
        }
        if ($object->isInitialized('memory') && null !== $object->getMemory()) {
            $data['Memory'] = $object->getMemory();
        }
        if ($object->isInitialized('cgroupParent') && null !== $object->getCgroupParent()) {
            $data['CgroupParent'] = $object->getCgroupParent();
        }
        if ($object->isInitialized('blkioWeight') && null !== $object->getBlkioWeight()) {
            $data['BlkioWeight'] = $object->getBlkioWeight();
        }
        if ($object->isInitialized('blkioWeightDevice') && null !== $object->getBlkioWeightDevice()) {
            $values = array();
            foreach ($object->getBlkioWeightDevice() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['BlkioWeightDevice'] = $values;
        }
        if ($object->isInitialized('blkioDeviceReadBps') && null !== $object->getBlkioDeviceReadBps()) {
            $values_1 = array();
            foreach ($object->getBlkioDeviceReadBps() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['BlkioDeviceReadBps'] = $values_1;
        }
        if ($object->isInitialized('blkioDeviceWriteBps') && null !== $object->getBlkioDeviceWriteBps()) {
            $values_2 = array();
            foreach ($object->getBlkioDeviceWriteBps() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['BlkioDeviceWriteBps'] = $values_2;
        }
        if ($object->isInitialized('blkioDeviceReadIOps') && null !== $object->getBlkioDeviceReadIOps()) {
            $values_3 = array();
            foreach ($object->getBlkioDeviceReadIOps() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['BlkioDeviceReadIOps'] = $values_3;
        }
        if ($object->isInitialized('blkioDeviceWriteIOps') && null !== $object->getBlkioDeviceWriteIOps()) {
            $values_4 = array();
            foreach ($object->getBlkioDeviceWriteIOps() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['BlkioDeviceWriteIOps'] = $values_4;
        }
        if ($object->isInitialized('cpuPeriod') && null !== $object->getCpuPeriod()) {
            $data['CpuPeriod'] = $object->getCpuPeriod();
        }
        if ($object->isInitialized('cpuQuota') && null !== $object->getCpuQuota()) {
            $data['CpuQuota'] = $object->getCpuQuota();
        }
        if ($object->isInitialized('cpuRealtimePeriod') && null !== $object->getCpuRealtimePeriod()) {
            $data['CpuRealtimePeriod'] = $object->getCpuRealtimePeriod();
        }
        if ($object->isInitialized('cpuRealtimeRuntime') && null !== $object->getCpuRealtimeRuntime()) {
            $data['CpuRealtimeRuntime'] = $object->getCpuRealtimeRuntime();
        }
        if ($object->isInitialized('cpusetCpus') && null !== $object->getCpusetCpus()) {
            $data['CpusetCpus'] = $object->getCpusetCpus();
        }
        if ($object->isInitialized('cpusetMems') && null !== $object->getCpusetMems()) {
            $data['CpusetMems'] = $object->getCpusetMems();
        }
        if ($object->isInitialized('devices') && null !== $object->getDevices()) {
            $values_5 = array();
            foreach ($object->getDevices() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Devices'] = $values_5;
        }
        if ($object->isInitialized('deviceCgroupRules') && null !== $object->getDeviceCgroupRules()) {
            $values_6 = array();
            foreach ($object->getDeviceCgroupRules() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['DeviceCgroupRules'] = $values_6;
        }
        if ($object->isInitialized('deviceRequests') && null !== $object->getDeviceRequests()) {
            $values_7 = array();
            foreach ($object->getDeviceRequests() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['DeviceRequests'] = $values_7;
        }
        if ($object->isInitialized('kernelMemoryTCP') && null !== $object->getKernelMemoryTCP()) {
            $data['KernelMemoryTCP'] = $object->getKernelMemoryTCP();
        }
        if ($object->isInitialized('memoryReservation') && null !== $object->getMemoryReservation()) {
            $data['MemoryReservation'] = $object->getMemoryReservation();
        }
        if ($object->isInitialized('memorySwap') && null !== $object->getMemorySwap()) {
            $data['MemorySwap'] = $object->getMemorySwap();
        }
        if ($object->isInitialized('memorySwappiness') && null !== $object->getMemorySwappiness()) {
            $data['MemorySwappiness'] = $object->getMemorySwappiness();
        }
        if ($object->isInitialized('nanoCpus') && null !== $object->getNanoCpus()) {
            $data['NanoCpus'] = $object->getNanoCpus();
        }
        if ($object->isInitialized('oomKillDisable') && null !== $object->getOomKillDisable()) {
            $data['OomKillDisable'] = $object->getOomKillDisable();
        }
        if ($object->isInitialized('init') && null !== $object->getInit()) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('pidsLimit') && null !== $object->getPidsLimit()) {
            $data['PidsLimit'] = $object->getPidsLimit();
        }
        if ($object->isInitialized('ulimits') && null !== $object->getUlimits()) {
            $values_8 = array();
            foreach ($object->getUlimits() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Ulimits'] = $values_8;
        }
        if ($object->isInitialized('cpuCount') && null !== $object->getCpuCount()) {
            $data['CpuCount'] = $object->getCpuCount();
        }
        if ($object->isInitialized('cpuPercent') && null !== $object->getCpuPercent()) {
            $data['CpuPercent'] = $object->getCpuPercent();
        }
        if ($object->isInitialized('iOMaximumIOps') && null !== $object->getIOMaximumIOps()) {
            $data['IOMaximumIOps'] = $object->getIOMaximumIOps();
        }
        if ($object->isInitialized('iOMaximumBandwidth') && null !== $object->getIOMaximumBandwidth()) {
            $data['IOMaximumBandwidth'] = $object->getIOMaximumBandwidth();
        }
        if ($object->isInitialized('binds') && null !== $object->getBinds()) {
            $values_9 = array();
            foreach ($object->getBinds() as $value_9) {
                $values_9[] = $value_9;
            }
            $data['Binds'] = $values_9;
        }
        if ($object->isInitialized('containerIDFile') && null !== $object->getContainerIDFile()) {
            $data['ContainerIDFile'] = $object->getContainerIDFile();
        }
        if ($object->isInitialized('logConfig') && null !== $object->getLogConfig()) {
            $data['LogConfig'] = $this->normalizer->normalize($object->getLogConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkMode') && null !== $object->getNetworkMode()) {
            $data['NetworkMode'] = $object->getNetworkMode();
        }
        if ($object->isInitialized('portBindings') && null !== $object->getPortBindings()) {
            $values_10 = array();
            foreach ($object->getPortBindings() as $key => $value_10) {
                $values_11 = array();
                foreach ($value_10 as $value_11) {
                    $values_11[] = $this->normalizer->normalize($value_11, 'json', $context);
                }
                $values_10[$key] = $values_11;
            }
            $data['PortBindings'] = $values_10;
        }
        if ($object->isInitialized('restartPolicy') && null !== $object->getRestartPolicy()) {
            $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
        }
        if ($object->isInitialized('autoRemove') && null !== $object->getAutoRemove()) {
            $data['AutoRemove'] = $object->getAutoRemove();
        }
        if ($object->isInitialized('volumeDriver') && null !== $object->getVolumeDriver()) {
            $data['VolumeDriver'] = $object->getVolumeDriver();
        }
        if ($object->isInitialized('volumesFrom') && null !== $object->getVolumesFrom()) {
            $values_12 = array();
            foreach ($object->getVolumesFrom() as $value_12) {
                $values_12[] = $value_12;
            }
            $data['VolumesFrom'] = $values_12;
        }
        if ($object->isInitialized('mounts') && null !== $object->getMounts()) {
            $values_13 = array();
            foreach ($object->getMounts() as $value_13) {
                $values_13[] = $this->normalizer->normalize($value_13, 'json', $context);
            }
            $data['Mounts'] = $values_13;
        }
        if ($object->isInitialized('consoleSize') && null !== $object->getConsoleSize()) {
            $values_14 = array();
            foreach ($object->getConsoleSize() as $value_14) {
                $values_14[] = $value_14;
            }
            $data['ConsoleSize'] = $values_14;
        }
        if ($object->isInitialized('annotations') && null !== $object->getAnnotations()) {
            $values_15 = array();
            foreach ($object->getAnnotations() as $key_1 => $value_15) {
                $values_15[$key_1] = $value_15;
            }
            $data['Annotations'] = $values_15;
        }
        if ($object->isInitialized('capAdd') && null !== $object->getCapAdd()) {
            $values_16 = array();
            foreach ($object->getCapAdd() as $value_16) {
                $values_16[] = $value_16;
            }
            $data['CapAdd'] = $values_16;
        }
        if ($object->isInitialized('capDrop') && null !== $object->getCapDrop()) {
            $values_17 = array();
            foreach ($object->getCapDrop() as $value_17) {
                $values_17[] = $value_17;
            }
            $data['CapDrop'] = $values_17;
        }
        if ($object->isInitialized('cgroupnsMode') && null !== $object->getCgroupnsMode()) {
            $data['CgroupnsMode'] = $object->getCgroupnsMode();
        }
        if ($object->isInitialized('dns') && null !== $object->getDns()) {
            $values_18 = array();
            foreach ($object->getDns() as $value_18) {
                $values_18[] = $value_18;
            }
            $data['Dns'] = $values_18;
        }
        if ($object->isInitialized('dnsOptions') && null !== $object->getDnsOptions()) {
            $values_19 = array();
            foreach ($object->getDnsOptions() as $value_19) {
                $values_19[] = $value_19;
            }
            $data['DnsOptions'] = $values_19;
        }
        if ($object->isInitialized('dnsSearch') && null !== $object->getDnsSearch()) {
            $values_20 = array();
            foreach ($object->getDnsSearch() as $value_20) {
                $values_20[] = $value_20;
            }
            $data['DnsSearch'] = $values_20;
        }
        if ($object->isInitialized('extraHosts') && null !== $object->getExtraHosts()) {
            $values_21 = array();
            foreach ($object->getExtraHosts() as $value_21) {
                $values_21[] = $value_21;
            }
            $data['ExtraHosts'] = $values_21;
        }
        if ($object->isInitialized('groupAdd') && null !== $object->getGroupAdd()) {
            $values_22 = array();
            foreach ($object->getGroupAdd() as $value_22) {
                $values_22[] = $value_22;
            }
            $data['GroupAdd'] = $values_22;
        }
        if ($object->isInitialized('ipcMode') && null !== $object->getIpcMode()) {
            $data['IpcMode'] = $object->getIpcMode();
        }
        if ($object->isInitialized('cgroup') && null !== $object->getCgroup()) {
            $data['Cgroup'] = $object->getCgroup();
        }
        if ($object->isInitialized('links') && null !== $object->getLinks()) {
            $values_23 = array();
            foreach ($object->getLinks() as $value_23) {
                $values_23[] = $value_23;
            }
            $data['Links'] = $values_23;
        }
        if ($object->isInitialized('oomScoreAdj') && null !== $object->getOomScoreAdj()) {
            $data['OomScoreAdj'] = $object->getOomScoreAdj();
        }
        if ($object->isInitialized('pidMode') && null !== $object->getPidMode()) {
            $data['PidMode'] = $object->getPidMode();
        }
        if ($object->isInitialized('privileged') && null !== $object->getPrivileged()) {
            $data['Privileged'] = $object->getPrivileged();
        }
        if ($object->isInitialized('publishAllPorts') && null !== $object->getPublishAllPorts()) {
            $data['PublishAllPorts'] = $object->getPublishAllPorts();
        }
        if ($object->isInitialized('readonlyRootfs') && null !== $object->getReadonlyRootfs()) {
            $data['ReadonlyRootfs'] = $object->getReadonlyRootfs();
        }
        if ($object->isInitialized('securityOpt') && null !== $object->getSecurityOpt()) {
            $values_24 = array();
            foreach ($object->getSecurityOpt() as $value_24) {
                $values_24[] = $value_24;
            }
            $data['SecurityOpt'] = $values_24;
        }
        if ($object->isInitialized('storageOpt') && null !== $object->getStorageOpt()) {
            $values_25 = array();
            foreach ($object->getStorageOpt() as $key_2 => $value_25) {
                $values_25[$key_2] = $value_25;
            }
            $data['StorageOpt'] = $values_25;
        }
        if ($object->isInitialized('tmpfs') && null !== $object->getTmpfs()) {
            $values_26 = array();
            foreach ($object->getTmpfs() as $key_3 => $value_26) {
                $values_26[$key_3] = $value_26;
            }
            $data['Tmpfs'] = $values_26;
        }
        if ($object->isInitialized('uTSMode') && null !== $object->getUTSMode()) {
            $data['UTSMode'] = $object->getUTSMode();
        }
        if ($object->isInitialized('usernsMode') && null !== $object->getUsernsMode()) {
            $data['UsernsMode'] = $object->getUsernsMode();
        }
        if ($object->isInitialized('shmSize') && null !== $object->getShmSize()) {
            $data['ShmSize'] = $object->getShmSize();
        }
        if ($object->isInitialized('sysctls') && null !== $object->getSysctls()) {
            $values_27 = array();
            foreach ($object->getSysctls() as $key_4 => $value_27) {
                $values_27[$key_4] = $value_27;
            }
            $data['Sysctls'] = $values_27;
        }
        if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
            $data['Runtime'] = $object->getRuntime();
        }
        if ($object->isInitialized('isolation') && null !== $object->getIsolation()) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('maskedPaths') && null !== $object->getMaskedPaths()) {
            $values_28 = array();
            foreach ($object->getMaskedPaths() as $value_28) {
                $values_28[] = $value_28;
            }
            $data['MaskedPaths'] = $values_28;
        }
        if ($object->isInitialized('readonlyPaths') && null !== $object->getReadonlyPaths()) {
            $values_29 = array();
            foreach ($object->getReadonlyPaths() as $value_29) {
                $values_29[] = $value_29;
            }
            $data['ReadonlyPaths'] = $values_29;
        }
        foreach ($object as $key_5 => $value_30) {
            if (preg_match('/.*/', (string) $key_5)) {
                $data[$key_5] = $value_30;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Mdshack\\Docker\\API$NAMESPACE\\Model\\HostConfig' => false);
    }
}