<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
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
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TitleQuestion", mappedBy="competences")
     * @ORM\JoinColumn(nullable=true)
     */
    private $titlequestion;

    /**
     * @ORM\OneToMany(targetEntity=NewVersion::class, mappedBy="competence")
     */
    private $newVersions;

    public function __construct()
    {
        $this->newVersions = new ArrayCollection();
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

    public function getTitlequestion(): ?TitleQuestion
    {
        return $this->titlequestion;
    }

    public function setTitlequestion(?TitleQuestion $titlequestion): self
    {
        $this->titlequestion = $titlequestion;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return Collection|NewVersion[]
     */
    public function getNewVersions(): Collection
    {
        return $this->newVersions;
    }

    public function addNewVersion(NewVersion $newVersion): self
    {
        if (!$this->newVersions->contains($newVersion)) {
            $this->newVersions[] = $newVersion;
            $newVersion->setCompetence($this);
        }

        return $this;
    }

    public function removeNewVersion(NewVersion $newVersion): self
    {
        if ($this->newVersions->removeElement($newVersion)) {
            // set the owning side to null (unless already changed)
            if ($newVersion->getCompetence() === $this) {
                $newVersion->setCompetence(null);
            }
        }

        return $this;
    }
}
