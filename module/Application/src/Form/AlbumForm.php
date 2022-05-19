<?php
namespace Album\Form;

use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Form\Element\Text;
use Laminas\Form\Form;
use Laminas\InputFilter\InputFilterProviderInterface;
use Laminas\Validator\StringLength;

class AlbumForm extends Form implements InputFilterProviderInterface
{
    public function init() : void
    {
        // Title
        $this->add([
            'name'    => 'title',
            'type'    => Text::class,
            'options' => [
                'label' => 'Title',
            ],
        ]);

        // …
    }

    public function getInputFilterSpecification() : array
    {
        return [
            // Title
            [
                'name'    => 'title',
                'filters' => [
                    ['name' => StripTags::class],
                    ['name' => StringTrim::class],
                ],
                'validators' => [
                    [
                        'name'    => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                ],
            ],
            // …
        ];
    }
}