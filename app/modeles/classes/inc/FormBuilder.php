<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 08/12/2016
 * Time: 03:13
 */

abstract class FormBuilder {
// Attribut stockant le formulaire
    protected $form;

    public function __construct(Entity $entity)
    {
        $this->setForm(new Form($entity));
    }

    // Méthode abstraite chargée de construire le formulaire
    abstract public function build();

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function form()
    {
        return $this->form;
    }
}