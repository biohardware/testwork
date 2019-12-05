<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $lead;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $updateBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $extraFeed;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLead(): ?string
    {
        return $this->lead;
    }

    public function setLead(string $lead): self
    {
        $this->lead = $lead;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }


    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdateBy(): ?User
    {
        return $this->updateBy;
    }

    public function setUpdateBy(?User $updateBy): self
    {
        $this->updateBy = $updateBy;

        return $this;
    }

    public function getExtraFeed(): ?string
    {
        return $this->extraFeed;
    }

    public function setExtraFeed(?string $extraFeed): self
    {
        $this->extraFeed = $extraFeed;

        return $this;
    }


}
