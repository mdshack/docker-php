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

class SwarmInfoNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_42\\Model\\SwarmInfo';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_42\\Model\\SwarmInfo';
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
        $object = new \Mdshack\Docker\API\v1_42\Model\SwarmInfo();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('NodeID', $data)) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        }
        if (\array_key_exists('NodeAddr', $data)) {
            $object->setNodeAddr($data['NodeAddr']);
            unset($data['NodeAddr']);
        }
        if (\array_key_exists('LocalNodeState', $data)) {
            $object->setLocalNodeState($data['LocalNodeState']);
            unset($data['LocalNodeState']);
        }
        if (\array_key_exists('ControlAvailable', $data)) {
            $object->setControlAvailable($data['ControlAvailable']);
            unset($data['ControlAvailable']);
        }
        if (\array_key_exists('Error', $data)) {
            $object->setError($data['Error']);
            unset($data['Error']);
        }
        if (\array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] !== null) {
            $values = [];
            foreach ($data['RemoteManagers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Mdshack\\Docker\\API\\v1_42\\Model\\PeerNode', 'json', $context);
            }
            $object->setRemoteManagers($values);
            unset($data['RemoteManagers']);
        } elseif (\array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] === null) {
            $object->setRemoteManagers(null);
        }
        if (\array_key_exists('Nodes', $data) && $data['Nodes'] !== null) {
            $object->setNodes($data['Nodes']);
            unset($data['Nodes']);
        } elseif (\array_key_exists('Nodes', $data) && $data['Nodes'] === null) {
            $object->setNodes(null);
        }
        if (\array_key_exists('Managers', $data) && $data['Managers'] !== null) {
            $object->setManagers($data['Managers']);
            unset($data['Managers']);
        } elseif (\array_key_exists('Managers', $data) && $data['Managers'] === null) {
            $object->setManagers(null);
        }
        if (\array_key_exists('Cluster', $data) && $data['Cluster'] !== null) {
            $object->setCluster($this->denormalizer->denormalize($data['Cluster'], 'Mdshack\\Docker\\API\\v1_42\\Model\\ClusterInfo', 'json', $context));
            unset($data['Cluster']);
        } elseif (\array_key_exists('Cluster', $data) && $data['Cluster'] === null) {
            $object->setCluster(null);
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
        if ($object->isInitialized('nodeID') && $object->getNodeID() !== null) {
            $data['NodeID'] = $object->getNodeID();
        }
        if ($object->isInitialized('nodeAddr') && $object->getNodeAddr() !== null) {
            $data['NodeAddr'] = $object->getNodeAddr();
        }
        if ($object->isInitialized('localNodeState') && $object->getLocalNodeState() !== null) {
            $data['LocalNodeState'] = $object->getLocalNodeState();
        }
        if ($object->isInitialized('controlAvailable') && $object->getControlAvailable() !== null) {
            $data['ControlAvailable'] = $object->getControlAvailable();
        }
        if ($object->isInitialized('error') && $object->getError() !== null) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('remoteManagers') && $object->getRemoteManagers() !== null) {
            $values = [];
            foreach ($object->getRemoteManagers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['RemoteManagers'] = $values;
        }
        if ($object->isInitialized('nodes') && $object->getNodes() !== null) {
            $data['Nodes'] = $object->getNodes();
        }
        if ($object->isInitialized('managers') && $object->getManagers() !== null) {
            $data['Managers'] = $object->getManagers();
        }
        if ($object->isInitialized('cluster') && $object->getCluster() !== null) {
            $data['Cluster'] = $this->normalizer->normalize($object->getCluster(), 'json', $context);
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
        return ['Mdshack\\Docker\\API\\v1_42\\Model\\SwarmInfo' => false];
    }
}
