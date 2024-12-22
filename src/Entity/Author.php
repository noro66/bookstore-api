<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents an author of a book or article.
 */
#[ORM\Entity(repositoryClass: AuthorRepository::class)]
#[ApiResource]
class Author
{
    /**
     * The ID of this author.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * The first name of the author.
     *
     * @Assert\NotBlank(message="First name cannot be blank.")
     * @Assert\Length(max=50, maxMessage="First name cannot be longer than 50 characters.")
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "First name cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "First name cannot be longer than 50 characters.")]
    private ?string $firstName = null;

    /**
     * The last name of the author.
     *
     * @Assert\NotBlank(message="Last name cannot be blank.")
     * @Assert\Length(max=50, maxMessage="Last name cannot be longer than 50 characters.")
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Last name cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "Last name cannot be longer than 50 characters.")]
    private ?string $lastName = null;

    /**
     * The bibliography type of the author .
     *
     * @Assert\NotBlank(message="Bibliography cannot be blank.")
     * @Assert\Length(max=50, maxMessage="Bibliography cannot be longer than 50 characters.")
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Bibliography cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "Bibliography cannot be longer than 50 characters.")]
    private ?string $bibliography = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBibliography(): ?string
    {
        return $this->bibliography;
    }

    public function setBibliography(string $bibliography): static
    {
        $this->bibliography = $bibliography;
        return $this;
    }
}
