<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a review for a book.
 */
#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    /**
     * The ID of this review.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * The full name of the reviewer.
     *
     * #[Assert\NotBlank(message="Full name cannot be blank.")]
     * #[Assert\Length(max: 50, maxMessage="Full name cannot be longer than 50 characters.")]
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Full name cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "Full name cannot be longer than 50 characters.")]
    private ?string $fullName = null;

    /**
     * The email of the reviewer.
     *
     * #[Assert\NotBlank(message="Email cannot be blank.")]
     * #[Assert\Email(message="Please provide a valid email address.")]
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Email cannot be blank.")]
    #[Assert\Email(message: "Please provide a valid email address.")]
    private ?string $email = null;

    /**
     * The comment of the reviewer.
     *
     * #[Assert\NotBlank(message="Comment cannot be blank.")]
     * #[Assert\Length(max: 1000, maxMessage="Comment cannot be longer than 1000 characters.")]
     */
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Comment cannot be blank.")]
    #[Assert\Length(max: 1000, maxMessage:"Comment cannot be longer than 1000 characters.")]
    private ?string $comment = null;

    /**
     * The creation date of the review.
     *
     * #[Assert\NotBlank(message="Creation date cannot be blank.")]
     * #[Assert\Type(type="DateTimeInterface", message="Creation date should be a valid date.")]
     */
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: "Creation date cannot be blank.")]
    #[Assert\Type(type: "DateTimeInterface", message:"Creation date should be a valid date.")]
    private ?\DateTimeInterface $creationDate = null;

    /**
     * The book associated with the review.
     *
     * #[Assert\NotNull(message="Book cannot be null.")]
     */
    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[Assert\NotNull(message: "Book cannot be null.")]
    private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): static
    {
        $this->book = $book;

        return $this;
    }
}
