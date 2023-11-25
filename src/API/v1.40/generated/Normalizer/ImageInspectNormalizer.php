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

class ImageInspectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Mdshack\\Docker\\API\\v1_40\\Model\\ImageInspect';
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Mdshack\\Docker\\API\\v1_40\\Model\\ImageInspect';
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
        $object = new \Mdshack\Docker\API\v1_40\Model\ImageInspect();
        if ($data === null || \is_array($data) === false) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        if (\array_key_exists('RepoTags', $data)) {
            $values = [];
            foreach ($data['RepoTags'] as $value) {
                $values[] = $value;
            }
            $object->setRepoTags($values);
            unset($data['RepoTags']);
        }
        if (\array_key_exists('RepoDigests', $data)) {
            $values_1 = [];
            foreach ($data['RepoDigests'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoDigests($values_1);
            unset($data['RepoDigests']);
        }
        if (\array_key_exists('Parent', $data)) {
            $object->setParent($data['Parent']);
            unset($data['Parent']);
        }
        if (\array_key_exists('Comment', $data)) {
            $object->setComment($data['Comment']);
            unset($data['Comment']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        if (\array_key_exists('Container', $data)) {
            $object->setContainer($data['Container']);
            unset($data['Container']);
        }
        if (\array_key_exists('ContainerConfig', $data)) {
            $object->setContainerConfig($this->denormalizer->denormalize($data['ContainerConfig'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainerConfig', 'json', $context));
            unset($data['ContainerConfig']);
        }
        if (\array_key_exists('DockerVersion', $data)) {
            $object->setDockerVersion($data['DockerVersion']);
            unset($data['DockerVersion']);
        }
        if (\array_key_exists('Author', $data)) {
            $object->setAuthor($data['Author']);
            unset($data['Author']);
        }
        if (\array_key_exists('Config', $data)) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainerConfig', 'json', $context));
            unset($data['Config']);
        }
        if (\array_key_exists('Architecture', $data)) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        }
        if (\array_key_exists('Variant', $data) && $data['Variant'] !== null) {
            $object->setVariant($data['Variant']);
            unset($data['Variant']);
        } elseif (\array_key_exists('Variant', $data) && $data['Variant'] === null) {
            $object->setVariant(null);
        }
        if (\array_key_exists('Os', $data)) {
            $object->setOs($data['Os']);
            unset($data['Os']);
        }
        if (\array_key_exists('OsVersion', $data) && $data['OsVersion'] !== null) {
            $object->setOsVersion($data['OsVersion']);
            unset($data['OsVersion']);
        } elseif (\array_key_exists('OsVersion', $data) && $data['OsVersion'] === null) {
            $object->setOsVersion(null);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        if (\array_key_exists('VirtualSize', $data)) {
            $object->setVirtualSize($data['VirtualSize']);
            unset($data['VirtualSize']);
        }
        if (\array_key_exists('GraphDriver', $data)) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Mdshack\\Docker\\API\\v1_40\\Model\\GraphDriverData', 'json', $context));
            unset($data['GraphDriver']);
        }
        if (\array_key_exists('RootFS', $data)) {
            $object->setRootFS($this->denormalizer->denormalize($data['RootFS'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ImageInspectRootFS', 'json', $context));
            unset($data['RootFS']);
        }
        if (\array_key_exists('Metadata', $data)) {
            $object->setMetadata($this->denormalizer->denormalize($data['Metadata'], 'Mdshack\\Docker\\API\\v1_40\\Model\\ImageInspectMetadata', 'json', $context));
            unset($data['Metadata']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        if ($object->isInitialized('id') && $object->getId() !== null) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('repoTags') && $object->getRepoTags() !== null) {
            $values = [];
            foreach ($object->getRepoTags() as $value) {
                $values[] = $value;
            }
            $data['RepoTags'] = $values;
        }
        if ($object->isInitialized('repoDigests') && $object->getRepoDigests() !== null) {
            $values_1 = [];
            foreach ($object->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['RepoDigests'] = $values_1;
        }
        if ($object->isInitialized('parent') && $object->getParent() !== null) {
            $data['Parent'] = $object->getParent();
        }
        if ($object->isInitialized('comment') && $object->getComment() !== null) {
            $data['Comment'] = $object->getComment();
        }
        if ($object->isInitialized('created') && $object->getCreated() !== null) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('container') && $object->getContainer() !== null) {
            $data['Container'] = $object->getContainer();
        }
        if ($object->isInitialized('containerConfig') && $object->getContainerConfig() !== null) {
            $data['ContainerConfig'] = $this->normalizer->normalize($object->getContainerConfig(), 'json', $context);
        }
        if ($object->isInitialized('dockerVersion') && $object->getDockerVersion() !== null) {
            $data['DockerVersion'] = $object->getDockerVersion();
        }
        if ($object->isInitialized('author') && $object->getAuthor() !== null) {
            $data['Author'] = $object->getAuthor();
        }
        if ($object->isInitialized('config') && $object->getConfig() !== null) {
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        }
        if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
            $data['Architecture'] = $object->getArchitecture();
        }
        if ($object->isInitialized('variant') && $object->getVariant() !== null) {
            $data['Variant'] = $object->getVariant();
        }
        if ($object->isInitialized('os') && $object->getOs() !== null) {
            $data['Os'] = $object->getOs();
        }
        if ($object->isInitialized('osVersion') && $object->getOsVersion() !== null) {
            $data['OsVersion'] = $object->getOsVersion();
        }
        if ($object->isInitialized('size') && $object->getSize() !== null) {
            $data['Size'] = $object->getSize();
        }
        if ($object->isInitialized('virtualSize') && $object->getVirtualSize() !== null) {
            $data['VirtualSize'] = $object->getVirtualSize();
        }
        if ($object->isInitialized('graphDriver') && $object->getGraphDriver() !== null) {
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
        }
        if ($object->isInitialized('rootFS') && $object->getRootFS() !== null) {
            $data['RootFS'] = $this->normalizer->normalize($object->getRootFS(), 'json', $context);
        }
        if ($object->isInitialized('metadata') && $object->getMetadata() !== null) {
            $data['Metadata'] = $this->normalizer->normalize($object->getMetadata(), 'json', $context);
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Mdshack\\Docker\\API\\v1_40\\Model\\ImageInspect' => false];
    }
}
