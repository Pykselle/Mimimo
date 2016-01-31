<?php

class Mimimo
  {
	// Attributs
    public $sNom;
    public $iAge;
    public $iSante;
    public $iFaim;
    public $iHumeur;
    public $iProprete;
    public $iEnergie;
    public $sMessage;
    public $iEtat;
    public $sImage;
 

    // Constantes 
 	const NB_POINTS_REPAS = 5;
 	const NB_POINTS_JEUX = 5;
 	const MAX_POINTS = 10;
 	const LIMIT_SOMMEIL = 3;
 	const ENDORMI = 0;
 	const EVEILLE = 1;
 
    // Méthodes  
    public function __construct($iID, $sNom, $iAge, $iSante, $iFaim, $iHumeur, $iProprete, $iEnergie, $iEtat) 
    {
        $this->iID=$iID;
        $this->sNom=$sNom;
        $this->sMessage=$this->sNom." est heureux de vous voir";
        $this->iAge=$iAge;
        $this->iSante=$iSante;
        $this->iFaim=$iFaim;
        $this->iHumeur=$iHumeur;
        $this->iProprete=$iProprete;
        $this->iEnergie=$iEnergie;
        $this->iEtat=$iEtat;
        $this->sImage="mimimo_bonjour.gif";
    }
 
    public function nourrir()
    {
    	if ($this->iFaim + self::NB_POINTS_REPAS < self::MAX_POINTS)    
    	{
    		$this->iFaim=$this->iFaim+self::NB_POINTS_REPAS;
    		$this->sMessage=$this->sNom.' a bien mangé';
    	}else    
    	{
    		$this->iFaim=self::MAX_POINTS;
    		$this->sMessage=$this->sNom.' n\'a plus faim';
    	}
        $this->sImage="mimimo_mange.gif";
    }
 
    public function laver()
    {
    	$this->iProprete=self::MAX_POINTS;
    	$this->sMessage=$this->sNom.' est propre';
        $this->sImage="mimimo_bain.gif";
    }

    public function jouer()
    {
    	if ($this->iHumeur + self::NB_POINTS_JEUX < self::MAX_POINTS)    
    	{
    		$this->iHumeur=$this->iHumeur+self::NB_POINTS_JEUX;
    	}else    
    	{
    		$this->iHumeur=self::MAX_POINTS;
    	} 
        $this->sMessage=$this->sNom.' s\'est bien amusé';
        $this->sImage="mimimo_content.gif";
    }

    public function maj()
    {
    	if($this->iFaim>0) $this->iFaim=$this->iFaim-1;
    	if($this->iHumeur>0) $this->iHumeur=$this->iHumeur-1;
    	if($this->iProprete>0) $this->iProprete=$this->iProprete-1;
    	$this->iAge=$this->iAge+1;

    	if ($this->iEtat==self::ENDORMI)    
    	{
    		$this->iEnergie=$this->iEnergie+1;
    		if ($this->iEnergie>=self::MAX_POINTS)    
	    	{
	    		$this->sMessage=$this->sNom.' a bien dormi !';
	    		$this->iEtat=self::EVEILLE;
	    		
	    	}else	    	
	    	{
	    		$this->sMessage=$this->sNom.' dort. ZZzzZZ';
	    	}
    	}else    
    	{
    		$this->iEnergie=$this->iEnergie-1;
            if ($this->iEnergie <= self::LIMIT_SOMMEIL)    
            {
                $this->iEtat=self::ENDORMI;
                $this->sMessage=$this->sNom.' s\'endort. ZZzzZZ';
            }
    	}

    	


    }

  }

 ?>