<?php

class Driver {

    private int $id;
    private string $prenom;
    private string $nom;

    public function __construct($id, $prenom, $nom) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    /**
     * Get the value of id_conducteur
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id_conducteur
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
        $this->prenom = $prenom;

        return $this;
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
        $this->nom = $nom;

        return $this;
    }
}