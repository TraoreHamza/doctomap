<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DoctorRepository;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctorRepository::class)]
#[ApiResource]

#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['city' => 'partial', 'speciality' => 'partial'])]
class Doctor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 50)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 50)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $speciality = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 50)]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z\s]+$/',
        message: 'Le city doit contenir uniquement des lettres et des espaces'
    )]
    private ?string $city = null;

    #[ORM\Column(length: 5)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 5)]
    #[Assert\Regex(
        pattern: '/^\d{5}$/',
        message: 'le code postal doit contenir 5 chiffres.'
    )]
    private ?string $zip = null;

    #[ORM\Column(length: 12, nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 12)]
    #[Assert\Regex(
        pattern: '/^\d{10,12}$/',
        message: 'Le numéro de téléphone doit contenir entre 10 et 12 chiffres.'
    )]
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(string $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): static
    {
        $this->zip = $zip;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
