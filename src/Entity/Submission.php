<?php

namespace App\Entity;

use App\Repository\SubmissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubmissionRepository::class)]
class Submission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'submissions')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: JobOffer::class, inversedBy: 'submissions')]
    private $offer;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $userName;

    #[ORM\Column(type: 'string', length: 255)]
    private $userEmail;

    #[ORM\Column(type: 'string', length: 255)]
    private $offerTitle;

    #[ORM\Column(type: 'string', length: 255)]
    private $sociatyName;

    #[ORM\Column(type: 'string', length: 255)]
    private $contactName;

    #[ORM\Column(type: 'string', length: 255)]
    private $contactEmail;

    #[ORM\Column(type: 'date')]
    private $dateOfSubmission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOffer(): ?JobOffer
    {
        return $this->offer;
    }

    public function setOffer(?JobOffer $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getOfferTitle(): ?string
    {
        return $this->offerTitle;
    }

    public function setOfferTitle(string $offerTitle): self
    {
        $this->offerTitle = $offerTitle;

        return $this;
    }

    public function getSociatyName(): ?string
    {
        return $this->sociatyName;
    }

    public function setSociatyName(string $sociatyName): self
    {
        $this->sociatyName = $sociatyName;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }

    public function getDateOfSubmission(): ?\DateTimeInterface
    {
        return $this->dateOfSubmission;
    }

    public function setDateOfSubmission(\DateTimeInterface $dateOfSubmission): self
    {
        $this->dateOfSubmission = $dateOfSubmission;

        return $this;
    }
}
