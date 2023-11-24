<?php

namespace Mdshack\Docker\API\v1_41\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\CheckArray;
use Mdshack\Docker\API\v1_41\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SwarmJoinPostBodyNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_41\\Model\\SwarmJoinPostBody';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_41\\Model\\SwarmJoinPostBody';
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
        $object = new \Mdshack\Docker\API\v1_41\Model\SwarmJoinPostBody();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('ListenAddr', $data)) {
            $object->setListenAddr($data['ListenAddr']);
            unset($data['ListenAddr']);
        }
        if (\array_key_exists('AdvertiseAddr', $data)) {
            $object->setAdvertiseAddr($data['AdvertiseAddr']);
            unset($data['AdvertiseAddr']);
        }
        if (\array_key_exists('DataPathAddr', $data)) {
            $object->setDataPathAddr($data['DataPathAddr']);
            unset($data['DataPathAddr']);
        }
        if (\array_key_exists('RemoteAddrs', $data)) {
            $values = [];
            foreach ($data['RemoteAddrs'] as $value) {
                $values[] = $value;
            }
            $object->setRemoteAddrs($values);
            unset($data['RemoteAddrs']);
        }
        if (\array_key_exists('JoinToken', $data)) {
            $object->setJoinToken($data['JoinToken']);
            unset($data['JoinToken']);
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
        if ($object->isInitialized('listenAddr') && $object->getListenAddr() !== null) {
            $data['ListenAddr'] = $object->getListenAddr();
        }
        if ($object->isInitialized('advertiseAddr') && $object->getAdvertiseAddr() !== null) {
            $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
        }
        if ($object->isInitialized('dataPathAddr') && $object->getDataPathAddr() !== null) {
            $data['DataPathAddr'] = $object->getDataPathAddr();
        }
        if ($object->isInitialized('remoteAddrs') && $object->getRemoteAddrs() !== null) {
            $values = [];
            foreach ($object->getRemoteAddrs() as $value) {
                $values[] = $value;
            }
            $data['RemoteAddrs'] = $values;
        }
        if ($object->isInitialized('joinToken') && $object->getJoinToken() !== null) {
            $data['JoinToken'] = $object->getJoinToken();
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
        return ['Mdshack\\Docker\\API\\v1_41\\Model\\SwarmJoinPostBody' => false];
    }
}
