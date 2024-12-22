<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Represents a book.
 */
#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource]
class Book
{
    /**
     * The ID of this book.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * The title of the book.
     *
     * #[Assert\NotBlank(message="Title cannot be blank.")]
     * #[Assert\Length(max: 50, maxMessage="Title cannot be longer than 50 characters.")]
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Title cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "Title cannot be longer than 50 characters.")]
    private ?string $title = null;

    /**
     * The description of the book.
     *
     * #[Assert\NotBlank(message="Description cannot be blank.")]
     * #[Assert\Length(max: 500, maxMessage="Description cannot be longer than 500 characters.")]
     */
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Description cannot be blank.")]
    #[Assert\Length(max: 500, maxMessage: "Description cannot be longer than 500 characters.")]
    private ?string $description = null;

    /**
     * The publication date of the book.
     *
     * #[Assert\NotBlank(message="Publication date cannot be blank.")]
     * #[Assert\Type(type="DateTimeInterface", message="Publication date should be a valid date.")]
     */
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: "Publication date cannot be blank.")]
    #[Assert\Type(type: "DateTimeInterface", message: "Publication date should be a valid date.")]
    private ?\DateTimeInterface $publicationDate = null;

    /**
     * The genre of the book.
     *
     * #[Assert\NotBlank(message="Genre cannot be blank.")]
     * #[Assert\Length(max: 50, maxMessage="Genre cannot be longer than 50 characters.")]
     */
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Genre cannot be blank.")]
    #[Assert\Length(max: 50, maxMessage: "Genre cannot be longer than 50 characters.")]
    private ?string $genre = null;

    /**
     * The author of the book.
     *
     * #[Assert\NotBlank(message="Author cannot be blank.")]
     */
    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: "Author cannot be blank.")]
    private ?Author $author = null;

    /**
     * @var Collection<int, Review>
     */
    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'book')]
    private Collection $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): static
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;
        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setBook($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getBook() === $this) {
                $review->setBook(null);
            }
        }

        return $this;
    }
}
