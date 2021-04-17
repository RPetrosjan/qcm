<?php

namespace App\Entity;

use App\Repository\ComptenceSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComptenceSectionRepository::class)
 */
class ComptenceSection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=TitleQuestion::class, mappedBy="comptenceSection")
     */
    private $titlequestion;


    public function __construct()
    {
        $this->titlequestion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|TitleQuestion[]
     */
    public function getTitlequestion(): Collection
    {
        return $this->titlequestion;
    }

    public function addTitlequestion(TitleQuestion $titlequestion): self
    {
        if (!$this->titlequestion->contains($titlequestion)) {
            $this->titlequestion[] = $titlequestion;
            $titlequestion->setComptenceSection($this);
        }

        return $this;
    }

    public function removeTitlequestion(TitleQuestion $titlequestion): self
    {
        if ($this->titlequestion->removeElement($titlequestion)) {
            // set the owning side to null (unless already changed)
            if ($titlequestion->getComptenceSection() === $this) {
                $titlequestion->setComptenceSection(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->title;
    }
}
