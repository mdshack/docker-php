<?php

namespace Mdshack\Docker\API\v1_40\Model;

class TaskSpecContainerSpecPrivileges extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * CredentialSpec for managed service account (Windows only)
     *
     * @var TaskSpecContainerSpecPrivilegesCredentialSpec
     */
    protected $credentialSpec;

    /**
     * SELinux labels of the container
     *
     * @var TaskSpecContainerSpecPrivilegesSELinuxContext
     */
    protected $sELinuxContext;

    /**
     * CredentialSpec for managed service account (Windows only)
     */
    public function getCredentialSpec(): TaskSpecContainerSpecPrivilegesCredentialSpec
    {
        return $this->credentialSpec;
    }

    /**
     * CredentialSpec for managed service account (Windows only)
     */
    public function setCredentialSpec(TaskSpecContainerSpecPrivilegesCredentialSpec $credentialSpec): self
    {
        $this->initialized['credentialSpec'] = true;
        $this->credentialSpec = $credentialSpec;

        return $this;
    }

    /**
     * SELinux labels of the container
     */
    public function getSELinuxContext(): TaskSpecContainerSpecPrivilegesSELinuxContext
    {
        return $this->sELinuxContext;
    }

    /**
     * SELinux labels of the container
     */
    public function setSELinuxContext(TaskSpecContainerSpecPrivilegesSELinuxContext $sELinuxContext): self
    {
        $this->initialized['sELinuxContext'] = true;
        $this->sELinuxContext = $sELinuxContext;

        return $this;
    }
}
