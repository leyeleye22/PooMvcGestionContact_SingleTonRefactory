<?php
class Client
{
    protected $nom;
    protected $prenom;
    protected $telephone;
    protected $fav;
    public function __construct($nom, $prenom, $telephone, $fav)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setTelephone($telephone);
        $this->setFav($fav);
    }



    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        if (is_string($nom) && !empty($nom)) {
            $this->nom = $nom;
        } else {
            throw new InvalidArgumentException('Le nom doit être une chaîne non vide.');
        }

        return $this;
    }


    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        if (is_string($prenom) && !empty($prenom)) {
            $this->prenom = $prenom;
        } else {
            throw new InvalidArgumentException('Le prenom doit être une chaîne non vide.');
        }

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */
    public function setTelephone($telephone)
    {
        if (is_string($telephone) && !empty($telephone)) {
            $prefix = substr($telephone, 0, 2);
            if ($prefix == "77" || $prefix == "76" || $prefix == "78" || $prefix == "70") {
                $this->telephone = $telephone;
            } else {
                throw new InvalidArgumentException('Le numéro de téléphone doit commencer par 77, 76, 78 ou 70.');
            }
        } else {
            throw new InvalidArgumentException('Le numéro de téléphone doit être une chaîne non vide.');
        }

        return $this;
    }

    /**
     * Get the value of fav
     */
    public function getFav()
    {
        return $this->fav;
    }

    /**
     * Set the value of fav
     *
     * @return  self
     */
    public function setFav($fav)
    {
        if ($fav == 'Oui' || $fav == 'non') {
            $this->fav = $fav;
        } else {
            throw new Exception("Sa peut prendre que 2 valeur Oui ou non", 1);
        }
        return $this;
    }
}
