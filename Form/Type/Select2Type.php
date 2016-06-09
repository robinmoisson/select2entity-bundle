<?php

namespace Tetranz\Select2Bundle\Form\Type;


use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Routing\RouterInterface;

class Select2Type extends Select2AbstractType
{
    public function __construct(Registry $doctrine, RouterInterface $router, $minimumInputLength, $pageLimit, $allowClear, $delay, $language, $cache)
    {
        return parent::__construct($doctrine, $router, $minimumInputLength, $pageLimit, $allowClear, $delay, $language, $cache);
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        parent::finishView($view, $form, $options);
        // make variables available to the view
        $view->vars['remote_path'] = $options['remote_path']
            ?: $this->router->generate($options['remote_route'], array_merge($options['remote_params'], [ 'page_limit' => $options['page_limit'] ]));

        $varNames = array('multiple', 'minimum_input_length', 'placeholder', 'language', 'allow_clear', 'delay', 'language', 'cache');
        foreach ($varNames as $varName) {
            $view->vars[$varName] = $options[$varName];
        }

        if ($options['multiple']) {
            $view->vars['full_name'] .= '[]';
        }
    }

    /**
     * Added for pre Symfony 2.7 compatibility
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'remote_path' => null,
                'remote_route' => null,
                'remote_params' => array(),
                'multiple' => false,
                'compound' => false,
                'minimum_input_length' => $this->minimumInputLength,
                'page_limit' => $this->pageLimit,
                'allow_clear' => $this->allowClear,
                'delay' => $this->delay,
                'placeholder' => '',
                'language' => $this->language,
                'required' => false,
                'cache' => $this->cache,
            )
        );
    }

    /**
     * pre Symfony 3 compatibility
     *
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * Symfony 2.8+
     *
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'tetranz_select2';
    }
}