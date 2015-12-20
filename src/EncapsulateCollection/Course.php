<?php


namespace RefactoringExamples\EncapsulateCollection;


class Course
{
    /**
     * @var string
     */
    private $courseName;
    /**
     * @var bool
     */
    private $isAdvanced;

    public function __construct(string $courseName, bool $isAdvanced)
    {
        $this->courseName = $courseName;
        $this->isAdvanced = $isAdvanced;
    }

    public function isAdvanced():bool
    {
        return $this->isAdvanced;
    }

    /**
     * @return string
     */
    public function getCourseName()
    {
        return $this->courseName;
    }
}
