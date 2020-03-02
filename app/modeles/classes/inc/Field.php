<?php
/**
 * Created by PhpStorm.
 * User: Abouba
 * Date: 08/12/2016
 * Time: 02:34
 */
	abstract class Field
    {
        protected $errorMessage; // Attribut stockant le message d'erreur associé au champ
        protected $label; // Attribut stockant le label du champ
        protected $name; // Attribut stockant le nom du champ
        protected $value; // Attribut stockant la valeur du champ
        protected $validators = array();
        protected  $length;



        // Le constructeur demandant la liste des attributs avec leur valeur afin d'hydrater l'objet
        public function __construct(array $options = array())
        {
            if (!empty($options))
            {
                $this->hydrate($options);
            }
        }

        // Méthode (abstraite) chargée de renvoyer le code HTML du champ
        abstract public function buildWidget();

        public function hydrate($options)
        {
            foreach ($options as $type => $value)
            {
                $method = 'set'.ucfirst($type);
                if (is_callable(array($this, $method)))
                {
                    $this->$method($value);
                }
            }
        }

        // Méthode permettant de savoir si le champ est valide ou non
        public function isValid()
        {
            foreach ($this->validators as $validator)
            {
                if (!$validator->isValid($this->value))
                {
                    $this->errorMessage = $validator->errorMessage();
                    return false;
                }
            }
            return true;
        }

        public function label()
        {
            return $this->label;
        }

        public function length()
        {
            return $this->length;
        }

        public function name()
        {
            return $this->name;
        }

        public function validators()
        {
            return $this->validators;
        }

        public function value()
        {
            return $this->value;
        }

        public function setLabel($label)
        {
            if (is_string($label))
            {
                $this->label = $label;
            }
        }

        public function setLength($length)
        {
            $length = (int) $length;
            if ($length > 0)
            {
                $this->length = $length;
            }
        }

        public function setName($name)
        {
            if (is_string($name))
            {
                $this->name = $name;
            }
        }

        public function setValidators(array $validators)
        {
            foreach ($validators as $validator)
            {
                if ($validator instanceof HandlerError && !in_array($validator, $this->validators))
                {
                    $this->validators[] = $validator;
                }
            }
        }

        public function setValue($value)
        {
            if (is_string($value))
            {
                $this->value = $value;
            }
        }
    }
?>