<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TitleQuestion", inversedBy="question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeQuestion", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typequestion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getTitle(): ?TitleQuestion
    {
        return $this->title;
    }

    public function setTitle(?TitleQuestion $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTypequestion(): ?TypeQuestion
    {
        return $this->typequestion;
    }

    public function setTypequestion(?TypeQuestion $typequestion): self
    {
        $this->typequestion = $typequestion;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->question;
    }
}
