<?php

namespace App\Entity;

use App\Repository\OfertaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfertaRepository::class)
 */
class Oferta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Plato::class, mappedBy="oferta")
     */
    private $platos;

    /**
     * @ORM\Column(type="float")
     */
    private $descuento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    public function __construct()
    {
        $this->platos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Plato[]
     */
    public function getPlatos(): Collection
    {
        return $this->platos;
    }

    public function addPlato(Plato $plato): self
    {
        if (!$this->platos->contains($plato)) {
            $this->platos[] = $plato;
            $plato->setOferta($this);
        }

        return $this;
    }

    public function removePlato(Plato $plato): self
    {
        if ($this->platos->removeElement($plato)) {
            // set the owning side to null (unless already changed)
            if ($plato->getOferta() === $this) {
                $plato->setOferta(null);
            }
        }

        return $this;
    }

    public function getDescuento(): ?float
    {
        return $this->descuento;
    }

    public function setDescuento(float $descuento): self
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
