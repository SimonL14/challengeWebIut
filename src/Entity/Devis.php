<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Id_user = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Accompagnant = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $Id_event = null;

    #[ORM\ManyToMany(targetEntity: Options::class, mappedBy: 'Devis_options')]
    private Collection $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->Id_user;
    }

    public function setIdUser(?User $Id_user): self
    {
        $this->Id_user = $Id_user;

        return $this;
    }

    public function isAccompagnant(): ?bool
    {
        return $this->Accompagnant;
    }

    public function setAccompagnant(?bool $Accompagnant): self
    {
        $this->Accompagnant = $Accompagnant;

        return $this;
    }

    public function getIdEvent(): ?Event
    {
        return $this->Id_event;
    }

    public function setIdEvent(?Event $Id_event): self
    {
        $this->Id_event = $Id_event;

        return $this;
    }

    /**
     * @return Collection<int, Options>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
            $option->addDevisOption($this);
        }

        return $this;
    }

    public function removeOption(Options $option): self
    {
        if ($this->options->removeElement($option)) {
            $option->removeDevisOption($this);
        }

        return $this;
    }
}
