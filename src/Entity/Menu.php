<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
    private $plat;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity=Catfood::class, mappedBy="menu")
     */
    private $catfood;

    public function __construct()
    {
        $this->catfood = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(string $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

    /**
     * @return Collection|catfood[]
     */
    public function getCatfood(): Collection
    {
        return $this->catfood;
    }

    public function addCatfood(catfood $catfood): self
    {
        if (!$this->catfood->contains($catfood)) {
            $this->catfood[] = $catfood;
            $catfood->setMenu($this);
        }

        return $this;
    }

    public function removeCatfood(catfood $catfood): self
    {
        if ($this->catfood->removeElement($catfood)) {
            // set the owning side to null (unless already changed)
            if ($catfood->getMenu() === $this) {
                $catfood->setMenu(null);
            }
        }

        return $this;
    }
}
