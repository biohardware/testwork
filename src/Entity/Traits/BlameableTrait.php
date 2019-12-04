<?php

namespace App\Entity\Traits;
use App\Entity\User;

trait BlameableTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @Gedmo\Blameable(on="create")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @Gedmo\Blameable(on="update")
     */
    private $updatedBy;

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedBy(): ?User
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?User $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }
}