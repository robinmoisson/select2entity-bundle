<?php

namespace Tetranz\Select2Bundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Routing\RouterInterface;

class Select2AbstractType extends AbstractType
{
    /** @var Registry */
    protected $doctrine;
    /** @var RouterInterface */
    protected $router;
    /** @var  integer */
    protected $pageLimit;
    /** @var  integer */
    protected $minimumInputLength;
    /** @var  boolean */
    protected $allowClear;
    /** @var  integer */
    protected $delay;
    /** @var  string */
    protected $language;
    /** @var  boolean */
    protected $cache;

    /**
     * @param Registry $doctrine
     * @param RouterInterface $router
     * @param integer $minimumInputLength
     * @param integer $pageLimit
     * @param boolean $allowClear
     * @param integer $delay
     * @param string $language
     * @param boolean $cache
     */
    public function __construct(Registry $doctrine, RouterInterface $router, $minimumInputLength, $pageLimit, $allowClear, $delay, $language, $cache)
    {
        $this->doctrine = $doctrine;
        $this->router = $router;
        $this->minimumInputLength = $minimumInputLength;
        $this->pageLimit = $pageLimit;
        $this->allowClear = $allowClear;
        $this->delay = $delay;
        $this->language = $language;
        $this->cache = $cache;
    }
}
