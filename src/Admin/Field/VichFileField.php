<?php


namespace App\Admin\Field;


use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VichFileField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = 'File'): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplatePath('Admin/Field/vich_file.html.twig')
            ->setFormType(VichFileType::class)
            ->addCssClass('field-vich-file')
            ;
    }
}