<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IFU;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RCCM;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Produits::class, mappedBy="entreprise")
     */
    private $produits;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="entreprise", cascade={"persist", "remove"})
     */
    private $utlisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banniere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pageFaceBook;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIFU(): ?string
    {
        return $this->IFU;
    }

    public function setIFU(string $IFU): self
    {
        $this->IFU = $IFU;

        return $this;
    }

    public function getRCCM(): ?string
    {
        return $this->RCCM;
    }

    public function setRCCM(string $RCCM): self
    {
        $this->RCCM = $RCCM;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Produits>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produits $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setEntreprise($this);
        }

        return $this;
    }

    public function removeProduit(Produits $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getEntreprise() === $this) {
                $produit->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getUtlisateur(): ?User
    {
        return $this->utlisateur;
    }

    public function setUtlisateur(User $utlisateur): self
    {
        // set the owning side of the relation if necessary
        if ($utlisateur->getEntreprise() !== $this) {
            $utlisateur->setEntreprise($this);
        }

        $this->utlisateur = $utlisateur;

        return $this;
    }

    public function getBanniere(): ?string
    {
        return $this->banniere;
    }

    public function setBanniere(string $banniere): self
    {
        $this->banniere = $banniere;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getPageFaceBook(): ?string
    {
        return $this->pageFaceBook;
    }

    public function setPageFaceBook(string $pageFaceBook): self
    {
        $this->pageFaceBook = $pageFaceBook;

        return $this;
    }
}
