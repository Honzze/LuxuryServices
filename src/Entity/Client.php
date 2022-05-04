<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameCompany;

    #[ORM\Column(type: 'string', length: 255)]
    private $activityType;

    #[ORM\Column(type: 'string', length: 255)]
    private $poste;

    #[ORM\Column(type: 'string', length: 255)]
    private $numberOfContact;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameOfContact;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailOfContact;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: JobOffer::class, orphanRemoval: true)]
    private $jobOffers;

    public function __construct()
    {
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCompany(): ?string
    {
        return $this->nameCompany;
    }

    public function setNameCompany(string $nameCompany): self
    {
        $this->nameCompany = $nameCompany;

        return $this;
    }

    public function getActivityType(): ?string
    {
        return $this->activityType;
    }

    public function setActivityType(string $activityType): self
    {
        $this->activityType = $activityType;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getNumberOfContact(): ?string
    {
        return $this->numberOfContact;
    }

    public function setNumberOfContact(string $numberOfContact): self
    {
        $this->numberOfContact = $numberOfContact;

        return $this;
    }

    public function getNameOfContact(): ?string
    {
        return $this->nameOfContact;
    }

    public function setNameOfContact(string $nameOfContact): self
    {
        $this->nameOfContact = $nameOfContact;

        return $this;
    }

    public function getEmailOfContact(): ?string
    {
        return $this->emailOfContact;
    }

    public function setEmailOfContact(string $emailOfContact): self
    {
        $this->emailOfContact = $emailOfContact;

        return $this;
    }

    /**
     * @return Collection<int, JobOffer>
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setClient($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getClient() === $this) {
                $jobOffer->setClient(null);
            }
        }

        return $this;
    }
}
