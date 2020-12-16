<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogRepository::class)
 */
class Blog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @ORM\ManyToMany(targetEntity=Blogreply::class, inversedBy="blogs")
     */
    private $blogreply;

    /**
     * @ORM\ManyToMany(targetEntity=Blogcategory::class, inversedBy="blogs")
     */
    private $blogcategory;

    public function __construct()
    {
        $this->blogreply = new ArrayCollection();
        $this->blogcategory = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * @return Collection|blogreply[]
     */
    public function getBlogreply(): Collection
    {
        return $this->blogreply;
    }

    public function addBlogreply(blogreply $blogreply): self
    {
        if (!$this->blogreply->contains($blogreply)) {
            $this->blogreply[] = $blogreply;
        }

        return $this;
    }

    public function removeBlogreply(blogreply $blogreply): self
    {
        $this->blogreply->removeElement($blogreply);

        return $this;
    }

    /**
     * @return Collection|blogcategory[]
     */
    public function getBlogcategory(): Collection
    {
        return $this->blogcategory;
    }

    public function addBlogcategory(blogcategory $blogcategory): self
    {
        if (!$this->blogcategory->contains($blogcategory)) {
            $this->blogcategory[] = $blogcategory;
        }

        return $this;
    }

    public function removeBlogcategory(blogcategory $blogcategory): self
    {
        $this->blogcategory->removeElement($blogcategory);

        return $this;
    }
}
