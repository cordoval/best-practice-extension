<?php

namespace Cordoval\BestPractices\PhpSpec;

use PhpSpec\CodeGenerator\Generator\PromptingGenerator;
use PhpSpec\Locator\ResourceInterface;

/**
 * Generates spec classes from resources and puts them into the appropriate
 * folder using the appropriate template.
 */
class ClassNotationSpecificationGenerator extends PromptingGenerator
{
    /**
     * @param ResourceInterface $resource
     * @param string            $generation
     * @param array             $data
     *
     * @return bool
     */
    public function supports(ResourceInterface $resource, $generation, array $data)
    {
        return 'specification' === $generation;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return 0;
    }

    /**
     * @param ResourceInterface $resource
     * @param string            $filepath
     *
     * @return string
     */
    protected function renderTemplate(ResourceInterface $resource, $filepath)
    {
        $values = [
            '%filepath%'  => $filepath,
            '%name%'      => $resource->getSpecName(),
            '%namespace%' => $resource->getSpecNamespace(),
            '%subject%'   => $resource->getSrcClassname(),
            '%subject_name%' => $resource->getName(),
        ];

        if (!$content = $this->getTemplateRenderer()->render('specification', $values)) {
            $content = $this->getTemplateRenderer()->renderString($this->getTemplate(), $values);
        }

        return $content;
    }

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return file_get_contents(__DIR__ . '/templates/specification.template');
    }

    /**
     * @param  ResourceInterface $resource
     * @return mixed
     */
    protected function getFilePath(ResourceInterface $resource)
    {
        return $resource->getSpecFilename();
    }

    /**
     * @param ResourceInterface $resource
     * @param string            $filepath
     *
     * @return string
     */
    protected function getGeneratedMessage(ResourceInterface $resource, $filepath)
    {
        return sprintf(
            "<info>Specification for <value>%s</value> created in <value>%s</value>.</info>\n",
            $resource->getSrcClassname(), $filepath
        );
    }
}
