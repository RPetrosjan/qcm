<?php

namespace App\Entity;

use App\Repository\VersionCompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VersionCompetenceRepository::class)
 */
class VersionCompetence
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
    private $version;

    /**
     * @ORM\OneToMany(targetEntity=TitleQuestion::class, mappedBy="versionCompetence")
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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

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
            $titlequestion->setVersionCompetence($this);
        }

        return $this;
    }

    public function removeTitlequestion(TitleQuestion $titlequestion): self
    {
        if ($this->titlequestion->removeElement($titlequestion)) {
            // set the owning side to null (unless already changed)
            if ($titlequestion->getVersionCompetence() === $this) {
                $titlequestion->setVersionCompetence(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->version;
    }
}
