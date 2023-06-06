<?php

class Association {

    private int $id;
    private int $id_vehicule;
    private int $id_conducteur;

    public function __construct($id, $id_vehicule, $id_conducteur) {
        $this->id = $id;
        $this->id_vehicule = $id_vehicule;
        $this->id_conducteur = $id_conducteur;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_vehicule
     */ 
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id_vehicule
     *
     * @return  self
     */ 
    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    /**
     * Get the value of id_conducteur
     */ 
    public function getId_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set the value of id_conducteur
     *
     * @return  self
     */ 
    public function setId_conducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }
}