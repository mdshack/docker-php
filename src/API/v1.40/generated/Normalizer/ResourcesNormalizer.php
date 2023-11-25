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

class ResourcesNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\Resources';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\Resources';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\Resources();
        if ($data === null || \is_array($data) === false) {
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
            $values = [];
            foreach ($data['BlkioWeightDevice'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_40\\Model\\ResourcesBlkioWeightDeviceItem', 'json', $context);
            }
            $object->setBlkioWeightDevice($values);
            unset($data['BlkioWeightDevice']);
        }
        if (\array_key_exists('BlkioDeviceReadBps', $data)) {
            $values_1 = [];
            foreach ($data['BlkioDeviceReadBps'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Mdshack\\Docker\\API\\v1_40\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadBps($values_1);
            unset($data['BlkioDeviceReadBps']);
        }
        if (\array_key_exists('BlkioDeviceWriteBps', $data)) {
            $values_2 = [];
            foreach ($data['BlkioDeviceWriteBps'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Mdshack\\Docker\\API\\v1_40\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceWriteBps($values_2);
            unset($data['BlkioDeviceWriteBps']);
        }
        if (\array_key_exists('BlkioDeviceReadIOps', $data)) {
            $values_3 = [];
            foreach ($data['BlkioDeviceReadIOps'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Mdshack\\Docker\\API\\v1_40\\Model\\ThrottleDevice', 'json', $context);
            }
            $object->setBlkioDeviceReadIOps($values_3);
            unset($data['BlkioDeviceReadIOps']);
        }
        if (\array_key_exists('BlkioDeviceWriteIOps', $data)) {
            $values_4 = [];
            foreach ($data['BlkioDeviceWriteIOps'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Mdshack\\Docker\\API\\v1_40\\Model\\ThrottleDevice', 'json', $context);
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
            $values_5 = [];
            foreach ($data['Devices'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Mdshack\\Docker\\API\\v1_40\\Model\\DeviceMapping', 'json', $context);
            }
            $object->setDevices($values_5);
            unset($data['Devices']);
        }
        if (\array_key_exists('DeviceCgroupRules', $data)) {
            $values_6 = [];
            foreach ($data['DeviceCgroupRules'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setDeviceCgroupRules($values_6);
            unset($data['DeviceCgroupRules']);
        }
        if (\array_key_exists('DeviceRequests', $data)) {
            $values_7 = [];
            foreach ($data['DeviceRequests'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Mdshack\\Docker\\API\\v1_40\\Model\\DeviceRequest', 'json', $context);
            }
            $object->setDeviceRequests($values_7);
            unset($data['DeviceRequests']);
        }
        if (\array_key_exists('KernelMemory', $data)) {
            $object->setKernelMemory($data['KernelMemory']);
            unset($data['KernelMemory']);
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
        } elseif (\array_key_exists('Init', $data) && $data['Init'] === null) {
            $object->setInit(null);
        }
        if (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] !== null) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        } elseif (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] === null) {
            $object->setPidsLimit(null);
        }
        if (\array_key_exists('Ulimits', $data)) {
            $values_8 = [];
            foreach ($data['Ulimits'] as $value_8) {
                $values_8[] = $this->denormalizer->denormalize($value_8, 'Mdshack\\Docker\\API\\v1_40\\Model\\ResourcesUlimitsItem', 'json', $context);
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
        foreach ($data as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_9;
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
        if ($object->isInitialized('cpuShares') && $object->getCpuShares() !== null) {
            $data['CpuShares'] = $object->getCpuShares();
        }
        if ($object->isInitialized('memory') && $object->getMemory() !== null) {
            $data['Memory'] = $object->getMemory();
        }
        if ($object->isInitialized('cgroupParent') && $object->getCgroupParent() !== null) {
            $data['CgroupParent'] = $object->getCgroupParent();
        }
        if ($object->isInitialized('blkioWeight') && $object->getBlkioWeight() !== null) {
            $data['BlkioWeight'] = $object->getBlkioWeight();
        }
        if ($object->isInitialized('blkioWeightDevice') && $object->getBlkioWeightDevice() !== null) {
            $values = [];
            foreach ($object->getBlkioWeightDevice() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['BlkioWeightDevice'] = $values;
        }
        if ($object->isInitialized('blkioDeviceReadBps') && $object->getBlkioDeviceReadBps() !== null) {
            $values_1 = [];
            foreach ($object->getBlkioDeviceReadBps() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['BlkioDeviceReadBps'] = $values_1;
        }
        if ($object->isInitialized('blkioDeviceWriteBps') && $object->getBlkioDeviceWriteBps() !== null) {
            $values_2 = [];
            foreach ($object->getBlkioDeviceWriteBps() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['BlkioDeviceWriteBps'] = $values_2;
        }
        if ($object->isInitialized('blkioDeviceReadIOps') && $object->getBlkioDeviceReadIOps() !== null) {
            $values_3 = [];
            foreach ($object->getBlkioDeviceReadIOps() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['BlkioDeviceReadIOps'] = $values_3;
        }
        if ($object->isInitialized('blkioDeviceWriteIOps') && $object->getBlkioDeviceWriteIOps() !== null) {
            $values_4 = [];
            foreach ($object->getBlkioDeviceWriteIOps() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['BlkioDeviceWriteIOps'] = $values_4;
        }
        if ($object->isInitialized('cpuPeriod') && $object->getCpuPeriod() !== null) {
            $data['CpuPeriod'] = $object->getCpuPeriod();
        }
        if ($object->isInitialized('cpuQuota') && $object->getCpuQuota() !== null) {
            $data['CpuQuota'] = $object->getCpuQuota();
        }
        if ($object->isInitialized('cpuRealtimePeriod') && $object->getCpuRealtimePeriod() !== null) {
            $data['CpuRealtimePeriod'] = $object->getCpuRealtimePeriod();
        }
        if ($object->isInitialized('cpuRealtimeRuntime') && $object->getCpuRealtimeRuntime() !== null) {
            $data['CpuRealtimeRuntime'] = $object->getCpuRealtimeRuntime();
        }
        if ($object->isInitialized('cpusetCpus') && $object->getCpusetCpus() !== null) {
            $data['CpusetCpus'] = $object->getCpusetCpus();
        }
        if ($object->isInitialized('cpusetMems') && $object->getCpusetMems() !== null) {
            $data['CpusetMems'] = $object->getCpusetMems();
        }
        if ($object->isInitialized('devices') && $object->getDevices() !== null) {
            $values_5 = [];
            foreach ($object->getDevices() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['Devices'] = $values_5;
        }
        if ($object->isInitialized('deviceCgroupRules') && $object->getDeviceCgroupRules() !== null) {
            $values_6 = [];
            foreach ($object->getDeviceCgroupRules() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['DeviceCgroupRules'] = $values_6;
        }
        if ($object->isInitialized('deviceRequests') && $object->getDeviceRequests() !== null) {
            $values_7 = [];
            foreach ($object->getDeviceRequests() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['DeviceRequests'] = $values_7;
        }
        if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
            $data['KernelMemory'] = $object->getKernelMemory();
        }
        if ($object->isInitialized('kernelMemoryTCP') && $object->getKernelMemoryTCP() !== null) {
            $data['KernelMemoryTCP'] = $object->getKernelMemoryTCP();
        }
        if ($object->isInitialized('memoryReservation') && $object->getMemoryReservation() !== null) {
            $data['MemoryReservation'] = $object->getMemoryReservation();
        }
        if ($object->isInitialized('memorySwap') && $object->getMemorySwap() !== null) {
            $data['MemorySwap'] = $object->getMemorySwap();
        }
        if ($object->isInitialized('memorySwappiness') && $object->getMemorySwappiness() !== null) {
            $data['MemorySwappiness'] = $object->getMemorySwappiness();
        }
        if ($object->isInitialized('nanoCpus') && $object->getNanoCpus() !== null) {
            $data['NanoCpus'] = $object->getNanoCpus();
        }
        if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
            $data['OomKillDisable'] = $object->getOomKillDisable();
        }
        if ($object->isInitialized('init') && $object->getInit() !== null) {
            $data['Init'] = $object->getInit();
        }
        if ($object->isInitialized('pidsLimit') && $object->getPidsLimit() !== null) {
            $data['PidsLimit'] = $object->getPidsLimit();
        }
        if ($object->isInitialized('ulimits') && $object->getUlimits() !== null) {
            $values_8 = [];
            foreach ($object->getUlimits() as $value_8) {
                $values_8[] = $this->normalizer->normalize($value_8, 'json', $context);
            }
            $data['Ulimits'] = $values_8;
        }
        if ($object->isInitialized('cpuCount') && $object->getCpuCount() !== null) {
            $data['CpuCount'] = $object->getCpuCount();
        }
        if ($object->isInitialized('cpuPercent') && $object->getCpuPercent() !== null) {
            $data['CpuPercent'] = $object->getCpuPercent();
        }
        if ($object->isInitialized('iOMaximumIOps') && $object->getIOMaximumIOps() !== null) {
            $data['IOMaximumIOps'] = $object->getIOMaximumIOps();
        }
        if ($object->isInitialized('iOMaximumBandwidth') && $object->getIOMaximumBandwidth() !== null) {
            $data['IOMaximumBandwidth'] = $object->getIOMaximumBandwidth();
        }
        foreach ($object as $key => $value_9) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_9;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\Resources' => false];
    }
}
